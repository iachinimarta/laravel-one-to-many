@extends('layouts.app')

@section('content')
    <div class="container">Create
        <form action="{{route('admin.posts.store')}}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required max="50" value="{{old('title')}}">
            </div>

            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <div class="form-floating mb-4">
                <label for="floatingTextarea">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Insert content here" id="floatingTextarea" name="content" required>{{old('content')}}</textarea>        
            </div>

            @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>

            </form>
    </div>
@endsection