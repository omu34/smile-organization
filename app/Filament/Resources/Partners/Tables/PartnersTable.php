<?php

namespace App\Filament\Resources\Partners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('full_logo')
                    ->label('Logo')
                    ->circular() // or use ->square()
                    ->size(50), // adjust thumbnail size
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('rating')->sortable(),
            TextColumn::make('reviews_count')->sortable(),
            TextColumn::make('website_url')->limit(20),
            IconColumn::make('is_featured')->boolean(),
        ])
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
