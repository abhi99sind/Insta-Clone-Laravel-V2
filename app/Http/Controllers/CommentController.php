<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Auth;
use App\Events\NewComment;
use Illuminate\Http\Request;
use App\Notifications\CommentToPost;
use App\User;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function index(Post $po)
    {
        return response()->json($po->comments()->with('user')->latest()->get());
    }

    public function store(Request $request)
    {
        // $comment = $post->comments()->create([
        //     'body' => $request->body,
        //     'user_id' => Auth::id(),
        //     'post_id' => $post->id
        // ]);
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();
        //alert('success');

        $c = Comment::where('id',$comment->id)->with('user')->first();
        broadcast(new NewComment($c));//->toOthers();
        $post = Post::find($request->post_id);
        $user = User::find($request->user_id);
        Notification::send($user, new CommentToPost($c,$user,$post));
        return $c->toJson();

    }

    public function nots()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $nots = Auth::user()->notifications;
        return view('nots',compact('nots'));
    }
}
