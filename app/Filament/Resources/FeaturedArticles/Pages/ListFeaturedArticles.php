<?php

namespace App\Filament\Resources\FeaturedArticles\Pages;

use App\Filament\Resources\FeaturedArticles\FeaturedArticleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeaturedArticles extends ListRecords
{
    protected static string $resource = FeaturedArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
