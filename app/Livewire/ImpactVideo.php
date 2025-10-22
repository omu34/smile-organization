<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class ImpactVideo extends Component
{
    protected $listeners = ['VideoUpdated' => '$refresh'];
    

    public function render()
    {
        $videos = Video::where('is_visible', true)
            ->orderBy('order')
            ->get();

        return view('livewire.impact-video', compact('videos'));
    }
}
