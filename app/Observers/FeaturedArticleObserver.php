<?php

namespace App\Observers;

use App\Models\FeaturedArticle;
use Illuminate\Support\Facades\Storage;

class FeaturedArticleObserver
{
    public function saving(FeaturedArticle $article): void
    {
        if ($article->isDirty('media_url') && $article->media_type === 'video' && $article->media_url) {
            $path = storage_path('app/public/' . $article->media_url);
            $thumb = 'featured-thumbnails/' . uniqid() . '.jpg';
            $thumbPath = storage_path('app/public/' . $thumb);

            @exec("ffmpeg -i {$path} -ss 00:00:02 -vframes 1 {$thumbPath}");
            $article->thumbnail_url = $thumb;
        }
    }
}
