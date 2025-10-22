<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'founder_quote',
        'founder_name',
        'highlight_text',
        'highlight_link',
        'video_path',
        'background_opacity',
    ];
}

