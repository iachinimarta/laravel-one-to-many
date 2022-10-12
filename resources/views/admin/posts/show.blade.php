@extends('layouts.app')

@section('content')
    <div class="container">Show</div>
    <span>{{$post->category?$post->category->name:'NULL'}}</span>
@endsection