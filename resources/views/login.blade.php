@extends('layouts.app')
@section('title')
    login
@endsection
@section('content')
<h2 class="text-center mt-1">Login Page</h2>
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
    <form method="POST" action="{{ route('login.store') }}" >
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email or Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" class="form-control btn btn-primary" value="login in">
            </div>
        </div>
        <div class="row">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-8">
            <label>Not have an account?</label>
                <a href="{{ route('register') }}">create an account</a>
            </div>
        </div>
    </form>
</div>
@endsection
