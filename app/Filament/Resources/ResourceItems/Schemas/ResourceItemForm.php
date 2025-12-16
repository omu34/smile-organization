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
                FileUpload::make('image_path')
                    ->image()
                    ->directory('resources')
                    ->disk('public') // ✅ important
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
                FileUpload::make('video_path')
                    ->image()
                    ->directory('resources')
                    ->disk('public') // ✅ important
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
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
