<?php

namespace App\Filament\Resources\AreaTitles\Pages;

use App\Filament\Resources\AreaTitles\AreaTitleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAreaTitles extends ListRecords
{
    protected static string $resource = AreaTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
