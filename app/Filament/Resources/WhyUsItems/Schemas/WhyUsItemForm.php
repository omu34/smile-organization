<?php

namespace App\Filament\Resources\WhyUsItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WhyUsItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('why_us_images')
                    ->image()
                    ->label('Image Upload')
                    ->directory('why-us-items')
                    ->disk('public')
                    ->visibility('public')
                    ->required()
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('why_us_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('why_us_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('why_us_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('why_us_images');
                        }

                        return null;
                    }),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
