<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Events\GalleryUpdated;
use App\Filament\Resources\Galleries\GalleryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected function afterSave(): void
    {
        // Broadcast to all other connected clients via Reverb
        broadcast(new GalleryUpdated())->toOthers();
    }
}
