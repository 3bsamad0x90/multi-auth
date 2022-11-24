@extends('admins.layouts.admin-dash')
@section('title')
    Users
@endsection
@section('content')
<table class="table text-center m-3 p2 col-sm-10">
    <h3 class="m-2 p-1 text-bold">Users</h3>
    <thead class="thead-outline-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Controlls</th>
      </tr>
    </thead>
    <tbody>
        <?php $id = 0 ?>
        @foreach ($users as $user)
      <tr>
        <th scope="row">{{ ++$id }}</th>
        <td>{{ $user -> name }}</td>
        <td>{{ $user -> role->name }}</td>
        <td>
            <a href="{{ route('admins.users.edit', $user->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#id{{ $user->id }}">Delete</a>
            {{-- Delete Modal  --}}
            <div class="modal fade" id="id{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Alarm!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are You Sure To Delele<strong> {{ $user->name }}</strong> User?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ route('admins.users.destroy', $user->id) }}">
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
