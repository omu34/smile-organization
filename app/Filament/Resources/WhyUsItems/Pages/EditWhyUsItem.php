<?php

namespace App\Filament\Resources\WhyUsItems\Pages;

use App\Filament\Resources\WhyUsItems\WhyUsItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
 use App\Events\WhyUsUpdated;

class EditWhyUsItem extends EditRecord
{
    protected static string $resource = WhyUsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }



protected function afterSave(): void
{
    event(new WhyUsUpdated());
}

}
