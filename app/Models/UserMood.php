<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMood extends Model
{
    protected $table = 'user_moods';
    protected $fillable = [
        'user_id',
        'mood',
        'ip',
    ];
}
