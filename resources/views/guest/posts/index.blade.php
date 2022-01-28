@extends('layouts.app')

@section('content')
<div class="d-flex">
    <div class="container">
        <div class="row gy-3">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" height="165" src="{{$post->image}}" alt="{{$post->title}} image">
                        <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text"> {{$post->sub_title}}</p>
                            <a href="{{route('posts.show', $post->slug)}}">View post</a>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
            <div class="mt-3">
                {{$posts->links()}}
            </div>
        </div>
    </div>
        <aside class="w-25 ms-3 me-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Categories:</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($categories as $category)
                        <li class="list-group-item"><a href="{{route('categories.posts', $category->slug)}}">{{$category->name}}</a></li>
                    @empty
                        No categories found
                    @endforelse
                </ul>
            </div>
        </aside>

</div>
@endsection