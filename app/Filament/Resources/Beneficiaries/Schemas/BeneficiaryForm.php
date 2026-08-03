<?php

namespace App\Filament\Resources\Beneficiaries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BeneficiaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')->required(),
                FileUpload::make('beneficiary_images')
                    ->image()
                    ->directory('beneficiaries')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('beneficiary_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('beneficiary_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('beneficiary_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('beneficiary_images');
                        }

                        return null;
                    }),
                Textarea::make('description')->rows(4)->required(),
                DatePicker::make('published_at')->default(now()),
                Toggle::make('is_published')->label('Published')->default(true),
            ]);
    }
}
