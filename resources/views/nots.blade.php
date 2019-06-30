@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notifications</h1>
    <br>
    @foreach ($nots as $notification)
    <li>
        <a href='{{ route('post', $notification->data['comment']['post_id'])}}'>
            <strong>{{$notification->data['comment']['user']['username']}}</strong> commented on your post.
            <hr>
        </a>
    </li>
    @endforeach
</div>
@endsection
