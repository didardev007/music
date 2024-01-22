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
    <form method="post" action="{{ route('admin.playlist.update', $obj->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Playlist Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $obj->name }}" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Playlist Name (Russian)</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{ $obj->name_ru }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Playlist Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .svg">
        </div>

        <h2 class="mt-4">Tracks <small>({{ count($obj->tracks)}})</small></h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Others</th>
                <th>Release Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($obj->tracks as $track)
                <tr>
                    <td>{{ $track->name }}</td>
                    <td>
                        <small class="fw-normal">Artist: {{ $track->artist->name }}</small>
                        <br>
                        <small class="fw-normal">Album: {{ optional($track->album)->name ?: 'N/A' }}</small>
                        <br>
                        <small class="fw-normal">Genre: {{ $track->genre->name }}</small>
                    </td>
                    <td>{{ $track->release_date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Update Playlist</button>
    </form>
@endsection
