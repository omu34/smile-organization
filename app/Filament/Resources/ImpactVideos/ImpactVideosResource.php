<?php

namespace App\Filament\Resources\ImpactVideos;

use App\Filament\Resources\ImpactVideos\Pages\CreateImpactVideos;
use App\Filament\Resources\ImpactVideos\Pages\EditImpactVideos;
use App\Filament\Resources\ImpactVideos\Pages\ListImpactVideos;
use App\Filament\Resources\ImpactVideos\Schemas\ImpactVideosForm;
use App\Filament\Resources\ImpactVideos\Tables\ImpactVideosTable;
use App\Models\Video;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ImpactVideosResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Hero';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-video-camera';

    // ✅ These control the displayed names
    protected static ?string $modelLabel = 'Impact Video';
    protected static ?string $pluralModelLabel = 'Impact Videos';
    protected static ?string $recordTitleAttribute = 'title'; // assuming your Video model has a title column



    public static function form(Schema $schema): Schema
    {
        return ImpactVideosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImpactVideosTable::configure($table);
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
            'index' => ListImpactVideos::route('/'),
            'create' => CreateImpactVideos::route('/create'),
            'edit' => EditImpactVideos::route('/{record}/edit'),
        ];
    }
}
