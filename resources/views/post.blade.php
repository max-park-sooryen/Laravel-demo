@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('home') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $title }}">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="body">{{ $body }}</textarea>
    </div>
    <input type="hidden" name="postID" value="{{ $postID }}">
    <input type="hidden" name="editOrNew" value="True">
    <button type="submit" class="btn btn-primary">Post</button>
    <var type="text" name="newpost"> </var>
</form>
</div>
@endsection