<?php

namespace App\Filament\Resources\VisitUs\Pages;

use App\Filament\Resources\VisitUs\VisitUsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVisitUs extends EditRecord
{
    protected static string $resource = VisitUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
