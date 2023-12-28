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

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of birth</label>
            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$artist->date_of_birth}}" required>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="{{$artist->country}}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{$artist->image}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection