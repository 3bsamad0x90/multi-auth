@extends('admins.layouts.admin-dash')
@section('title')
    Create | Permission
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <form class="mt-5" method="POST" action="{{ route('admins.permissions.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="permission Name">
                  @error('name')
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
                  <input type="submit" class="btn btn-outline-primary btn-block" value="Add New Permission">
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
