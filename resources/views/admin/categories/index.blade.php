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
    </div>
@endsection