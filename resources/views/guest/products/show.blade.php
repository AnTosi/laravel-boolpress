@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="card-title">{{$product->name}}</h2>
        <img class="" src="{{$product->image}}" alt="{{$product->name}}">
        <div>
            <p class="card-text">Price: {{$product->price}} €</p>
        </div>
        
        <div>
            <p class="card-text">{{$product->description}}</p>
        </div>

    </div>

@endsection