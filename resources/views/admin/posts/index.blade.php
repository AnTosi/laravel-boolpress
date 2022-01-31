@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

<div>
    @if (session('feedback'))
        <div class="alert alert-success my-3 ">
            {{ session('feedback') }}
        </div>
    @endif
</div>

<a name="" id="" class="btn btn-primary" href="{{route('admin.posts.create')}}" role="button">Create post</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Sub Title</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td><img width="100" src="{{asset('storage/' . $post->image)}}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{ $post->category != null ? $post->category->name : 'Uncategorized' }}</td>
                    <td>{{$post->sub_title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->slug)}}"><i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.posts.edit', $post->slug)}}"><i class="fas fa-edit"></i></a>
                        <button title="delete" type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#delete{{$post->slug}}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{$post->slug}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$post->slug}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete post {{$post->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attention, deleted posts cannot be recovered.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.posts.destroy', $post->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>                
            @endforeach

        </tbody>
    </table>
    
@endsection