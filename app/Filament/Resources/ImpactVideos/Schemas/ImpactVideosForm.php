<?php

namespace App\Filament\Resources\ImpactVideos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ImpactVideosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(150),
                DatePicker::make('published_at')->label('Published Date'),

                FileUpload::make('video_path')
                    ->directory('impact-videos')
                    ->disk('public')
                    ->visibility('public')
                    ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mov'])
                    ->maxSize(51200) // in KB = 50MB
                    ->label('Impact Video')
                    ->previewable(false), // (optional) disables broken preview boxes

                TextInput::make('button_link')->nullable()->label('External Video URL'),
                Textarea::make('description')->rows(4),
                TextInput::make('button_text')->default('Watch')->label('Button Text'),
                TextInput::make('order')->numeric()->default(0)->label('Display Order'),
                Toggle::make('is_visible')->default(true)->label('Visible'),
            ]);
    }
}
