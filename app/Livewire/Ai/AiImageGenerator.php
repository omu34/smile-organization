<?php

namespace App\Livewire\Ai;

use Livewire\Component;
use App\Services\AiGeneratorService;

class AiImageGenerator extends Component
{
    public ?string $prompt = '';
    public ?string $imageUrl = null; // easier to understand

    public bool $loading = false;

    public function generate(AiGeneratorService $ai)
    {
        $this->loading = true;
        try {
            $record = $ai->generateImage($this->prompt ?? '', ['sync' => false]);
            // record maybe processing; if done, image_path will be set
            $this->imageUrl = $record->image_url ?? null;
            // $this->prompt = $record->prompt ?? '';
        } catch (\Exception $e) {
            $this->addError('prompt', 'AI request failed: '.$e->getMessage());
        }
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.ai.image-generator');
    }
}
