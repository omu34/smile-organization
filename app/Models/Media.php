<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id', 'type', 'file_path', 'youtube_id', 'is_primary','youtube_url',
'position'

    ];

    protected $appends = ['full_image_url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getUrlAttribute(): ?string
    {
        return match ($this->type) {
            'image', 'video_local' => asset('storage/' . $this->file_path),
            'youtube' => 'https://www.youtube.com/watch?v=' . $this->youtube_id,
            default => null,
        };
    }

    /**
     * Accessor for getFullImageUrlAttribute
     *
     * This automatically creates the 'full_image_url' attribute.
     */

    public function getFullImageUrlAttribute(): string
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
