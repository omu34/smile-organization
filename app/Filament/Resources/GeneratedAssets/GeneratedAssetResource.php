<?php

namespace App\Filament\Resources\GeneratedAssets;

use App\Filament\Resources\GeneratedAssets\Pages\CreateGeneratedAsset;
use App\Filament\Resources\GeneratedAssets\Pages\EditGeneratedAsset;
use App\Filament\Resources\GeneratedAssets\Pages\ListGeneratedAssets;
use App\Filament\Resources\GeneratedAssets\Schemas\GeneratedAssetForm;
use App\Filament\Resources\GeneratedAssets\Tables\GeneratedAssetsTable;
use App\Models\GeneratedAsset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GeneratedAssetResource extends Resource
{
    protected static ?string $model = GeneratedAsset::class;
    protected static string|BackedEnum|null $navigationIcon = "heroicon-o-archive-box";
    protected static ?string $recordTitleAttribute = 'GenerateAsset';
    protected static ?string $navigationLabel = 'My AI Content';
    protected static string | \UnitEnum | null $navigationGroup = 'AI';

    public static function form(Schema $schema): Schema
    {
        return GeneratedAssetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GeneratedAssetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGeneratedAssets::route('/'),
            'create' => CreateGeneratedAsset::route('/create'),
            'edit' => EditGeneratedAsset::route('/{record}/edit'),
        ];
    }
}
