<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('title')->required()->maxLength(255),
            Textarea::make('subtitle')->rows(2),
            Textarea::make('description')->rows(3),
            TextInput::make('founder_quote'),
            TextInput::make('founder_name'),
            TextInput::make('highlight_text'),
            TextInput::make('highlight_link')->url(),
            FileUpload::make('video_path')
                ->directory('videos')
                ->label('Hero Video')
                ->acceptedFileTypes(['video/mp4'])
                ->maxSize(10240),
            TextInput::make('background_opacity')
                ->default('0.7')
                ->numeric(),
            ]);
    }
}
