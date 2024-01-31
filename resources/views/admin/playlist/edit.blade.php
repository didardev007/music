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

        <button type="submit" class="btn btn-primary">Update Playlist</button>

        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-4">Tracks
                <small>({{ count($obj->tracks) }})</small>
            </h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTrackModal">Add Track</button>
        </div>


        <!-- Table for displaying existing tracks -->
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Others</th>
                <th>Release Date</th>
                <th>Action</th>
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
                    <td>{{ $track->release_date }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTrackModal{{ $track->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>

    @foreach($obj->tracks as $track)
        <div class="modal fade" id="deleteTrackModal{{ $track->id }}" tabindex="-1" aria-labelledby="deleteTrackModalLabel{{ $track->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTrackModalLabel{{ $track->id }}">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the track "{{ $track->name }}" from the playlist?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="post" action="{{ route('admin.playlist.detach', ['id' => $obj->id, 'track_id' => $track->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal for adding tracks -->
    <div class="modal fade" id="addTrackModal" tabindex="-1" aria-labelledby="addTrackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrackModalLabel">Add Tracks to Playlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display all created tracks with checkboxes -->
                    <form method="post" action="{{ route('admin.playlist.attach', $obj->id) }}">
                        @csrf
                        <div class="mb-3">
                            @foreach($allTracks as $track)
                                @if(!$obj->tracks->contains($track->id))
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="track_ids[]" value="{{ $track->id }}">
                                        <label class="form-check-label">{{ $track->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">Add Selected Tracks</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
