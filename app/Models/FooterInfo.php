<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    protected $fillable = ['office_location', 'office_url', 'email', 'phone', 'copyright_text'];
}
