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

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required >
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection