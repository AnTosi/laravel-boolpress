@extends('layouts.admin')

@section('content')

    <h1 class="mt-3 mb-5">Tags</h1>
    <div class="row my-5">
        @if (session('feedback'))
        <div class="alert alert-success my-3 ">
            {{ session('feedback') }}
        </div>
        @endif
        @include('partials.error')
        <div class="col-md-6 mr-auto ml-5">
            <h3 class="mb-4">Current Tags:</h3>
                <ul class="list-group">
                    @forelse ($tags as $tag)
                        <li class="list-group-item d-flex">
                            <form action="{{route('admin.categories.update', $tag->id)}}" method="post">
                                @csrf
                                @method('PATCH')
        
                                <input class="border-0" type="text" name="name" id="name" value="{{$tag->name}}">
                            </form>

                            <span class="rounded-pill bg-dark text-white d-flex justify-content-center align-items-center">{{ $tag->posts()->count() }}</span>
        
                            <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger">
                                    <i class="fas fa-trash fa-lg fa-fw"></i>
                                </button>
                            </form>
                            <a href="{{route('tags.posts', $tag->slug)}}">Go to {{$tag->name}}</a>
                        </li>
                    @empty
                        No tags found
                    @endforelse                    
                </ul>
        </div>
        <div class="col-md-6">
            <form action="{{route('admin.tags.store')}}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <h3 class="mb-4">Add a tag</h3>
                    <label for="name" class="form-label">Tag name:</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tags name" aria-describedby="nameHelper">
                    <small id="nameHelper" class="text-muted">Type the tag name, maximum 200 characters</small>
                </div>
                <button type="submit" class="btn btn-dark">Add tag</button>
            </div>
            </form>
        </div>
    </div>
    
@endsection