<?php

namespace App\Filament\Resources\WhyUsItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WhyUsItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image()
                    ->label('Image Upload')
                    ->directory('why-us-items')
                    ->disk('public')
                    ->visibility('public')
                    ->required()
                    ->imagePreviewHeight('150'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
