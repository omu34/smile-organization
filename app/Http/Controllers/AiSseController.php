<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Added for safety check

class AiSseController extends Controller
{
    // REMOVED: __construct with middleware call.
    // Apply middleware in routes/web.php

    public function stream(Request $request)
    {
        // Double check auth if not handled by route middleware
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $prompt = $request->input('prompt', '');
        // $conversationId = $request->input('conversation_id', null); // Unused in this snippet but kept variable

        if (! $prompt) {
            return response()->json(['error'=>'prompt required'], 422);
        }

        $model = env('OPENAI_MODEL', 'gpt-4o-mini');

        $response = new StreamedResponse(function () use ($prompt, $model) {

            $payload = [
                'model' => $model,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'stream' => true,
            ];

            // Note: In production, consider using a Singleton client or Dependency Injection
            $client = new Client(['base_uri'=>env('OPENAI_API_BASE','https://api.openai.com/v1'), 'timeout'=>0]);

            try {
                $res = $client->post('/chat/completions', [
                    'headers' => [
                        'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
                        'Accept' => 'text/event-stream',
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode($payload),
                    'stream' => true,
                ]);

                $body = $res->getBody();

                while (! $body->eof()) {
                    $chunk = $body->read(1024);
                    if ($chunk === '') {
                        usleep(10000);
                        continue;
                    }
                    echo $chunk;
                    ob_flush();
                    flush();
                }
            } catch (\Exception $e) {
                echo "data: [ERROR] " . $e->getMessage() . "\n\n";
                ob_flush();
                flush();
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');
        // CORS headers might be needed if front-end is separate, but usually fine in same app
        $response->headers->set('X-Accel-Buffering', 'no'); // Nginx fix

        return $response;
    }
}
