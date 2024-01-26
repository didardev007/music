@extends('admin.layouts.app')
@section('title')
    Admin|Album|Create
@endsection
@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create Album</h1>
        <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">Back to Album Index</a>
    </div>

    <form action="{{route('admin.album.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="artist_id" class="form-label">Artist</label>
            <select name="artist_id" id="artist_id" class="form-select">
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Album Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection