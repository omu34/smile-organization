<?php

namespace App\Livewire;

use App\Models\Hero;
use Livewire\Component;

class HeroSection extends Component
{
    public $hero;

    public function mount()
    {
        $this->hero = Hero::latest()->first();
    }

    public function pollHero()
    {
        $this->hero = Hero::latest()->first();
    }

    public function render()
    {
        return view('livewire.hero-section', [
            'hero' => $this->hero,
        ]);
    }
}
