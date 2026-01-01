<?php

namespace App\Models;

use App\Events\AreaOfPractice as  AreaOfPracticeUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AreaOfPractice extends Model
{
    protected $fillable = [        
        'subtitle',
        'button_name',
        'url',
        'image_path',
        'is_active',
        'order',
    ];

    protected $appends = ['full_image_path'];

    protected static function booted(): void
    {
        static::saved(fn () => event(new AreaOfPracticeUpdated()));
        static::deleted(fn () => event(new AreaOfPracticeUpdated()));
    }


    public function getFullImagePathAttribute(): string
    {
        // Check if image_url is already a full URL (e.g., http://) or starts with /storage
        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        // Otherwise, assume it's a relative path from the 'public' disk
        // and generate a URL to it using the asset helper (avoid calling Filesystem::url()).
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}
