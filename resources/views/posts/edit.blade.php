@extends('layouts.master')


@section('content')

<div class="col-sm-8 blog-main">

<form method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">

        <label for="title">Title:</label>

        <input class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}" required>

    </div>

    <div class="form-group">

        <label for="body">Body:</label>

        <input class="form-control" type="text" name="body" value="{{ old('body', $post->body) }}" required>

    </div>

    <div class="form-group">
        
        <button type="submit" class="btn btn-primary">update</button>

      </div>

</form>

</div>

@endsection