<?php

namespace App\Filament\Resources\WhyUsFeatures\Pages;

use App\Filament\Resources\WhyUsFeatures\WhyUsFeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWhyUsFeatures extends ListRecords
{
    protected static string $resource = WhyUsFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
