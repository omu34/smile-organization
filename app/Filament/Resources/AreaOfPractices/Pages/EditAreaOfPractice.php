<?php

namespace App\Filament\Resources\AreaOfPractices\Pages;

use App\Filament\Resources\AreaOfPractices\AreaOfPracticeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAreaOfPractice extends EditRecord
{
    protected static string $resource = AreaOfPracticeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
