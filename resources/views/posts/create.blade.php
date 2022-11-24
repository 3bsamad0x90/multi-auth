@extends('layouts.app')
@section('title')
    Posts | Create
@endsection
@section('nav')
    @include('layouts.nav')
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="row mt-5 ml-1">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">Back</a>
        </div>
        <form class="mt-5" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Post title">
                  @error('title')
                  <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Description" @error('description') is-invalid @enderror" id="description" name="description" > </textarea>
                  @error('description')
                  <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-outline-primary btn-block" value="Create Post">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
