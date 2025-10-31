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
                            ->maxLength(255)
                            ->live(onBlur: true), // For auto-slug update

                        // Slug field (auto-filled from title)
                        TextInput::make('slug')
                            ->label('Slug')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Automatically generated from the title.'),

                        // Category dropdown
                        Select::make('category')
                            ->label('Category')
                            ->options([
                                'Empowerment' => 'Empowerment',
                                'Art & Education' => 'Art & Education',
                                'Community' => 'Community',
                            ])
                            ->required(),

                        // Image upload
                        FileUpload::make('image_path')
                            ->label('Gallery Image')
                            ->image()
                            ->directory('galleries')
                            ->disk('public')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->required(),
                    ]),


            ]);
    }
}
