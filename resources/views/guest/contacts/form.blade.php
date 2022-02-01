@extends('layouts.app')

@section('content')
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Contact us</h1>
            <p class="lead">We are here to help you</p>
    </div>
    <div class="container">
        @if(session('feedback'))
            <div class="alert alert-success">
                {{session('feedback')}}
            </div>
        @endif
        @include('partials.error')
        <form action="{{route('contacts.send')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Pippo Franco" aria-describedby="nameHelper" value='{{old('name')}}'required minlength="4" maxlength="50">
                      <small id="nameHelper" class="text-muted">Type your name here, maximum 50 characters</small>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Pippo@Franco.com" aria-describedby="emailHelper" value='{{old('email')}}' required>
                        <small id="emailHelper" class="text-muted">Type your email here</small>
                    </div>
                </div>

                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" name="message" id="message" rows="4">{{old('message')}}</textarea>
                </div>
                <div class="px-3">
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection