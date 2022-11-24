@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
<h2 class="text-center mt-1">Register Page</h2>
<div class="m-2">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<div class="m-5">
    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="**********">
            </div>
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photo" name="photo">
                  <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" class="form-control btn btn-primary" value="Register">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-8">
            <label>have an account?</label>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </form>
</div>
@endsection
