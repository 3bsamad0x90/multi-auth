@extends('layouts.app')
@section('title')
    Posts
@endsection
@section('nav')
    @include('layouts.nav')
@endsection
@section('content')
    <h2>Posts</h2>
    @can('create', App\Models\Post::class)
        <a href="{{route('posts.create')}}" class="btn btn-outline-primary btn-sm mt-2 mb-2 text-center">Create Post</a>
    @endcan
    <table class="table table-hover text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Controlls</th>
          </tr>
        </thead>
        <tbody>
            <?php $id=0?>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ ++$id }}</th>
                <td>{{ $post -> title }}</td>
                <td>{{ $post -> description }}</td>
                <td>
                    @can('update', $post)
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-info btn-sm m-1">Edit</a>
                    @endcan
                    @can('delete', $post)
                    <a href="#" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#id{{ $post->id }}">Delete</a>
                    @endcan
                    {{-- Delete Modal  --}}
                    <div class="modal fade" id="id{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Alarm!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are You Sure To Delele<strong> {{ $post->title }}</strong> Post?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
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
