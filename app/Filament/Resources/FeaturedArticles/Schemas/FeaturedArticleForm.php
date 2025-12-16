<?php

namespace App\Filament\Resources\FeaturedArticles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FeaturedArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255),
                Textarea::make('excerpt'),
                RichEditor::make('content'),
                Select::make('media_type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Local Video (MP4)',
                        'youtube' => 'YouTube Video',
                    ])
                    ->reactive()
                    ->required(),

                FileUpload::make('media_url')
                    ->label('Upload Media')
                    ->visible(fn($get) => in_array($get('media_type'), ['image', 'video']))
                    ->directory('featured-media')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->preserveFilenames(),

                TextInput::make('media_url')
                    ->label('YouTube URL')
                    ->visible(fn($get) => $get('media_type') === 'youtube'),
                Toggle::make('is_featured')->default(true),
            ]);
    }
}
