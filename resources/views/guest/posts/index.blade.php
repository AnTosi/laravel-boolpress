@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gy-3">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{$post->image}}" alt="{{$post->title}}">
                        <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text"> {{$post->sub_title}}</p>
                            <a href="{{route('posts.show', $post->id)}}">View post </a>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>
        <div class="mt-3">
            {{$posts->links()}}
        </div>
    </div>
@endsection