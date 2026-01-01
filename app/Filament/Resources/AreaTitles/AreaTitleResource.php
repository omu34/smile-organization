<?php

namespace App\Filament\Resources\AreaTitles;

use App\Filament\Resources\AreaTitles\Pages\CreateAreaTitle;
use App\Filament\Resources\AreaTitles\Pages\EditAreaTitle;
use App\Filament\Resources\AreaTitles\Pages\ListAreaTitles;
use App\Filament\Resources\AreaTitles\Schemas\AreaTitleForm;
use App\Filament\Resources\AreaTitles\Tables\AreaTitlesTable;
use App\Models\AreaTitle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AreaTitleResource extends Resource
{
    protected static ?string $model = AreaTitle::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Expertise';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $recordTitleAttribute = 'AreaTitle';

    public static function form(Schema $schema): Schema
    {
        return AreaTitleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreaTitlesTable::configure($table);
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
            'index' => ListAreaTitles::route('/'),
            'create' => CreateAreaTitle::route('/create'),
            'edit' => EditAreaTitle::route('/{record}/edit'),
        ];
    }
}
