<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Video;

class ImpactVideo extends Component
{
    public $selectedVideoId = null;
    public $videoIds = [];

    #[On('echo:video,VideoUpdated')] // listens to Reverb event
    public function refreshVideos()
    {
        $this->dispatch('$refresh');
    }

    public function showModal($videoId)
    {
        $this->selectedVideoId = $videoId;
        $this->dispatch('show-modal');
    }

    public function closeModal()
    {
        $this->selectedVideoId = null;
        $this->dispatch('close-modal');
    }

    public function nextVideo()
    {
        if (!$this->selectedVideoId) return;

        $index = array_search($this->selectedVideoId, $this->videoIds);
        if ($index !== false && $index < count($this->videoIds) - 1) {
            $this->selectedVideoId = $this->videoIds[$index + 1];
        } else {
            // Optional: loop back to the first video
            $this->selectedVideoId = $this->videoIds[0] ?? null;
        }
    }

    public function prevVideo()
    {
        if (!$this->selectedVideoId) return;

        $index = array_search($this->selectedVideoId, $this->videoIds);
        if ($index !== false && $index > 0) {
            $this->selectedVideoId = $this->videoIds[$index - 1];
        } else {
            // Optional: loop to the last video
            $this->selectedVideoId = end($this->videoIds) ?? null;
        }
    }

    public function render()
    {
        $videos = Video::where('is_visible', true)
            ->orderBy('order')
            ->get();

        // store ids for next/prev navigation
        $this->videoIds = $videos->pluck('id')->toArray();

        // get selected video if any
        $selectedVideo = $this->selectedVideoId
            ? Video::find($this->selectedVideoId)
            : null;

        return view('livewire.impact-video', [
            'videos' => $videos,
            'selectedVideo' => $selectedVideo,
        ]);
    }
}