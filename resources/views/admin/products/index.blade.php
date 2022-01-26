@extends('layouts.admin')

@section('content')

<h1>Products</h1>

<div>
    @if (session('feedback'))
        <div class="alert alert-success my-3 ">
            {{ session('feedback') }}
        </div>
    @endif
</div>

<a name="" id="" class="btn btn-primary" href="{{route('admin.products.create')}}" role="button">Create product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td scope="row">{{$product->id}}</td>
                    <td><img width="100" src="{{$product->image}}" alt=""></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><a href="{{route('admin.products.show', $product->id)}}"><i class="fas fa-eye"></i> </a> - <i class="fas fa-edit"> - delete</i></td>
                </tr>                
            @endforeach

        </tbody>
    </table>
    
@endsection