<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_User extends Model
{
    protected $fillable = [
        'user_id', 'language_id'
    ];

    protected $table = 'language_users';
}
