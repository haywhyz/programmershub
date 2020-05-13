<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization_User extends Model
{
    protected $fillable = [
        'user_id', 'specialization_id'
    ];
    protected $table = 'specialization_users';
}
