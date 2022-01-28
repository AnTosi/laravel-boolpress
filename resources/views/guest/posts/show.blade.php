@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="card-title">{{$post->title}}</h2>
        <img class="" src="{{$post->image}}" alt="{{$post->title}}">
        <h3 class="my-3">{{$post->sub_title}}</h3>
        <div class="metadata">
            <h4>
                @if($post->category)
                    Category: <a href="{{route('categories.posts', $post->category->slug)}}">{{$post->category->name}}</a> 
    
                @else
                    <span>'Uncategorized'</span>
                @endif
            </h4>
        </div>
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