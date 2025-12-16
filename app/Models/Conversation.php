<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['owner_type','owner_id','title','meta'];

    protected $casts = ['meta'=>'array'];

    public function owner()
    {
        return $this->morphTo();
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at','asc');
    }
}
