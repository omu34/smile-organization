<?php

namespace App\Filament\Resources\VisitUs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VisitUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('phone')->required(),
                TextInput::make('email'),
                TextInput::make('address')->required(),
                Textarea::make('google_map_embed')->label('Google Map Embed URL')->rows(4),
                TextInput::make('hours')->required(),
                Toggle::make('is_active')->default(true),
            ]);
    }
}
