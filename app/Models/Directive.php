<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directive extends Model
{
    /** @use HasFactory<\Database\Factories\DirectiveFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];


    
}
