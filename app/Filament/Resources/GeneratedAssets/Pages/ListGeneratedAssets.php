<?php

namespace App\Filament\Resources\GeneratedAssets\Pages;

use App\Filament\Resources\GeneratedAssets\GeneratedAssetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGeneratedAssets extends ListRecords
{
    protected static string $resource = GeneratedAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
