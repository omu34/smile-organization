<?php

namespace App\Filament\Resources\Directives\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DirectiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Title'),

                Textarea::make('description')
                    ->rows(5)
                    ->required()
                    ->label('Description'),

                Select::make('icon')
                    ->label('Heroicon')
                    ->options([
                        'heroicon-o-home-modern' => 'Mission',
                        'heroicon-o-book-open' => 'Objectives',
                        'heroicon-o-eye' => 'Vision',
                        'heroicon-o-globe-alt' => 'Global',
                        'heroicon-o-heart' => 'Humanitarian',
                        'heroicon-o-hand-raised' => 'Advocacy',
                    ])
                    ->searchable(),

                ColorPicker::make('color')
                    ->default('#6366F1')
                    ->label('Icon Color'),

                Toggle::make('is_active')
                    ->default(true)
                    ->label('Active'),

                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Order'),
            ]);
    }
}
