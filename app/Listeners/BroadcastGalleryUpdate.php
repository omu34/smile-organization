<?php

namespace App\Listeners;

use Livewire\Livewire;

class BroadcastGalleryUpdate
{
    public function handle(): void
    {
        Livewire::dispatch('galleryUpdated');
    }
}
