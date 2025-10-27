<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\ArticleUpdated;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'is_featured',
        'reading_time_minutes',
        'position',
        'is_published',
    ];

    /**
     * Configure slug generation
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Boot model hooks
     */
    protected static function booted()
    {
        // Auto-generate slug if not set
        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        // Broadcast update event after save
        static::saved(function ($article) {
            broadcast(new ArticleUpdated($article));
        });
    }

    /**
     * Relationships
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function primaryMedia()
    {
        return $this->hasOne(Media::class)->where('is_primary', true);
    }
}
