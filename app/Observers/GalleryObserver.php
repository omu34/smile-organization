<?php

namespace App\Observers;

use App\Events\MediaUpdated;
use App\Models\Gallery;

class GalleryObserver
{
    /**
     * Handle the Gallery "updated" event.
     */
    public function updated(Gallery $gallery): void
    {
        // Broadcast media update when gallery is updated
        $media = $gallery->getFirstMedia('gallery_images');
        
        if ($media) {
            MediaUpdated::dispatch(
                $gallery,
                $media->getUrl(),
                'updated'
            );
        }
    }

    /**
     * Handle the Gallery "saved" event.
     */
    public function saved(Gallery $gallery): void
    {
        // Broadcast media update when gallery is saved (includes new records)
        $media = $gallery->getFirstMedia('gallery_images');
        
        if ($media) {
            MediaUpdated::dispatch(
                $gallery,
                $media->getUrl(),
                'saved'
            );
        }
    }
}
