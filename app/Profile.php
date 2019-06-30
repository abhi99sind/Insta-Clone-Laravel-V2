<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function image(){
        $path = ($this->img) ?  $this->img : 'profile/vDpksvdV4dHMeBpXdXFAORVXCe5v4ZQswQe4bNdy.png';
        return '/storage/'. $path;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
