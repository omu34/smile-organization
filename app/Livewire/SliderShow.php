<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Slider;
use Livewire\Attributes\On;

class SliderShow extends Component
{
    public $slider;
    public $slug;

    public function mount($slug = null)
    {
        // Get slug from parameter or fallback
        $this->slug = $slug ?? 'home-page-slider';
        $this->loadSlider();
    }

    public function loadSlider()
    {
        $this->slider = Slider::forSlug($this->slug);
    }

    #[On('echo:slider.{slug},slider.updated')]
    public function refreshSlider()
    {
        $this->loadSlider();
        $this->dispatch('notify', 'Slider updated: ' . ucfirst($this->slug));
    }

    public function render()
    {
        return view('livewire.slider-show');
    }
}

