@extends('admin.layouts.app')
@section('title')
    Admin|Tracks|Create
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create Track</h1>
        <a href="{{ route('admin.track.index') }}" class="btn btn-secondary">Back to Track Index</a>
    </div>

    <form method="post" action="{{ route('admin.track.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select class="form-select" id="artist" name="artist_id" required>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="album" class="form-label">Album</label>
            <select class="form-select" id="album" name="album_id">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" id="genre" name="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="durability" class="form-label">Durability</label>
            <input type="text" class="form-control" id="durability" name="durability" placeholder="min.sec" required>
        </div>

        <div class="mb-3">
            <label for="viewed" class="form-label">Viewed</label>
            <input type="text" class="form-control" id="viewed" name="viewed" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="text" class="form-control" id="release_date" name="release_date" placeholder="year-month-day" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Track</button>
    </form>
@endsection

