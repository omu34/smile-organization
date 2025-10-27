<?php

namespace App\Filament\Resources\VisitUs;

use App\Filament\Resources\VisitUs\Pages\CreateVisitUs;
use App\Filament\Resources\VisitUs\Pages\EditVisitUs;
use App\Filament\Resources\VisitUs\Pages\ListVisitUs;
use App\Filament\Resources\VisitUs\Schemas\VisitUsForm;
use App\Filament\Resources\VisitUs\Tables\VisitUsTable;
use App\Models\VisitUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisitUsResource extends Resource
{
    protected static ?string $model = VisitUs::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Content Management';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $recordTitleAttribute = 'VisitUs';

    public static function form(Schema $schema): Schema
    {
        return VisitUsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitUsTable::configure($table);
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
            'index' => ListVisitUs::route('/'),
            'create' => CreateVisitUs::route('/create'),
            'edit' => EditVisitUs::route('/{record}/edit'),
        ];
    }
}
