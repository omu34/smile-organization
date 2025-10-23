<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use App\Models\NavigationItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class NavigationItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('navigation_menu_id')
                ->label('Menu')
                ->relationship('menu', 'name')
                ->required()
                ->hint('Choose which menu this link belongs to.'),

            Select::make('parent_id')
                ->label('Parent Item')
                ->options(
                    fn(callable $get) =>
                    NavigationItem::where('navigation_menu_id', $get('navigation_menu_id'))
                        ->get()
                        ->mapWithKeys(fn($item) => [$item->id => $item->label ?? "Untitled #{$item->id}"])
                        ->toArray()
                )
                ->searchable()
                ->nullable()
                ->hint('Optional: nest this under another item.'),

            TextInput::make('label')
                ->label('Link Name')
                ->placeholder('e.g., About Us')
                ->required(),

            TextInput::make('url')
                ->label('Link URL')
                ->placeholder('https:// or /about')
                ->hint('Paste a link or relative path.'),

            Toggle::make('is_active')
                ->label('Visible on site')
                ->default(true)
                ->hint('Turn off to hide this link without deleting it.'),

            Group::make([
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Order')
                    ->hint('Lower numbers appear first.'),

                TextInput::make('target')
                    ->label('Open Link In')
                    ->placeholder('_self or _blank')
                    ->hint('Leave empty for normal behavior.'),
            ])
                // ->label('Advanced Settings')
                ->columns(2),
        ]);
    }
}
