<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUsFeature extends Model
{
    /** @use HasFactory<\Database\Factories\WhyUsFeatureFactory> */
    use HasFactory;
    protected $fillable = ['title', 'description', 'icon_path'];
}
