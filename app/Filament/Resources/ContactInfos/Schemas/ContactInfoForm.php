<?php

namespace App\Filament\Resources\ContactInfos\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('phone'),
                TextInput::make('email'),
                TextInput::make('address'),
                Textarea::make('google_map_iframe')->rows(3),
            ]);
    }
}
