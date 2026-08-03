<?php

namespace App\Filament\Resources\ResourceItems\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ResourceItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->label('Main Title'),
                Textarea::make('description')->label('Main Description'),
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')->required(),
                FileUpload::make('resource_images')
                    ->image()
                    ->directory('resources')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('resource_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('resource_images');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('resource_images');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('resource_images');
                        }

                        return null;
                    }),
                FileUpload::make('resource_videos')
                    ->directory('resources')
                    ->disk('public')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('resource_videos');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('resource_videos');
                        }
                    })
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $state) {
                            $record->clearMediaCollection('resource_videos');
                            $record->addMediaFromDisk($state, 'public')
                                ->toMediaCollection('resource_videos');
                        }

                        return null;
                    }),
                Textarea::make('description')->rows(3)->required(),
                Textarea::make('extra_description')->rows(4),
                Select::make('alignment')
                    ->options(['left' => 'Left', 'right' => 'Right'])
                    ->default('left'),
                TextInput::make('position')->numeric()->default(0),
                Toggle::make('is_published')->default(true),
                DatePicker::make('published_at')->default(now()),
            ]);
    }
}
