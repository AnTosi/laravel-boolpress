@extends('layouts.admin')

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mr-auto ml-5">
            <h3 class="mb-4">Current Categories:</h3>
                <ul class="list-group">
                    @forelse ($categories as $category)
                        <li class="list-group-item"><a href="{{route('categories.posts', $category->slug)}}">{{$category->name}}</a></li>
                    @empty
                        No categories found
                    @endforelse                    
                </ul>
        </div>
        <div class="col-md-6">
            <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="" class="form-label">Category name:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="Category name" aria-describedby="nameHelper">
                    <small id="nameHelper" class="text-muted">Type the category name, maximum 200 characters</small>
                </div>
                <button type="submit" class="btn btn-dark">Add category</button>
            </div>
            </form>
        </div>
    </div>
    
@endsection