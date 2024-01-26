@extends('admin.layouts.app')
@section('title')
    Admin|Albums
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Album Index</h1>
        <a href="{{route('admin.album.create')}}" class="btn btn-success">Create Album</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Artist name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{$album->id}}</td>
                <td>
                    <small class="h5 fw-normal">{{$album->name}}</small>
                </td>
                <td>
                    {{$album->artist->name}}
                </td>
                <td>
                    @if($album->image)
                        <img src="{{asset('storage/'. $album->image)}}" alt="Album Image" class="img-thumbnail" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.album.edit', $album->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('admin.album.destroy', $album->id)}}" method="post" style="display:inline;">
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