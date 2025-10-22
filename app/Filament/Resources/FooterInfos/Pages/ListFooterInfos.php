<?php

namespace App\Filament\Resources\FooterInfos\Pages;

use App\Filament\Resources\FooterInfos\FooterInfoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterInfos extends ListRecords
{
    protected static string $resource = FooterInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
