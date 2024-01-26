@extends('admin.layouts.app')
@section('title')
    Admin|Genres
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Genre Index</h1>
        <a href="{{route('admin.genre.create')}}" class="btn btn-success">Create Genre</a>
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
        @foreach($genres as $genre)
            <tr>
                <td>{{$genre->id}}</td>
                <td><small class="h5 fw-normal">{{$genre->name}}</small></td>
                <td><small class="h5 fw-normal">{{$genre->name_ru}}</small></td>
                <td>
                    @if($genre->image)
                        <img src="{{asset('storage/'. $genre->image)}}" alt="Genre Image" class="img-thumbnail" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.genre.edit', $genre->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('admin.genre.destroy', $genre->id)}}" method="post" style="display:inline;">
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