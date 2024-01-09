@extends('admin.layouts.app')
@section('title')
    Admin|Tracks
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Track Index</h1>
        <a href="{{ route('admin.track.create') }}" class="btn btn-success">Create Track</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Others</th>
            <th>Durability</th>
            <th>Viewed</th>
            <th>Release Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tracks as $track)
            <tr>
                <td>{{ $track->id }}</td>
                <td>
                    <small class="h5 fw-normal">{{ $track->name }}</small>
                </td>
                <td>
                    <small class="fw-normal">Artist: {{ $track->artist->name }}</small>
                    <br>
                    <small class="fw-normal">Album: {{ optional($track->album)->name ?: 'N/A' }}</small>
                    <br>
                    <small class="fw-normal">Genre: {{ $track->genre->name }}</small>
                </td>
                <td>
                    <small class="h5 fw-normal">{{ $track->durability }}</small>
                </td>
                <td>
                    <small class="h5 fw-normal">{{ $track->viewed }}</small>
                </td>
                <td>
                    <small class="h5 fw-normal">{{ $track->release_date }}</small>
                </td>
                <td>
                    <a href="{{ route('admin.track.edit', $track->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.track.destroy', $track->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('Delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection