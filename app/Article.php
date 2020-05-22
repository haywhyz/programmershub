<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;

class Article extends Model
{
    protected $fillable = [
        'title', 'content','slug','published_at','image', 'user_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function hasTag($tagid)
    {
      return in_array($tagid, $this->tags->pluck('id')->toArray());
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
