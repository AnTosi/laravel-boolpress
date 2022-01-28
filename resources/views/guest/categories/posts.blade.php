@extends('layouts.app')

@section('content')
    <div class="p-5 bg-dark text-white">
        <div class="container">
            <h1 class="display-3">Category: {{$category->name}}</h1>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            @forelse($posts as $post)
            <div class="col-3">
                <a href="{{route('posts.show', $post->slug)}}" class="metadata">
                    <div class="card">
                        <img class="card-img-top" src="{{$post->image}}" alt="{{$post->title}} image">
                        <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text">{{$post->sub_title}}</p>
                        </div>
                    </div>
                </a>                
            </div>
        
            @empty
                <div class="col">
                    <p>Sorry, it seems like there are no posts inside the {{$category->name}} category</p>
                </div>
            @endempty
        </div>
    </div>
@endsection