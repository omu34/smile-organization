<?php
namespace App\Services;

use App\Models\Conversation;
use App\Models\Message;
use App\Events\StreamTokenReceived;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIService
{
    // default model choices (adjust as you prefer)
    protected string $chatModel = 'gpt-4o';
    protected string $imageModel = 'dall-e-3';

    /**
     * Stream chat: enqueue or run inline. This implementation streams synchoronously
     * and broadcasts tokens via StreamTokenReceived event to channel conversation.{id}
     */
    public function streamChat(Conversation $conversation, string $userMessage, array $options = [])
    {
        // 1) Save user message
        $conversation->messages()->create([
            'role' => 'user',
            'content' => $userMessage,
            'is_partial' => false,
        ]);

        // 2) create assistant partial placeholder (we'll append tokens)
        $assistantMessage = $conversation->messages()->create([
            'role' => 'assistant',
            'content' => '',
            'is_partial' => true,
            'tokens' => 0,
        ]);

        // 3) prepare history (last 10)
        $history = $conversation->messages()
            ->latest()
            ->take(20) // user + assistant count - take more to include context
            ->get()
            ->reverse()
            ->map(fn($m) => [
                'role' => $m->role,
                'content' => $m->content,
            ])->values()->toArray();

        // 4) call OpenAI streaming
        // The openai-php library supports stream() style iterators. Use createStreamed or stream()
        $stream = OpenAI::chat()->createStreamed([
            'model' => $this->chatModel,
            'messages' => $history,
            'max_tokens' => $options['max_tokens'] ?? 700,
            'temperature' => $options['temperature'] ?? 0.2,
        ]);

        $full = '';
        $totalTokens = 0;

        foreach ($stream as $part) {
            // depending on response shape; guard defensively
            $token = data_get($part, 'choices.0.delta.content') ?? null;

            // Some stream pieces may contain role or other fields
            if ($token) {
                $full .= $token;

                // estimate tokens locally (very rough) or rely on OpenAI usage meta if provided
                $estimatedTokens = $this->estimateTokens($token);

                // Save token chunk as partial by appending to DB record
                $assistantMessage->content .= $token;
                $assistantMessage->tokens += $estimatedTokens;
                $assistantMessage->save();

                $totalTokens += $estimatedTokens;

                // Broadcast chunk to conversation channel
                broadcast(new StreamTokenReceived($conversation->id, $token))->toOthers();
            }

            // Optionally process non-content pieces (like end_reason)
        }

        // Mark assistant message final
        $assistantMessage->is_partial = false;
        $assistantMessage->save();

        // Update conversation tokens
        $conversation->increment('total_tokens', $totalTokens);

        // Optionally return the full assistant text
        return $full;
    }

    /**
     * Generate image and save message with meta URL
     */
    public function generateImage(Conversation $conversation, string $prompt, array $options = [])
    {
        $resp = OpenAI::images()->create([
            'model' => $this->imageModel,
            'prompt' => $prompt,
            'n' => $options['n'] ?? 1,
            'size' => $options['size'] ?? '1024x1024',
            'response_format' => 'url',
        ]);

        $url = data_get($resp, 'data.0.url');

        $conversation->messages()->create([
            'role' => 'assistant',
            'content' => "Generated image for prompt: {$prompt}",
            'meta' => ['type' => 'image', 'url' => $url, 'prompt' => $prompt],
            'is_partial' => false,
        ]);

        return $url;
    }

    /**
     * Generate follow-up email (single completion)
     */
    public function createFollowUpEmail(Conversation $conversation, string $brief)
    {
        $prompt = "Write a professional follow-up email based on: {$brief}";
        $resp = OpenAI::responses()->create([
            'model' => $this->chatModel,
            'input' => $prompt,
            'max_tokens' => 400,
        ]);

        $text = data_get($resp, 'output.0.content.0.text') ?? data_get($resp, 'output_text') ?? '';

        $msg = $conversation->messages()->create([
            'role' => 'assistant',
            'content' => $text,
            'meta' => ['type' => 'followup_email', 'brief' => $brief],
        ]);

        return $msg;
    }

    /**
     * Summarize last N messages
     */
    public function summarizeConversation(Conversation $conversation, int $limit = 20)
    {
        $msgs = $conversation->messages()->latest()->take($limit)->get()->reverse()->map(fn($m) => "{$m->role}: {$m->content}")->implode("\n\n");

        $prompt = "Summarize the following conversation into short bullet points:\n\n" . $msgs;

        $resp = OpenAI::responses()->create([
            'model' => $this->chatModel,
            'input' => $prompt,
            'max_tokens' => 300,
        ]);

        $summary = data_get($resp, 'output.0.content.0.text') ?? data_get($resp, 'output_text') ?? '';

        $conversation->messages()->create([
            'role' => 'assistant',
            'content' => $summary,
            'meta' => ['type' => 'summary', 'limit' => $limit],
        ]);

        return $summary;
    }

    /**
     * Basic product search using DB + optional AI re-ranker
     * if $useAi = true, we ask OpenAI to rank products by the query
     */
    public function searchProducts(string $query, bool $useAi = true, int $limit=10)
    {
        $base = \App\Models\Product::where(function($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
              ->orWhere('description', 'like', "%{$query}%")
              ->orWhere('sku', 'like', "%{$query}%");
        })->limit(200)->get();

        if (! $useAi || $base->isEmpty()) {
            return $base->take($limit);
        }

        // Prepare small corpus for AI to rank
        $items = $base->map(fn($p) => [
            'id' => $p->id,
            'title' => $p->title,
            'description' => Str::limit($p->description, 300),
            'price' => $p->price,
        ])->values()->toArray();

        // Compose prompt: ask AI to return a JSON array of top ids ordered by relevance
        $prompt = "Rank these products by relevance to the user query: \"{$query}\". Return a JSON array of ids ordered by relevance. Products: " . json_encode($items);

        $resp = OpenAI::responses()->create([
            'model' => $this->chatModel,
            'input' => $prompt,
            'max_tokens' => 300,
        ]);

        $text = data_get($resp, 'output.0.content.0.text') ?? data_get($resp,'output_text') ?? '';

        // Try to find ids in the response
        preg_match_all('/\d+/', $text, $matches);
        $ids = collect($matches[0] ?? [])->unique()->map(fn($v)=> (int)$v)->toArray();

        if (empty($ids)) {
            return $base->take($limit);
        }

        $ordered = collect($ids)->map(fn($id) => $base->first(fn($b) => $b->id == $id))->filter()->values();

        return $ordered->take($limit);
    }

    /**
     * Very small token estimator (rough): counts words/0.75
     */
    protected function estimateTokens(string $chunk): int
    {
        $words = str_word_count($chunk);
        return (int) max(1, round($words / 0.75));
    }
}
