<?php

namespace App\Filament\Resources\NavigationLogoHeaders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class NavigationLogoHeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('logo_images')
                    ->image()
                    ->directory('socials')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('logo_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('logo_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('logo_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('logo_images');
                        }

                        return null;
                    }),

            TextInput::make('link')
                ->label('Logo URL')
                // ->url()
                ->placeholder('https://example.com'),
        ]);
    }
}
