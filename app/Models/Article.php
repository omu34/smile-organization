<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

     protected $fillable = [
        'title',
        'excerpt',
        'body',
        'image_path',
        'read_time',
        'published_at',
    ];
}
