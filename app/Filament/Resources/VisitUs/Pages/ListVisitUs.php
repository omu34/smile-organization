<?php

namespace App\Filament\Resources\VisitUs\Pages;

use App\Filament\Resources\VisitUs\VisitUsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVisitUs extends ListRecords
{
    protected static string $resource = VisitUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
