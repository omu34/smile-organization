<?php

namespace App\Filament\Resources\Directives;

use App\Filament\Resources\Directives\Pages\CreateDirective;
use App\Filament\Resources\Directives\Pages\EditDirective;
use App\Filament\Resources\Directives\Pages\ListDirectives;
use App\Filament\Resources\Directives\Schemas\DirectiveForm;
use App\Filament\Resources\Directives\Tables\DirectivesTable;
use App\Models\Directive;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirectiveResource extends Resource
{
    protected static ?string $model = Directive::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Site Settings';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $recordTitleAttribute = 'Directive';

    public static function form(Schema $schema): Schema
    {
        return DirectiveForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirectivesTable::configure($table);
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
            'index' => ListDirectives::route('/'),
            'create' => CreateDirective::route('/create'),
            'edit' => EditDirective::route('/{record}/edit'),
        ];
    }
}
