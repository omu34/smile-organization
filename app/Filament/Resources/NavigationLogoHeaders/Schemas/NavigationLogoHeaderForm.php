<?php

namespace App\Filament\Resources\NavigationLogoHeaders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class NavigationLogoHeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('logo')
                ->disk('public')
                ->directory('logos')
                ->image()
                ->maxSize(60)
                ->imagePreviewHeight('30')
                ->loadingIndicatorPosition('left')
                ->panelLayout('compact')
                ->required(fn($record) => $record === null),

            TextInput::make('link')
                ->label('Logo URL')
                // ->url()
                ->placeholder('https://example.com'),
        ]);
    }
}
