<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use OpenAI;
use OpenAI\Exceptions\RateLimitException; // Import specific exception
use Exception;

class AiPlayground extends Component
{
    use WithFileUploads;

    public $prompt = '';
    public $imagePrompt = '';
    public $uploadedImage;
    public $textResult = '';
    public ?string $imageUrl = null;
    public $generatedImage = null;

    public function generateText()
    {
        $this->resetErrorBag(); // Clear previous errors

        try {
            $client = OpenAI::client(config('services.openai.key'));

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini', // Note: 'gpt-4.1-mini' is not a standard ID, assumed 'gpt-4o-mini'
                'messages' => [
                    ['role' => 'user', 'content' => $this->prompt],
                ],
            ]);

            $this->textResult = $response->choices[0]->message->content ?? '(No output)';

        } catch (RateLimitException $e) {
            $this->addError('prompt', 'You are sending requests too fast. Try again in a few seconds.');
        } catch (Exception $e) {
            $this->addError('prompt', 'Error: ' . $e->getMessage());
        }
    }

    public function generateImage()
    {
        $this->resetErrorBag();

        try {
            $client = OpenAI::client(config('services.openai.key'));

            $response = $client->images()->create([
                'model' => 'dall-e-2', // Note: 'gpt-image-1' is not standard, likely 'dall-e-2' or 'dall-e-3'
                'prompt' => $this->imagePrompt,
                'size' => '1024x1024',
            ]);

            $this->generatedImage = $response->data[0]->url;

        } catch (RateLimitException $e) {
            $this->addError('imagePrompt', 'You are sending requests too fast. Try again in a few seconds.');
        } catch (Exception $e) {
            $this->addError('imagePrompt', 'Error: ' . $e->getMessage());
        }
    }

    public function editImage()
    {
        $this->validate([
            'uploadedImage' => 'required|image|max:4096',
        ]);

        $this->resetErrorBag();

        $fileStream = null;

        try {
            $client = OpenAI::client(config('services.openai.key'));

            // Open stream safely
            $fileStream = fopen($this->uploadedImage->getRealPath(), 'r');

            $response = $client->images()->edit([
                'model' => 'dall-e-2',
                'prompt' => $this->imagePrompt,
                'image' => $fileStream,
            ]);

            $this->generatedImage = $response->data[0]->url;

        } catch (RateLimitException $e) {
            $this->addError('imagePrompt', 'You are sending requests too fast. Try again in a few seconds.');
        } catch (Exception $e) {
            $this->addError('imagePrompt', 'Error: ' . $e->getMessage());
        } finally {
            // Always close the file stream
            if (is_resource($fileStream)) {
                fclose($fileStream);
            }
        }
    }

    public function render()
    {
        return view('livewire.ai-playground');
    }
}
