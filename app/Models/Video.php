<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video_path', // This stores the *original* URL or path
        'image_path',
        'is_visible',
        'order',
        'published_at',
    ];

    /**
     * Appended attributes to make them available on the model.
     */
    protected $appends = ['embed_url', 'thumbnail', 'video_id'];

    /**
     * Get just the video ID from YouTube/Vimeo path.
     */
    public function getVideoIdAttribute()
    {
        $path = $this->video_path;

        if (!$path) return null;

        $id = null;

        if (Str::contains($path, ['youtube.com', 'youtu.be'])) {
            if (Str::contains($path, 'watch?v=')) {
                $id = Str::after($path, 'watch?v=');
            } elseif (Str::contains($path, 'youtu.be/')) {
                $id = Str::after($path, 'youtu.be/');
            }
            // Clean up any extra URL parameters (like &t=10s)
            return $id ? Str::before($id, '&') : null;
        }

        if (Str::contains($path, 'vimeo.com')) {
            $id = Str::afterLast($path, '/');
            // Clean up any extra URL parameters
            return $id ? Str::before($id, '?') : null;
        }

        return null; // Not a YouTube or Vimeo video
    }

    /**
     * Get a usable *base* embed URL for YouTube/Vimeo/local videos.
     * NO autoplay or mute parameters here.
     */
    public function getEmbedUrlAttribute()
    {
        $path = $this->video_path;
        $videoId = $this->video_id; // Use the accessor we just defined

        if (!$path) return null;

        // 🎥 YouTube - Return base embed URL
        if (Str::contains($path, ['youtube.com', 'youtu.be'])) {
            return $videoId
                ? "https://www.youtube.com/embed/{$videoId}"
                : null;
        }

        // 🎞 Vimeo - Return base embed URL
        if (Str::contains($path, 'vimeo.com')) {
            return $videoId
                ? "https://player.vimeo.com/video/{$videoId}"
                : null;
        }

        // 📁 Local video file
        return Storage::url($path);
    }

    /**
     * Get a thumbnail image for the video.
     */
    public function getThumbnailAttribute()
    {
        $videoId = $this->video_id; // Use the accessor

        // 🎥 YouTube Thumbnail
        if ($videoId && Str::contains($this->video_path, ['youtube.com', 'youtu.be'])) {
            return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
        }

        // 🎞 Vimeo (Vimeo requires API for thumbnails, use a placeholder)
        if ($videoId && Str::contains($this->video_path, 'vimeo.com')) {
            return asset('images/vimeo-placeholder.jpg'); // You'll need this image
        }

        // 📁 Local uploaded thumbnail or fallback
        if ($this->image_path && Storage::exists($this->image_path)) {
            return Storage::url($this->image_path);
        }

        // ⚠️ Fallback
        return asset('images/default-video-thumbnail.jpg'); // You'll need this image
    }
}


