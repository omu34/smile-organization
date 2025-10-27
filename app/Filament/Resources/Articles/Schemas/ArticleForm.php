<?php

namespace App\Filament\Resources\Articles\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                RichEditor::make('body')->required(),
                Toggle::make('is_published'),
                Repeater::make('media')
                    ->schema([
                        Select::make('type')
                            ->options([
                                'image' => 'Image',
                                'video_local' => 'Local Video',
                                'youtube' => 'YouTube Video',
                            ])
                            ->required(),
                        FileUpload::make('file_path')
                            ->directory('articles')
                            ->visibility('public')
                            ->disk('public')
                            ->visible(fn($get) => $get('type') !== 'youtube'),
                        TextInput::make('youtube_id')
                            ->visible(fn($get) => $get('type') === 'youtube'),
                        Toggle::make('is_primary')->label('Primary Media'),

                    ])
                ->columns(2)

            ]);
    }
}
