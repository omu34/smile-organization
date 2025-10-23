<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(150),
                FileUpload::make('image')
                    ->image()
                    ->directory('activities')
                    ->disk('public') // ✅ important
                    ->visibility('public')
                    ->imagePreviewHeight('150'),
                Textarea::make('description')->rows(4)->required(),
                TextInput::make('button_text')->default('Detail'),
                TextInput::make('button_link')->nullable()->label('Optional Button Link'),
                Toggle::make('is_visible')->default(true)->label('Visible'),
                TextInput::make('order')->numeric()->default(0)->label('Display Order'),
            ]);
    }
}
