<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id', 'type', 'file_path', 'youtube_id', 'is_primary','youtube_url',
'position'

    ];

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
}
