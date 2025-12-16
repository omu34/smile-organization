<?php

namespace App\Filament\Resources\GeneratedAssets\Pages;

use App\Filament\Resources\GeneratedAssets\GeneratedAssetResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGeneratedAsset extends EditRecord
{
    protected static string $resource = GeneratedAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
