<?php

namespace App\Filament\Resources\FeaturedArticles\Pages;

use App\Filament\Resources\FeaturedArticles\FeaturedArticleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeaturedArticle extends CreateRecord
{
    protected static string $resource = FeaturedArticleResource::class;
}
