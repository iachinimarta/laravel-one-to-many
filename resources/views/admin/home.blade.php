{{-- Pagina che si vede dopo il login --}}

@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>HomePage</h1>

        <button type="button" class="btn btn-link">
            <a href="{{route('admin.posts.index')}}">Vai alla gestione dei post</a>
        </button>
    </div>
@endsection