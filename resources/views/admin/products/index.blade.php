@extends('layouts.admin')

@section('content')
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
            {{-- @foreach($products as $product)
                <tr>
                    <td scope="row">{{$product->id}}</td>
                    <td><img width="100" src="{{$product->image}}" alt=""></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><i class="fas fa-eye"> - <i class="fas fa-edit"> - delete</i></i></td>
                </tr>                
            @endforeach --}}

            
        </tbody>
    </table>
    
@endsection