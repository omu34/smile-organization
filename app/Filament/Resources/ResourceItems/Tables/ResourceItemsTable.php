<?php

namespace App\Filament\Resources\ResourceItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResourceItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               ImageColumn::make('image_path')->square(),
            TextColumn::make('title')->sortable()->searchable(),
            TextColumn::make('alignment')->sortable(),
            TextColumn::make('position')->sortable(),
            IconColumn::make('is_published')->boolean(),
            TextColumn::make('published_at')->date()->sortable(),
        ])
        ->defaultSort('position', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
