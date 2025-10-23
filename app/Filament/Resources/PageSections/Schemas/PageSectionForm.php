<?php

namespace App\Filament\Resources\PageSections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section')->required()->unique(ignoreRecord: true),
                TextInput::make('title')->required()->label('Main Title'),
                Textarea::make('description')->rows(4)->label('Main Description'),
                Toggle::make('is_visible')->label('Visible')->default(true),
            ]);
    }
}
