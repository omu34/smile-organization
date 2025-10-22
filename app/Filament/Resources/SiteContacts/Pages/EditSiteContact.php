<?php

namespace App\Filament\Resources\SiteContacts\Pages;

use App\Filament\Resources\SiteContacts\SiteContactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSiteContact extends EditRecord
{
    protected static string $resource = SiteContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
