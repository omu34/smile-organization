<?php

namespace App\Filament\Resources\WhyUsFeatures\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WhyUsFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('icon_path')->directory('whyus/icons'),
                TextInput::make('title')->required(),
                Textarea::make('description')->rows(3),
            ]);
    }
}
