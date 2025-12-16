<?php

namespace App\Livewire\Ai;

use Livewire\Component;
use App\Services\AiGeneratorService;

class AiTextGenerator extends Component
{
    public ?string $prompt = '';
    public ?string $result = '';
    public bool $loading = false;

    public function generate(AiGeneratorService $ai)
    {
        $this->loading = true;
        try {
            $record = $ai->generateText($this->prompt ?? '');
            $this->result = $record->result_text ?? '';
        } catch (\Exception $e) {
            $this->addError('prompt', 'AI request failed: '.$e->getMessage());
        }
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.ai.text-generator');
    }
}
