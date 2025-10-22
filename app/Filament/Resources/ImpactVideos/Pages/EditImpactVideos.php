<?php

namespace App\Filament\Resources\ImpactVideos\Pages;

use App\Filament\Resources\ImpactVideos\ImpactVideosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImpactVideos extends EditRecord
{
    protected static string $resource = ImpactVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
