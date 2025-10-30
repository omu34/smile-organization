<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('full_image_path')
                    ->label('Image')
                    ->circular() // or use ->square()
                    ->size(50), // adjust thumbnail size
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('created_at')->date(),
            ])
            ->reorderable('order')
            // ImageColumn::make('image')
            //         ->label('Image')
            //         ->disk('public')
            //         ->square()
            //         ->height(80),

            //     TextColumn::make('title')
            //         ->label('Title')
            //         ->searchable()
            //         ->sortable(),

            //     TextColumn::make('category')
            //         ->label('Category')
            //         ->sortable()
            //         ->searchable(),

            //     TextColumn::make('created_at')
            //         ->label('Created')
            //         ->dateTime('M d, Y')
            //         ->sortable(),
            // ])
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
