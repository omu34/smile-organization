<?php

namespace App\Jobs;

use App\Models\GeneratedAsset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use GuzzleHttp\Client;

class GenerateImageJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public GeneratedAsset $asset;
    public array $options;

    public function __construct(GeneratedAsset $asset, array $options = [])
    {
        $this->asset = $asset;
        $this->options = $options;
    }

    public function handle()
    {
        $this->asset->update(['status' => 'processing']);
        $disk = config('filesystems.default', 'public');

        try {
            // Use OpenAI images.generate if available:
            $size = $this->options['size'] ?? env('AI_DEFAULT_SIZE', '1024x1024');
            $model = $this->options['model'] ?? env('OPENAI_IMAGE_MODEL', 'gpt-image-1');

            $response = \OpenAI\Laravel\Facades\OpenAI::images()->create([
                'model' => $model,
                'prompt' => $this->asset->prompt,
                'n' => 1,
                'size' => $size,
            ]);

            $data = $response->data[0] ?? null;

            if (! $data) {
                throw new Exception('No image data returned');
            }

            // base64
            if (is_object($data) && property_exists($data, 'b64_json')) {
                $binary = base64_decode($data->b64_json);
                $ext = 'png';
                $filename = 'ai-images/'.now()->format('Y/m/d/').Str::random(16).'.'.$ext;
                Storage::disk($disk)->put($filename, $binary);
                $this->asset->update(['image_path'=>$filename,'status'=>'done','meta'=>['raw'=>$response->toArray()]]);
                return;
            }

            // URL
            if (is_object($data) && property_exists($data, 'url')) {
                $url = $data->url;
                $contents = @file_get_contents($url);
                if ($contents === false) throw new Exception('Failed to download image');
                $ext = Str::contains($url, '.png') ? 'png' : 'jpg';
                $filename = 'ai-images/'.now()->format('Y/m/d/').Str::random(16).'.'.$ext;
                Storage::disk($disk)->put($filename, $contents);
                $this->asset->update(['image_path'=>$filename,'status'=>'done','meta'=>['raw'=>$response->toArray()]]);
                return;
            }

            throw new Exception('Unexpected image response structure');
        } catch (Exception $e) {
            Log::error('GenerateImageJob error: '.$e->getMessage());
            $this->asset->update(['status'=>'failed','error'=>$e->getMessage()]);
            throw $e;
        }
    }

    public function failed(Exception $e)
    {
        $this->asset->update(['status'=>'failed','error'=>$e->getMessage()]);
    }
}
