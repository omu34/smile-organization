<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    /** @use HasFactory<\Database\Factories\AboutSectionFactory> */
    use HasFactory;
    protected $fillable = ['title', 'description', 'image_path',];
}
