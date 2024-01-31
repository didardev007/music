@extends('admin.layouts.app')

@section('title')
    Admin|Playlists
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Playlist Index</h1>
        <a href="{{ route('admin.playlist.create') }}" class="btn btn-success">Create Playlist</a>
    </div>

    <div class="py-3">
        <form action="{{ route('admin.user.index') }}" role="search">
            <input class="form-control" type="search" name="q"
                   value="{{ isset($q) ? $q : old('q') }}" placeholder="Search"
                   aria-label="Search">
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Name_ru</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($playlists as $playlist)
            <tr>
                <td>{{ $playlist->id }}</td>
                <td><small class="h5 fw-normal">{{ $playlist->name }}</small></td>
                <td><small class="h5 fw-normal">{{ $playlist->name_ru }}</small></td>
                <td>
                    @if($playlist->image)
                        <img src="{{asset('storage/'. $playlist->image)}}" alt="Playlist Image" class="img-thumbnail" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.playlist.edit', $playlist->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.playlist.destroy', $playlist->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('Delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
