@extends('layouts.app')

@section('content')
    <div class="container">Create
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required max="50" value="{{old('title', $post->title)}}">
            </div>

            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <div class="form-floating mb-4">
                <label for="floatingTextarea">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Insert content here" id="floatingTextarea" name="content">{{old('content', $post->content)}}</textarea>        
            </div>

            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Update</button>

            </form>
    </div>
@endsection