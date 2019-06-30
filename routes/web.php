<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/new',function(){
    return view('new');
});
Route::get('/', 'PostController@index');
Route::post('follow/{user}', 'FollowController@store');
Route::get('/post/create', 'PostController@create');
Route::get('/post/{po}', 'PostController@show')->name('post');
Route::post('/post', 'PostController@stores');
Route::get('/profiles/{user}', 'ProfilesController@index')->name('profiles.show');
Route::get('/profiles/{user}/edit', 'ProfilesController@edit');
Route::patch('/profiles/{user}', 'ProfilesController@update');
Route::get('/post/like/{id}','PostController@likePost')->name('post.like');
Route::get('/post/unlike/{id}','PostController@unlike')->name('post.unlike');
Route::get('post/{po}/edit', 'PostController@editPost')->name('post.edit');
Route::patch('/post/{po}', 'PostController@updatePost');
Route::get('/post/{po}/delete','PostController@deletePost');
Route::get('/read', function(){
    auth()->user()->unreadNotifications->markAsRead();
});
Route::get('/unread_nots', function(){
    return auth()->user()->unreadNotifications;
});
Route::get('/nots', 'CommentController@nots');
Route::get('/getUsers', function (){
    return view('users');
});
