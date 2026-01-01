<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use App\Models\NavigationItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

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

            
            // Label input (auto slug generator)
            TextInput::make('label')
                ->label('Link Name')
                ->placeholder('e.g., About Us')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(
                    fn($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            // Slug (auto-generated but editable)
            TextInput::make('slug')
                ->label('Slug')
                ->placeholder('e.g., about-us')
                ->helperText('Automatically generated from label; can be edited.')
                ->unique(ignoreRecord: true),

            // URL input
            TextInput::make('url')
                ->label('Link URL')
                ->placeholder('https:// or /about')
                ->hint('Absolute or relative link.'),

            // Visibility
            Toggle::make('is_active')
                ->label('Visible on site')
                ->default(true),

            // Advanced fields grouped
            Group::make()
                ->schema([
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
                ->columns(2),


        ]);
    }
}
