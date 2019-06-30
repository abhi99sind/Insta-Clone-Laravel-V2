<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Auth\AuthManager;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        return view('home', [
            'user' => $user,
            'follows' => $follows,
            'postCount' => $postCount,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount
        ]);
    }
    public function edit(\App\User $user)
    {
        $this->authorize('view',$user->profile);
        return view('forms.editProfile', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('view',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'img' => '',
        ]);
        if(request('img')){
        $imagePath = request('img')->store('profile', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
        $arr = ['img' => $imagePath];
        }


        $user->profile->update(array_merge(
            $data,
            $arr ?? []
        ));
        return redirect("/profiles/{$user->id}");
    }

}

