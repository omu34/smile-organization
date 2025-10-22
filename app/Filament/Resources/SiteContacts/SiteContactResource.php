<?php

namespace App\Filament\Resources\SiteContacts;

use App\Filament\Resources\SiteContacts\Pages\CreateSiteContact;
use App\Filament\Resources\SiteContacts\Pages\EditSiteContact;
use App\Filament\Resources\SiteContacts\Pages\ListSiteContacts;
use App\Filament\Resources\SiteContacts\Schemas\SiteContactForm;
use App\Filament\Resources\SiteContacts\Tables\SiteContactsTable;
use App\Models\SiteContact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteContactResource extends Resource
{
    protected static ?string $model = SiteContact::class;

     protected static string | \UnitEnum | null $navigationGroup = 'Contacts';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-s-envelope';

    protected static ?string $recordTitleAttribute = 'SiteContacts';

    public static function form(Schema $schema): Schema
    {
        return SiteContactForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteContactsTable::configure($table);
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
            'index' => ListSiteContacts::route('/'),
            'create' => CreateSiteContact::route('/create'),
            'edit' => EditSiteContact::route('/{record}/edit'),
        ];
    }
}
