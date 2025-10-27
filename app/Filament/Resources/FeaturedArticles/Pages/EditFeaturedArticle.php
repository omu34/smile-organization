<?php

namespace App\Filament\Resources\FeaturedArticles\Pages;

use App\Filament\Resources\FeaturedArticles\FeaturedArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFeaturedArticle extends EditRecord
{
    protected static string $resource = FeaturedArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
