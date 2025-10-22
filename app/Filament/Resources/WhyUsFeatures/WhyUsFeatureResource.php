<?php

namespace App\Filament\Resources\WhyUsFeatures;

use App\Filament\Resources\WhyUsFeatures\Pages\CreateWhyUsFeature;
use App\Filament\Resources\WhyUsFeatures\Pages\EditWhyUsFeature;
use App\Filament\Resources\WhyUsFeatures\Pages\ListWhyUsFeatures;
use App\Filament\Resources\WhyUsFeatures\Schemas\WhyUsFeatureForm;
use App\Filament\Resources\WhyUsFeatures\Tables\WhyUsFeaturesTable;
use App\Models\WhyUsFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WhyUsFeatureResource extends Resource
{
    protected static ?string $model = WhyUsFeature::class;

     protected static string | \UnitEnum | null $navigationGroup = 'Homepage Sections';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-light-bulb';
    // protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    // protected static ?string $navigationGroup = 'Homepage Sections';

    protected static ?string $recordTitleAttribute = 'smile';

    public static function form(Schema $schema): Schema
    {
        return WhyUsFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WhyUsFeaturesTable::configure($table);
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
            'index' => ListWhyUsFeatures::route('/'),
            'create' => CreateWhyUsFeature::route('/create'),
            'edit' => EditWhyUsFeature::route('/{record}/edit'),
        ];
    }
}
