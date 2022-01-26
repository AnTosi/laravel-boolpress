@extends('layouts.admin')

@section('content')
    
    <h1>Edit a product</h1>

    @include('partials.error')

    <form action="{{route('admin.products.update', $product->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="" aria-describedby="nameHelper" value="{{$product->name}}">
            <small id="nameHelper" class="text-muted">Type the product name</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="" aria-describedby="imageHelper" value="{{$product->image}}">
            <small id="imageHelper" class="text-muted">Type the Image url</small>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror           
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="" aria-describedby="priceHelper" value="{{$product->price}}">
            <small id="priceHelper" class="text-muted">Type the product price</small>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="6" aria-describedby="descriptionHelper" value="{{$product->description}}"></textarea>
            <small id="descriptionHelper" class="text-muted">Type the product description</small>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save product</button>
    </form>

@endsection