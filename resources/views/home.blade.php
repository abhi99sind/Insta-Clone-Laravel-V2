@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{ $user->profile->image() }}" class="rounded-corners w-100" style="border-radius : 50%;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between">
                <div class="d-flex pb-3">
                <h1>{{ $user->username }}</h1>
                @cannot('view', $user->profile)
                <follow-button user-id = "{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endcannot
                </div>
            @can('view',$user->profile)
            <a href="/post/create">Add New Post</a>
            @endcan
            </div>
            @can('view',$user->profile)
            <a href="/profiles/{{$user->id}}/edit">Edit My Profile</a>
            @endcan
            <div class="d-flex pl-3">
            <div class="pr-3"><strong>{{ $postCount}}</strong> Posts</div>
            <div class="pr-3"><strong>{{ $followersCount }}</strong> Followers</div>
            <div class="pr-3"><strong>{{ $followingCount }}</strong> Following</div>
            </div>
        <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
        <div>{{$user->profile->description}}</div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach ($user->posts as $posts)
        <div class="col-4 pb-4">
        <a href="/post/{{$posts->id}}">
        <img src="/storage/{{$posts->img}}" class="w-100">

        </a>
        </div>
        @endforeach


    </div>
</div>
@endsection
