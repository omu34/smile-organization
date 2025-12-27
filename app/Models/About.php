<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    protected $fillable = [
        'title', 'body', 'slug', 'media_type', 'file_path', 'youtube_id',
    ];

    protected $appends = ['full_file_path', 'primary_media'];

    public function getPrimaryMediaAttribute()
    {
        return (object)[
            'type' => $this->media_type,
            'file_path' => $this->file_path,
            'youtube_id' => $this->youtube_id,
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }


   /**
     * Accessor for getFullImageUrlAttribute
     *
     * This automatically creates the 'full_image_url' attribute.
     */

    public function getFullFilePathAttribute(): string
    {
        // Check if image_url is already a full URL (e.g., http://) or starts with /storage
        if (Str::startsWith($this->file_path, ['http', '/storage'])) {
            return $this->file_path;
        }

        // Otherwise, assume it's a relative path from the 'public' disk
        // and generate a URL to it using the asset helper (avoid calling Filesystem::url()).
        return asset('storage/' . ltrim($this->file_path, '/'));
    }
}
