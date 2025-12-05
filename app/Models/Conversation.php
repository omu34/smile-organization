<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'total_tokens', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
