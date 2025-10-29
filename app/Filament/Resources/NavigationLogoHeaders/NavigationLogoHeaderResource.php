<?php

namespace App\Filament\Resources\NavigationLogoHeaders;

use App\Filament\Resources\NavigationLogoHeaders\Pages\CreateNavigationLogoHeader;
use App\Filament\Resources\NavigationLogoHeaders\Pages\EditNavigationLogoHeader;
use App\Filament\Resources\NavigationLogoHeaders\Pages\ListNavigationLogoHeaders;
use App\Filament\Resources\NavigationLogoHeaders\Schemas\NavigationLogoHeaderForm;
use App\Filament\Resources\NavigationLogoHeaders\Tables\NavigationLogoHeadersTable;
use App\Models\NavigationLogoHeader;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NavigationLogoHeaderResource extends Resource
{
    protected static ?string $model = NavigationLogoHeader::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Site Navigation';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $recordTitleAttribute = 'Smile';
    protected static ?string $label = 'Navigation Menu';

    public static function form(Schema $schema): Schema
    {
        return NavigationLogoHeaderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NavigationLogoHeadersTable::configure($table);
    }

    public static function getRelations(): array
{
    return [
        // ItemsRelationManager::class,
    ];
}

    public static function getPages(): array
    {
        return [
            'index' => ListNavigationLogoHeaders::route('/'),
            'create' => CreateNavigationLogoHeader::route('/create'),
            'edit' => EditNavigationLogoHeader::route('/{record}/edit'),
        ];
    }
}
