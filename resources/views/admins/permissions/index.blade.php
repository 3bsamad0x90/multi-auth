@extends('admins.layouts.admin-dash')
@section('title')
    Permissions
@endsection
@section('content')
<table class="table text-center m-3 p2 col-sm-10">
    <div class="container d-flex justify-content-end mr-5">

    </div>
    <thead class="thead-outline-dark">
      <tr class="d-flex ">
        <th scope="col">
            <a href="{{ route('admins.permissions.create') }}" class="btn btn-outline-primary btn-sm">New Permission</a>
        </th>
      </tr>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Controlls</th>
      </tr>
    </thead>
    <tbody>
        <?php $id = 0 ?>
        @foreach ($permissions as $permission)
      <tr>
        <th scope="row">{{ ++$id }}</th>
        <td>{{ $permission -> name }}</td>
        <td>
            <a href="{{ route('admins.permissions.edit', $permission->id) }}" class="btn btn-outline-info btn-sm">Edit</a>

            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#id{{ $permission->id }}">Delete</a>
            {{-- Delete Modal  --}}
            <div class="modal fade" id="id{{ $permission->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Alarm!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are You Sure To Delele<strong> {{ $permission->name }}</strong> Permission?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ route('admins.permissions.destroy', $permission->id) }}">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger">Confirm</button>
                      </form>
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
