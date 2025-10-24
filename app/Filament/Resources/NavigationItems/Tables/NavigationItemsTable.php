<?php

namespace App\Filament\Resources\NavigationItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Table;

class NavigationItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('menu.name')
                ->label('Menu')
                ->sortable()
                ->searchable(),

            TextColumn::make('label')
                ->label('Label')
                ->sortable()
                ->searchable(),

            TextColumn::make('slug')
                ->label('Slug')
                ->sortable(),

            TextColumn::make('url')
                ->label('URL')
                ->limit(40)
                ->tooltip(fn ($record) => $record->url),

            TextColumn::make('parent.label')
                ->label('Parent')
                ->sortable(),

            TextColumn::make('order')
                ->label('Order')
                ->sortable(),

            IconColumn::make('is_active')
                ->label('Active')
                ->boolean(),
        ])
        ->actions([EditAction::make()])
        ->bulkActions([DeleteBulkAction::make()]);
    }


}
