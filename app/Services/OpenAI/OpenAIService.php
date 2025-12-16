<?php
// app/Services/OpenAI/OpenAIService.php
namespace App\Services\OpenAI;

use OpenAI\Laravel\Facades\OpenAI;
use Exception;
use Illuminate\Support\Str;

class OpenAIService implements OpenAIServiceInterface
{
    public function generateText(string $prompt, ?array $options = []): array
    {
        $model = $options['model'] ?? env('OPENAI_MODEL', 'gpt-4o-mini');
        $maxTokens = $options['max_tokens'] ?? 1000;

        try {
            $response = OpenAI::chat()->create([
                'model' => $model,
                'messages' => [['role' => 'user', 'content' => $prompt]],
                'max_tokens' => $maxTokens,
            ]);

            $text = $response->choices[0]->message->content ?? '';
            $meta = [
                'model' => $model,
                'raw' => $response->toArray(),
            ];

            return ['text' => $text, 'meta' => $meta];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function generateImage(string $prompt, ?array $options = []): array
    {
        $size = $options['size'] ?? env('AI_DEFAULT_SIZE', '1024x1024');
        $n = $options['n'] ?? 1;
        $model = $options['model'] ?? env('OPENAI_IMAGE_MODEL', 'gpt-image-1');

        // try {
        //     $response = OpenAI::images()->generate([
        //         'model' => $model,
        //         'prompt' => $prompt,
        //         'size' => $size,
        //         'n' => $n,
        //     ]);

        //     // The OpenAI client returns base64 or url depending on config; handle both:
        //     $first = $response->data[0] ?? null;
        //     return ['data' => $first, 'meta' => ['raw' => $response->toArray(), 'model' => $model]];
        // } catch (Exception $e) {
        //     throw $e;
        // }



        try {
            $response = OpenAI::images()->create([
                'model' => $model,
                'prompt' => $prompt,
                'size' => $size,
                'n' => $n,
            ]);

            // The OpenAI client returns base64 or url depending on config; handle both:
            $first = $response->data[0] ?? null;
            return ['data' => $first, 'meta' => ['raw' => $response->toArray(), 'model' => $model]];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
