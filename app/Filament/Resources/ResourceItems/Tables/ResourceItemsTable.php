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
                ImageColumn::make('full_image_path')
                    ->label('Image')
                    ->circular() // or use ->square()
                    ->size(50), // adjust thumbnail size


                TextColumn::make('video_path')
                    ->label('Video')
                    ->limit(30)
                    ->tooltip(fn($state) => $state),


                // ImageColumn::make('image_path')->square(),
                TextColumn::make('platform_name'),
                TextColumn::make('url')->limit(30),
                IconColumn::make('is_published')->boolean(),
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
