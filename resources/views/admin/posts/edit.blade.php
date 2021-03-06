@extends('layouts.admin')

@section('content')
    
    <h1>Edit a post</h1>

    @include('partials.error')

    <form action="{{route('admin.posts.update', $post->slug)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="" aria-describedby="titleHelper" value="{{$post->title}}">
            <small id="titleHelper" class="text-muted">Type the post title</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div>
                <img src="{{asset('storage/' . $post->image)}}" alt="">
            </div>
            <label for="image" class="form-label">Image</label>
            <img width="150" class="m-3" src="{{asset('storage/' . $post->image)}}" alt="">
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="" aria-describedby="imageHelper">
            <small id="imageHelper" class="text-muted">Update your img, only jpg and png below 500kB are accepted</small>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror           
        </div>

        <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Title</label>
            <input type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is-invalid @enderror" placeholder="" aria-describedby="sub_titleHelper" value="{{$post->sub_title}}">
            <small id="sub_titleHelper" class="text-muted">Type the post Sub Title</small>
            @error('sub_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categories</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
              <option value="">Uncategorized</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{ $category->id === $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple class="form-select" name="tags[]" id="tags">
            <option disabled>Select as many tags as you want</option>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}" {{$post->tags->contains($tag->id) ? 'selected' : ''}}>{{$tag->name}}</option>
            @endforeach
            
            </select>
        </div>
        
        <div class="mb-3">
            <label for="body" class="form-label">Text</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="6" aria-describedby="bodyHelper">{{$post->body}}</textarea>
            <small id="bodyHelper" class="text-muted">Type the post text</small>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save post</button>
    </form>

@endsection