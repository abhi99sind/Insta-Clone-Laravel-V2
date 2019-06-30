<?php

namespace App;
use App\User;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body','user_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
