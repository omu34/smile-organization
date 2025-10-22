<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    protected $fillable = ['title','image_path','caption','is_featured','order'];
    protected $casts = ['is_featured'=>'boolean'];
}
