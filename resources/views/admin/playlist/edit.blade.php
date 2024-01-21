@extends('admin.layouts.app')

@section('title')
    Admin|Edit Playlist
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Edit Playlist</h1>
        <a href="{{ route('admin.playlist.index') }}" class="btn btn-secondary">Back to Playlist Index</a>
    </div>

    <!-- Playlist edit form -->
    <form method="post" action="{{ route('admin.playlist.update', $playlist->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Playlist Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $playlist->name }}" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Playlist Name (Russian)</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{ $playlist->name_ru }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Playlist Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .svg">
        </div>

        <button type="submit" class="btn btn-primary">Update Playlist</button>
    </form>
@endsection
