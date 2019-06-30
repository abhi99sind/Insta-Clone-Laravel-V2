@extends('layouts.app')

@section('content')
<head>
<meta name="_token" content="{{csrf_token()}}" />
</head>
<div class="container" id="sec">
<div class="row">
    <div class="col-8">
        <img src="/storage/{{$po->img}}" class="w-100" height="600" width="600">
    </div>
    <div class="col-4" style="border-style:groove;">
        <div>
        <div class="d-flex align-items-center">
            <div class="pr-3">
            <img src="{{ $po->user->profile->image() }}" class="w-100" style="max-width : 60px;">
            </div>
            <div>
            <div class="font-weight-bold">
            <a href="/profiles/{{$po->user->id}}"><span class="text-dark">{{ $po->user->username }}</a></span>
            {{-- @cannot('view', $po->user->profile)
                <follow-button user-id = "{{ $po->user->id }}" follows="{{ $follows }}"></follow-button>
            @endcannot --}}
            </div>
            </div>
            @if($po->canEdit($po->user_id))
            <div class="dropdown pl-5">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Post Settings
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="{{ route('post.edit', ['id' => $po->id] ) }}" class="dropdown-item">Edit Post</a>
                <a href="/post/{{$po->id}}/delete" class="dropdown-item">Delete Post</a>

                </div>
            </div>
            @endif
        </div>
        <hr>
        @if($po->is_liked_by_auth_user())
            <a href="{{ route('post.unlike', ['id' => $po->id ]) }}" class="btn btn-success btn-xs">Liked  <span class="badge">{{$po->like->count()}}</span></a>
        @else
    <a href="{{ route('post.like', ['id' => $po->id ]) }}" class="btn btn-primary btn-xs">Like <span class="badge">{{$po->like->count()}}</span>
            </a>

        @endif
        <p><div class="font-weight-bold">
            </div><strong>{{$po->caption}}</strong></p>

        </div>
        <div>
        <hr>
        <comment po="{{$po->toJson()}}" users="{{Auth::check() ? Auth::user()->toJson() : 'null'}}"></comment>
        </div>
    </div>

</div>
</div>
@endsection

