<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('platform_name')->required(),
                TextInput::make('url')->url()->required(),
                FileUpload::make('social_images')
                    ->image()
                    ->directory('socials')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('social_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('social_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('social_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('social_images');
                        }

                        return null;
                    }),
                Toggle::make('is_active')->default(true),
                TextInput::make('order')->numeric()->default(0),
            ]);
    }
}
