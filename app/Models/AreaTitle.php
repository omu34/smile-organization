<?php

namespace App\Models;

use App\Events\AreaTitleUpdated;
use Illuminate\Database\Eloquent\Model;

class AreaTitle extends Model
{
    protected $fillable = [
        'title',
        'description',       
    ];

    // protected $appends = ['full_image_path'];

    protected static function booted(): void
    {
        static::saved(fn () => event(new AreaTitleUpdated()));
        static::deleted(fn () => event(new AreaTitleUpdated()));
    }

   
}
