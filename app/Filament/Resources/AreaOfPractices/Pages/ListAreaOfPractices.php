<?php

namespace App\Filament\Resources\AreaOfPractices\Pages;

use App\Filament\Resources\AreaOfPractices\AreaOfPracticeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAreaOfPractices extends ListRecords
{
    protected static string $resource = AreaOfPracticeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
