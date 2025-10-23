<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use App\Events\VideoUpdated;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Hero Content')
                ->schema([
                    TextInput::make('title')
                        ->label('Title'),
                    TextInput::make('subtitle')
                        ->label('Subtitle'),
                    Textarea::make('description')
                        ->rows(3),
                    TextInput::make('highlight_text')
                        ->label('Button Text'),
                    TextInput::make('highlight_link')
                        ->label('Button Link'),
                ])
                ->columns(2),

            Section::make('Video & Design')
                ->schema([
                    TextInput::make('video_url')
                        ->label('Video URL (YouTube, Vimeo, or local file)')
                        ->placeholder('e.g. https://youtu.be/dQw4w9WgXcQ or hero.mp4'),

                    FileUpload::make('video_path')
                        ->label('Upload Local Video File')
                        ->directory('videos')
                        ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                        ->maxSize(10240) // 10MB limit
                        ->visibility('public'),

                    Slider::make('background_opacity')
                        ->label('Background Overlay Opacity')
                        ->minValue(0)
                        ->maxValue(1)
                        ->step(0.05)
                        ->default(0.3),

                    Toggle::make('is_active')
                        ->label('Set as Active Hero Section')
                        ->default(true),
                ]),
        ]);
    }
}
