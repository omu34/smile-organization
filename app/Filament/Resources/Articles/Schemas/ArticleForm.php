<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255),
                FileUpload::make('image_path')->directory('articles'),
                Textarea::make('excerpt')->rows(3),
                RichEditor::make('body')->columnSpanFull(),
                TextInput::make('read_time'),
                DateTimePicker::make('published_at'),
            ]);
    }
}
