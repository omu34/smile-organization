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
            TextColumn::make('label')->searchable(),
            TextColumn::make('menu.name')->label('Menu')->sortable(),
            TextColumn::make('parent.label')->label('Parent')->sortable(),
            TextColumn::make('order')->sortable(),
            BooleanColumn::make('is_active'),
        ])
        ->actions([EditAction::make()])
        ->bulkActions([DeleteBulkAction::make()]);
    }

    
}
