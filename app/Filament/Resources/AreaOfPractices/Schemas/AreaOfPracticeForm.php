<?php

namespace App\Filament\Resources\AreaOfPractices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AreaOfPracticeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subtitle')->required(),
                TextInput::make('button_name')->required(),
                TextInput::make('url')->url()->required(),
                FileUpload::make('area_images')
                    ->image()
                    ->directory('areas_of_practice')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('area_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('area_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('area_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('area_images');
                        }

                        return null;
                    }),
                Toggle::make('is_active')->default(true),
                TextInput::make('order')->numeric()->default(0),
            ]);
    }
}
