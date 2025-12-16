<?php

namespace App\Filament\Resources\GeneratedAssets\Tables;

use App\Models\GeneratedAsset;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GeneratedAssetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),

                TextColumn::make('type')
                    ->badge()
                    ->colors([
                        'primary' => 'text',
                        'info'    => 'image',
                    ])
                    ->sortable(),

                TextColumn::make('prompt')->limit(60),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'info'    => 'processing',
                        'success' => 'done',
                        'danger'  => 'failed',
                    ])
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending'    => 'Pending',
                        'processing' => 'Processing',
                        'done'       => 'Done',
                        'failed'     => 'Failed',
                        default      => ucfirst($state),
                    })
                    ->sortable(),

                ImageColumn::make('image_url')
                    ->label('Image')
                    ->disk(config('filesystems.default'))
                    // in case image_url isn't a native column:
                    ->state(fn (GeneratedAsset $record) => $record->image_url)
                    ->visible(fn (?GeneratedAsset $record) => filled($record?->image_path)),

                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Action::make('view')
                    ->label('Open')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn (GeneratedAsset $record) => $record->image_url)
                    ->openUrlInNewTab()
                    ->visible(fn (?GeneratedAsset $record) => filled($record?->image_path)),

                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
