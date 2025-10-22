<?php

namespace App\Livewire;

use Livewire\Component;

class AboutSection extends Component
{
    public function render()
    {
        $about = AboutSection::first();
        return view('livewire.about-section', compact('about'));
    }
}
