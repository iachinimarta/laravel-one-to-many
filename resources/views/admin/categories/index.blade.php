@extends('layouts.app')

@section('content')
    <div>Index di category</div>

    <div class="container">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <h3>{{$category->name}}</h3>
                    <p>{{$category->description}}</p>
                </li>
            @endforeach
        </ul>
        <div class="text-center">
            <button class="btn btn-info text"><a href="{{route('admin.posts.index')}}"><-</a></button>
        </div>
        
    </div>
@endsection