@extends('admin.layouts.app')
@section('title')
    Admin|Album|Create
@endsection
@section('main')
    <h1 class="mt-4">Create Album</h1>

    <form action="{{route('admin.album.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection