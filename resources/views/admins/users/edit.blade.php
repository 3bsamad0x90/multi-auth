@extends('admins.layouts.admin-dash')
@section('title')
    Edit | User
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <form class="mt-5" method="POST" action="{{ route('admins.users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="User Name">
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
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
                  @error('email')
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
                <label for="phone" class="col-sm-2 col-form-label">phone</label>
                <div class="col-sm-10">
                  <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Phone">
                  @error('phone')
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
                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="role_id" name="role_id">
                        <option selected disabled>Choose Role</option>
                        @foreach ($roles as $role )
                        <option value="{{ $role->id }}" @selected($user->hasRole($role->name))>
                          {{ $role->name }}
                          </option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" id="photo">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-outline-primary btn-block" value="Update User">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
