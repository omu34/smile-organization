<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                FileUpload::make('partner_logo')
                    ->image()
                    ->directory('partner-logos')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('partner_logo');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('partner_logo');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('partner_logo');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('partner_logo');
                        }

                        return null;
                    }),
                Textarea::make('testimonial')->rows(3),
                TextInput::make('rating')->numeric()->default(5)->minValue(1)->maxValue(5),
                TextInput::make('reviews_count')->numeric()->default(0),
                TextInput::make('website_url')->url()->nullable(),
                Toggle::make('is_featured')->default(true),
            ]);
    }
}
