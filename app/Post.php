<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array();

        foreach($this->like as $l):
            array_push($likers, $l->user_id);
        endforeach;
        if(in_array($id,$likers))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function canEdit($post_id)
    {
        $id = Auth::id();
        if($id == $post_id)
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
