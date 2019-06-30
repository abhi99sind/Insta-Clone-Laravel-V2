@extends('layouts.app')

@section('content')
<div class="container">
<form action="/post/{{$po->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="row">
                            <h1>Edit Post</h1>
                        </div>
                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label ">Caption</label>
                            <input id="caption"
                            type="text"
                            name="caption"
                            class="form-control
                            @error('caption') is-invalid @enderror"
                            name="caption"
                            value="{{ old('caption') ?? $po->caption}}"
                            required autocomplete="caption" autofocus>
                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <label for="img" class="col-md-4 col-form-label ">Image</label>
                            <input type="file"
                            class="form-control-file"
                            name="img"
                             id="img">
                            @error('img')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="row pt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>


@endsection
