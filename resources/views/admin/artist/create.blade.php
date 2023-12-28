@extends('admin.layouts.app')
@section('title')
    Admin|Artists|Create
@endsection
@section('main')
    <h1 class="mt-4">Create Artist</h1>

    <form action="{{route('admin.artist.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection