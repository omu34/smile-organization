<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'extra_description',
        'image_path',
        'position', // determines ordering
        'alignment', // 'left' or 'right' (image position)
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saved(fn() => broadcast(new \App\Events\ResourceUpdated));
    }
}
