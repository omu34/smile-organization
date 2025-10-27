<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitUs extends Model
{
    protected $fillable = ['location', 'phone', 'email', 'address','google_map_embed', 'hours', 'is_active'];
}
