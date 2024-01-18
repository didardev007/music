@extends('admin.layouts.app')
@section('title')
    Admin|Artists|Edit
@endsection
@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Edit Artist</h1>
        <a href="{{ route('admin.artist.index') }}" class="btn btn-secondary">Back to Artist Index</a>
    </div>

    <form action="{{route('admin.artist.update', $artist->id)}}" method="post" enctype="multipart/form-data">
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
            <label for="image" class="form-label">Artist Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection