<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    protected $fillable = [
        'title', 'body', 'slug', 'media_type', 'file_path', 'youtube_id',
    ];

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
}
