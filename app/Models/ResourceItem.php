<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'extra_description',
        'image_path',
        'video_path',
        'alignment',
        'is_published',
        'position',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saved(fn() => broadcast(new \App\Events\ResourceUpdated));
    }

    public function getImageUrlAttribute(): string
{
    return $this->image_path
        ? asset('storage/' . $this->image_path)
        : asset('resouces/placeholder.jpg'); // fallback
}

}
