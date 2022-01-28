@extends('layouts.admin')

@section('content')

    <h1 class="mt-3 mb-5">Categories</h1>
    <div class="row my-5">
        @if (session('feedback'))
        <div class="alert alert-success my-3 ">
            {{ session('feedback') }}
        </div>
        @endif
        <div class="col-md-6 mr-auto ml-5">
            <h3 class="mb-4">Current Categories:</h3>
                <ul class="list-group">
                    @forelse ($categories as $category)
                        <li class="list-group-item d-flex">
                            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                                @csrf
                                @method('PATCH')
        
                                <input class="border-0" type="text" name="name" id="name" value="{{$category->name}}">
                            </form>

                            <span class="rounded-pill bg-dark text-white d-flex justify-content-center align-items-center">{{ $category->posts()->count() }}</span>
        
                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger">
                                    <i class="fas fa-trash fa-lg fa-fw"></i>
                                </button>
                            </form>
                            <a href="{{route('categories.posts', $category->slug)}}">Go to {{$category->name}}</a>
                        </li>
                    @empty
                        No categories found
                    @endforelse                    
                </ul>
        </div>
        <div class="col-md-6">
            <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <div>
                @include('partials.error')
                <div class="mb-3">
                    <h3 class="mb-4">Add a category</h3>
                    <label for="name" class="form-label">Category name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category name" aria-describedby="nameHelper">
                    <small id="nameHelper" class="text-muted">Type the category name, maximum 200 characters</small>
                </div>
                <button type="submit" class="btn btn-dark">Add category</button>
            </div>
            </form>
        </div>
    </div>
    
@endsection