<?php
namespace App\Livewire;

use App\Models\Directive;
use Livewire\Component;

class DirectivesSection extends Component
{
    public function render()
    {
        return view('livewire.directives-section', [
            'directives' => Directive::where('is_active', true)
                ->orderBy('order')
                ->get(),
        ]);
    }
}
