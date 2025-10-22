<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use App\Models\NavigationMenu;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NavigationItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('navigation_menu_id')->relationship('menu', 'name')->required(),
                Select::make('parent_id')->label('Parent Item')
                    ->options(fn(callable $get) => \App\Models\NavigationItem::where('navigation_menu_id', $get('navigation_menu_id'))->pluck('label', 'id')->toArray())
                    ->searchable()
                    ->nullable(),
                TextInput::make('label')->required(),
                Textarea::make('description')->rows(2),
                TextInput::make('href'),
                TextInput::make('section_id'),
                TextInput::make('order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ]);
    }
}
