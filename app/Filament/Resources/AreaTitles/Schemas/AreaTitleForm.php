<?php

namespace App\Filament\Resources\AreaTitles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AreaTitleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('description')->required(),
            ]);
    }
}
