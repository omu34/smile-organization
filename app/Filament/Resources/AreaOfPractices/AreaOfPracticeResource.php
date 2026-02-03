<?php

namespace App\Filament\Resources\AreaOfPractices;

use App\Filament\Resources\AreaOfPractices\Pages\CreateAreaOfPractice;
use App\Filament\Resources\AreaOfPractices\Pages\EditAreaOfPractice;
use App\Filament\Resources\AreaOfPractices\Pages\ListAreaOfPractices;
use App\Filament\Resources\AreaOfPractices\Schemas\AreaOfPracticeForm;
use App\Filament\Resources\AreaOfPractices\Tables\AreaOfPracticesTable;
use App\Models\AreaOfPractice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AreaOfPracticeResource extends Resource
{

    protected static ?string $model = AreaOfPractice::class;
    protected static string | \UnitEnum | null $navigationGroup = 'Expertise';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static ?string $recordTitleAttribute = 'Area Of Practice';

    public static function form(Schema $schema): Schema
    {
        return AreaOfPracticeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreaOfPracticesTable::configure($table);
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
            'index' => ListAreaOfPractices::route('/'),
            'create' => CreateAreaOfPractice::route('/create'),
            'edit' => EditAreaOfPractice::route('/{record}/edit'),
        ];
    }
}
