<?php

namespace App\Filament\Resources\WhyUsFeatures\Pages;

use App\Filament\Resources\WhyUsFeatures\WhyUsFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWhyUsFeature extends EditRecord
{
    protected static string $resource = WhyUsFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
