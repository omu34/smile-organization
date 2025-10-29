<?php

namespace App\Filament\Resources\FeaturedArticles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeaturedArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('full_image_path')
                    ->label('Image')
                    ->circular() // or use ->square()
                    ->size(50), // adjust thumbnail size
                ImageColumn::make('thumbnail_url')->label('Thumbnail')->square(),
                TextColumn::make('title')->searchable()->sortable(),
                BadgeColumn::make('media_type')->colors([
                    'info' => 'image',
                    'success' => 'video',
                    'danger' => 'youtube',
                ]),
                IconColumn::make('is_featured')->boolean(),
                TextColumn::make('created_at')->date(),
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
