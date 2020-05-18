<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    protected $fillable = [
        'title', 'content','slug','published_at','image', 'user_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
