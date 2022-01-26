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
                    <td>
                        <a href="{{route('admin.products.show', $product->id)}}"><i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.products.edit', $product->id)}}"><i class="fas fa-edit"></i></a>
                        <button title="delete" type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#delete{{$product->id}}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$product->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Product {{$product->name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attention, deleted products cannot be recovered.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.products.destroy', $product->id)}}" method="post">
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