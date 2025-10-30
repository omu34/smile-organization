<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'type',
        'file_path',
        'youtube_id',
        'is_primary',
    ];

    protected $appends = ['full_image_url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getFullImageUrlAttribute()
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }
}
