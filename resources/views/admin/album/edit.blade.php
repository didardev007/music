@extends('admin.layouts.app')
@section('title')
    Admin|Albums|Edit
@endsection
@section('main')
    <h1 class="mt-4">Edit Album</h1>

    <form action="{{route('admin.album.update', $album->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$album->name}}" required>
        </div>


        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" value="{{$album->artist->name}}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description">{{$album->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection