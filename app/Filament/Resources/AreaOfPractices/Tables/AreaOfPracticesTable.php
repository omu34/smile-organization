<?php

namespace App\Filament\Resources\AreaOfPractices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AreaOfPracticesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subtitle'),
                 ImageColumn::make('full_image_path')
                    ->label('Image')
                    ->circular() // or use ->square()
                    ->size(50), // adjust thumbnail size
                TextColumn::make('button_name'),
                TextColumn::make('url')->limit(30),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('order')->sortable(),
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
