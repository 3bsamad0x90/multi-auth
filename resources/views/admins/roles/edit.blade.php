@extends('admins.layouts.admin-dash')
@section('title')
    Edit | Role
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <form class="mt-5" method="POST" action="{{ route('admins.roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}" placeholder="Role Name">
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
                  <input type="submit" class="btn btn-outline-primary btn-block" value="Update Role">
                </div>
            </div>
        </form>
    </div>

    <div class="col-8 mt-5">
        <h4>Permissions</h4>
        <div class="flex justify-content-center mb-3 ml-4">
            @foreach ($role->permissions as $RP)
            <span class="d-inline p-2 m-2 bg-primary text-white rounded">
                {{ $RP->name }}
            </span>
            @endforeach
        </div>
        <form class="mt-1" method="POST" action="{{ route('admins.roles.permissions', $role->id) }}">
            @csrf
            <div class="input-group row mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="selectPermissions">Permissions</label>
                </div>
                <select class="custom-select" id="selectPermissions" name="permissions[]" multiple>
                  <option selected disabled>Choose Permissions</option>
                  @foreach ($permissions as $permission )
                  <option value="{{ $permission->id }}" @selected($role->hasPermissions($permission->name))>
                    {{ $permission->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-outline-primary btn-block" value="Assign Permissions">
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
