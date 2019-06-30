<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $with = ['user'];
    protected $fillable = ['post_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
