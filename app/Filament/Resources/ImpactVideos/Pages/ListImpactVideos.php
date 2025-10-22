<?php

namespace App\Filament\Resources\ImpactVideos\Pages;

use App\Filament\Resources\ImpactVideos\ImpactVideosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImpactVideos extends ListRecords
{
    protected static string $resource = ImpactVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
