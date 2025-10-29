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
                FileUpload::make('logo_path')
                    ->image()
                    ->directory('partner-logos')
                    ->disk('public') // ✅ important
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
                Textarea::make('testimonial')->rows(3),
                TextInput::make('rating')->numeric()->default(5)->minValue(1)->maxValue(5),
                TextInput::make('reviews_count')->numeric()->default(0),
                TextInput::make('website_url')->url()->nullable(),
                Toggle::make('is_featured')->default(true),
            ]);
    }
}
