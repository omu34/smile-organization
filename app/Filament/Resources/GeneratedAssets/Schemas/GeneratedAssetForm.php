<?php

namespace App\Filament\Resources\GeneratedAssets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\KeyValue;

class GeneratedAssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Details')->schema([
                    TextInput::make('type')->disabled(),
                    Textarea::make('prompt')->disabled(),
                    Textarea::make('result_text')->disabled(),
                    KeyValue::make('meta')->disabled(),
                    TextInput::make('status')->disabled(),
                    TextInput::make('error')->disabled(),
                ]),
            ]);
    }
}
