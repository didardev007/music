@extends('admin.layouts.app')
@section('title')
    Admin|Artists|Edit
@endsection
@section('main')
    <h1 class="mt-4">Edit Artist</h1>

    <form action="{{route('admin.artist.update', $artist->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$artist->name}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection