<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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

                        // Media upload using Spatie Media Library
                        FileUpload::make('gallery_images')
                            ->label('Gallery Image')
                            ->image()
                            ->directory('galleries')
                            ->disk('public')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->required()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($record) {
                                    $record->clearMediaCollection('gallery_images');
                                    if ($state) {
                                        $record->addMediaFromDisk($state, 'public')
                                            ->toMediaCollection('gallery_images');
                                    }
                                }
                            })
                            ->dehydrateStateUsing(function ($state, $record) {
                                if ($record && $state) {
                                    $record->clearMediaCollection('gallery_images');
                                    $record->addMediaFromDisk($state, 'public')
                                        ->toMediaCollection('gallery_images');
                                }
                                return null; // Don't store in database field
                            })
                            ->getUploadedFileNameForStorageUsing(fn () => uniqid() . '.jpg'),
                    ]),


            ]);
    }
}
