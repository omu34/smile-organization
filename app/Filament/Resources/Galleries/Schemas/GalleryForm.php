<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('category')
                            ->placeholder('e.g. Nature, Events, Architecture'),

                        FileUpload::make('image')
                    ->image()
                    ->directory('galleries')
                    ->disk('public') // ✅ important
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
                    ]),
            ]);
    }
}
