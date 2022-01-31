@extends('admin.app')

@section('content')
    <div class="container">
        <h2 class="card-title">{{$post->title}}</h2>
        <img class="" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
        <h3 class="my-3">{{$post->sub_title}}</h3>
        <h4>{{$post->category->name}}</h4>
        <div>
            <p class="card-text">{{$post->body}}</p>
        </div>


    </div>

@endsection