@extends('layouts.app')

@section('content')
    <div>Show</div>
    <div class="container">
        <h3>Info</h3>
        <ul class="mb-5">
            <li>
                Title: <strong>{{$post->title}}</strong>
            </li>
            <li>Content: {{$post->content}}</li>
            <li>Category: {{$post->category?$post->category->name:'NULL'}}</li>
        </ul>

        <a href="{{route('admin.posts.index')}}" class="btn btn-info"><-</a>
    </div>
@endsection