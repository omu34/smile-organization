<?php

namespace App\Filament\Resources\AreaTitles\Pages;

use App\Filament\Resources\AreaTitles\AreaTitleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAreaTitle extends EditRecord
{
    protected static string $resource = AreaTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
