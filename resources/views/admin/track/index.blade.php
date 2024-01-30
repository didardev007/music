@extends('admin.layouts.app')
@section('title')
    Admin|Tracks
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Track Index</h1>
        <a href="{{ route('admin.track.create') }}" class="btn btn-success">Create Track</a>
    </div>

    <div class="py-3">
        <form action="{{ route('admin.track.index') }}" role="search">
            <input class="form-control" type="search" name="q"
                   value="{{ isset($q) ? $q : old('q') }}" placeholder="Search"
                   aria-label="Search">
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th width="5%">ID</th>
            <th>Name</th>
            <th width="20%">Others</th>
            <th>Durability</th>
            <th>Released Date</th>
            <th>In Favorites</th>
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
                    <div class="fw-normal">{{ $track->durability }}</div>
                </td>
                <td>
                    <div class="fw-normal">{{ $track->release_date }}</div>
                </td>
                <td>
                    <div>{{count($track->users)}}</div>
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