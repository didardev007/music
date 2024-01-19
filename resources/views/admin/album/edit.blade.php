@extends('admin.layouts.app')
@section('title')
    Admin|Albums|Edit
@endsection
@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Edit Album</h1>
        <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">Back to Album Index</a>
    </div>

    <form action="{{route('admin.album.update', $album->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$album->name}}" required>
        </div>


        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select name="artist" id="artist" class="form-select">
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ $artist->id == $album->artist_id ? 'selected' : '' }}>
                        {{ $artist->name }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Album Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg">
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description">
                {{$album->description}}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection