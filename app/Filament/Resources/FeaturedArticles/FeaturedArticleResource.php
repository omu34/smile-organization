<?php

namespace App\Filament\Resources\FeaturedArticles;

use App\Filament\Resources\FeaturedArticles\Pages\CreateFeaturedArticle;
use App\Filament\Resources\FeaturedArticles\Pages\EditFeaturedArticle;
use App\Filament\Resources\FeaturedArticles\Pages\ListFeaturedArticles;
use App\Filament\Resources\FeaturedArticles\Schemas\FeaturedArticleForm;
use App\Filament\Resources\FeaturedArticles\Tables\FeaturedArticlesTable;
use App\Models\FeaturedArticle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class FeaturedArticleResource extends Resource
{
    protected static ?string $model = FeaturedArticle::class;
    
    protected static string | \UnitEnum | null $navigationGroup = 'Media';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'FeatureArticle';

    public static function form(Schema $schema): Schema
    {
        return FeaturedArticleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeaturedArticlesTable::configure($table);
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
            'index' => ListFeaturedArticles::route('/'),
            'create' => CreateFeaturedArticle::route('/create'),
            'edit' => EditFeaturedArticle::route('/{record}/edit'),
        ];
    }
}
