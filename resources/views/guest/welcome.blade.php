@extends('layouts.app')

@section('content')

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Welcome</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur velit, eligendi reiciendis porro eveniet perspiciatis numquam, soluta delectus obcaecati dolor blanditiis quos a necessitatibus deserunt corrupti. Ipsum quisquam placeat quae facere beatae asperiores vitae! Vel, modi voluptatum! Dolores eaque deserunt tempora incidunt commodi, magni consectetur iure cupiditate sit id animi?</p>
            <hr class="my-2">
            <p>View my shop</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Vai allo shop</a>
            </p>
        </div>
    </div>

@endsection