@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="card-title">{{$post->title}}</h2>
        <img class="" src="{{$post->image}}" alt="{{$post->title}}">
        <h3 class="my-3">{{$post->sub_title}}</h3>
        <h4>
            Category: {{ $post->category != null ? $post->category->name : 'Uncategorized' }}
        </h4>
        <div>
            <p class="card-text">{{$post->body}}</p>
        </div>
        @auth
        <div class="actions">
            <a href="#">Back to Admin</a>
        </div>
        @endauth
    </div>

@endsection