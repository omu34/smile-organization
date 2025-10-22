<?php

namespace App\Filament\Resources\FooterCtas\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FooterCtaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('platform_name')
                    ->required()
                    ->maxLength(255),
                Select::make('icon')
                    ->label('Heroicon')
                    ->options([
                        'heroicon-o-facebook' => 'Facebook',
                        'heroicon-o-linkedin' => 'LinkedIn',
                        'heroicon-o-twitter' => 'Twitter',
                        'heroicon-o-youtube' => 'YouTube',
                        'heroicon-o-instagram' => 'Instagram',
                        'heroicon-o-globe-alt' => 'Website / Other',
                    ])
                    ->searchable(),
                TextInput::make('url')
                    ->url()
                    ->required()
                    ->maxLength(255),
                ColorPicker::make('color')->default('#ffffff'),
                Toggle::make('is_active')->label('Active')->default(true),
                TextInput::make('order')->numeric()->default(0),
            ]);
    }
}
