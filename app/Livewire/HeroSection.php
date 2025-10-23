<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hero;

class HeroSection extends Component
{
    public $hero;
    public $videoUrl;
    protected $listeners = ['echo:hero,HeroUpdated' => 'refreshHero'];


    public function mount()
    {
        $this->hero = Hero::where('is_active', true)->first();
        $this->videoUrl = $this->hero?->video_url;
    }


    public function refreshHero()
    {
        $this->hero = Hero::where('is_active', true)->first();
        $this->videoUrl = $this->hero?->video_url;
    }

    public function render()
    {
        return view('livewire.hero-section');
    }
}
    // public function loadHero()
    // {
    //     $hero = Hero::first();
    //     if ($hero) {
    //         $this->title = $hero->title;
    //         $this->subtitle = $hero->subtitle;
    //         $this->description = $hero->description;
    //         $this->founder_quote = $hero->founder_quote;
    //         $this->founder_name = $hero->founder_name;
    //         $this->highlight_text = $hero->highlight_text;
    //         $this->highlight_link = $hero->highlight_link;
    //         $this->video_path = $hero->video_path;
    //         $this->background_opacity = $hero->background_opacity;
    //     }
    // }
