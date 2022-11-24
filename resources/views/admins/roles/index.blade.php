@extends('admins.layouts.admin-dash')
@section('title')
    Role
@endsection
@section('content')
<table class="table text-center m-3 p2 col-sm-10">
    <thead class="thead-outline-dark">
      <tr class="d-flex ">
        <th scope="col">
            <a href="{{ route('admins.roles.create') }}" class="btn btn-outline-primary btn-sm">New Role</a>
        </th>
      </tr>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Permission</th>
        <th scope="col">Controlls</th>
      </tr>
    </thead>
    <tbody>
        <?php $id = 0 ?>
        @foreach ($roles as $role)
      <tr>
        <th scope="row">{{ ++$id }}</th>
        <td>{{ $role -> name }}</td>
        <td>
            @forelse ($role->permissions as $RP)
                <span class="m-1 p-1 bg-primary rounded">
                    {{ $RP -> name }}
                </span>
            @empty
            <span class="text-muted text-sm">
                No Permission
            </span>
            @endforelse
        </td>
        <td>
            <a href="{{ route('admins.roles.edit', $role->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#id{{ $role->id }}">Delete</a>
            {{-- Delete Modal  --}}
            <div class="modal fade" id="id{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Alarm!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are You Sure To Delele<strong> {{ $role->name }}</strong> Role?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ route('admins.roles.destroy', $role->id) }}">
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
