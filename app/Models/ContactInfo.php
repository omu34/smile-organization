<?php

namespace App\Models;

use App\Events\ContactInfoUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Broadcast;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'phone',
        'email',
        'address',
        'google_map_embed',
        'hours',
        'is_active',
    ];

    protected static function booted()
    {
        static::updated(function ($contact) {
            broadcast(new ContactInfoUpdated($contact->fresh()));
        });
    }
}
