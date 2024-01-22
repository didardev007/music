@extends('admin.layouts.app')

@section('title')
    Admin|Create Playlist
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create Playlist</h1>
        <a href="{{ route('admin.playlist.index') }}" class="btn btn-secondary">Back to Playlist Index</a>
    </div>

    <!-- Playlist creation form -->
    <form method="post" action="{{ route('admin.playlist.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Playlist Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Playlist Name (Russian)</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Playlist Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .svg">
        </div>

        <button type="submit" class="btn btn-success">Create Playlist</button>
    </form>
@endsection