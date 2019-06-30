<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model ;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->username
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
