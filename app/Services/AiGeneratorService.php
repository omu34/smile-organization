<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use App\Models\GeneratedAsset;
use App\Jobs\GenerateImageJob;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

class AiGeneratorService
{
    public function ensureAuth()
    {
        if (! Auth::check()) {
            throw new \RuntimeException('Authentication required.');
        }
    }

    public function generateText(string $prompt): GeneratedAsset
    {
        $this->ensureAuth();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Now call generatedAssets() on the $user variable, not Auth::user() directly
        $record = $user->generatedAssets()->create([
            'type' => 'text',
            'prompt' => $prompt,
            'status' => 'processing',
        ]);

        try {
            $response = OpenAI::chat()->create([
                'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $content = $response->choices[0]->message->content ?? '';

            $record->update([
                'result_text' => $content,
                'meta' => ['raw' => $response->toArray()],
                'status' => 'done',
            ]);
        } catch (Exception $e) {
            Log::error('AI text error: ' . $e->getMessage());
            $record->update(['status' => 'failed', 'error' => $e->getMessage()]);
        }

        return $record->fresh();
    }

    /**
     * Start an image generation (enqueue or run inline based on env).
     */
    public function generateImage(string $prompt, array $options = []): GeneratedAsset
    {
        $this->ensureAuth();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $record = $user->generatedAssets()->create([
            'type' => 'image',
            'prompt' => $prompt,
            'status' => 'pending',
        ]);

        $sync = $options['sync'] ?? env('AI_SYNC_FALLBACK', true);
        $job = new GenerateImageJob($record, $options);

        if ($sync && app()->environment('local')) {
            try {
                $job->handle();
            } catch (Exception $e) {
                Log::error('Sync generate image failed: ' . $e->getMessage());
                $record->update(['status' => 'failed', 'error' => $e->getMessage()]);
            }
        } else {
            dispatch($job);
            $record->update(['status' => 'processing']);
        }

        return $record->fresh();
    }
}
