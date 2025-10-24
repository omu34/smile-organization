<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Event;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\ImpactVideoFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'published_at',
        'video_path',
        'description',
        'button_text',
        'button_link',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_visible' => 'boolean',
    ];




protected static function booted()
{
    static::created(function ($video) {
        Event::dispatch('video.created', $video);
    });
}


public function getImageUrlAttribute(): string
{
    return $this->video_path
        ? asset('storage/' . $this->video_path)
        : asset('videos/placeholder.mp4'); // fallback
}



}
