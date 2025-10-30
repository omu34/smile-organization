<?php

namespace App\Filament\Resources\Articles\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('body')
                    ->rows(8)
                    ->label('Body')
                    ->required(),

                Repeater::make('media')
                    ->label('Media Files')
                    ->relationship('media')
                    ->schema([
                        Select::make('type')
                            ->options([
                                'image' => 'Image',
                                'video_local' => 'Local Video',
                                'youtube' => 'YouTube',
                            ])
                            ->default('image')
                            ->label('Media Type')
                            ->reactive(),

                        FileUpload::make('file_path')
                            ->label('Image / Video File')
                            ->directory('aboutus')
                            ->disk('public')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->hidden(fn($get) => $get('type') === 'youtube'),

                        TextInput::make('youtube_id')
                            ->label('YouTube Video ID')
                            ->placeholder('e.g. dQw4w9WgXcQ')
                            ->visible(fn($get) => $get('type') === 'youtube'),

                        Toggle::make('is_primary')
                            ->label('Primary Media')
                            ->default(false),
                    ])
                    ->orderable()
                    ->collapsible()
                    ->columns(2),




                


            ]);
    }
}
