<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterCta extends Model
{
    protected $fillable = ['label', 'url', 'style_class', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
