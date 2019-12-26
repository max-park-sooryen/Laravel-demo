@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('post') }}"><button class="btn btn-primary">Create Post</button></a>
    @foreach($posts as $post)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">Title: {{ $post['title'] }}</br></h1>
                    <hr class="my-4">
                    <p>Username: {{ $post['username'] }}<br></p>
                    <h2><?php echo nl2br($post['body']) ?></h2>
                    @if ($post['username'] == $username)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{ route('post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="postTitle" value ="{{ $post['title'] }}">
                                <input type="hidden" name="postBody" value="{{ $post['body'] }}">
                                <input type="hidden" name="postID" value="{{ $post['id'] }}">
                                <button type="submit" class="btn btn-secondary pull-right">Edit</button>
                            </form>
                            <form action="{{ route('home') }}" method="POST">
                                @csrf
                                <input type="hidden" name="postID" value="{{ $post['id'] }}">
                                <input type="hidden" name="deleted" value="True">
                                <button type="submit" class="btn btn-secondary">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection


