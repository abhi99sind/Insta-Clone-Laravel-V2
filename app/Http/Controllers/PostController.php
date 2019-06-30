<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
use Auth;
use Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index() //For Showing Posts
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->paginate(3);

        return view('insta',compact('posts'));
    }

    public function create()
    {
        return view('forms.create');
    }
    public function stores()
    {
        $data = request()->validate([
            'caption' => 'required',
            'img' => 'required|image',
        ]);
        $imagePath = request('img')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'img' => $imagePath,
        ]);
        return redirect('/profiles/'.auth()->user()->id);
    }
    public function show(\App\Post $po)
    {
        return view('show',compact('po'));
    }

    public function likePost($id)
    {
       Like::create([
           'post_id' => $id,
           'user_id' => Auth::id()
       ]);

       Session::flash('success', 'I liked that post');
       return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('post_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();
        return redirect()->back();
    }

    public function editPost($id)
    {
        $po = Post::find($id);
        return view('forms.editPost', compact('po'));
    }

    public function updatePost($id)
    {

        $data = request()->validate([
            'caption' => 'required',
            'img' => '',
        ]);
        $post = Post::find($id);
        if(request('img')){
            $imagePath = request('img')->store('post', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $arr = ['img' => $imagePath];
        }


        $post->update(array_merge(
            $data,
            $arr ?? []
        ));

        return redirect('/post/'.$id);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/profiles/'.$post->user_id);
    }
}
