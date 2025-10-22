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
                    ->visibility('public')
                    ->label('Upload Video (or provide URL)')
                    ->helperText('You may upload a .mp4 file or provide an external link below.'),
                TextInput::make('button_link')->nullable()->label('External Video URL'),
                Textarea::make('description')->rows(4),
                TextInput::make('button_text')->default('Watch')->label('Button Text'),
                TextInput::make('order')->numeric()->default(0)->label('Display Order'),
                Toggle::make('is_visible')->default(true)->label('Visible'),
            ]);
    }
}
