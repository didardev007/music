@extends('admin.layouts.app')
@section('title')
    Admin|Genres|Create
@endsection
@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create Genre</h1>
        <a href="{{ route('admin.genre.index') }}" class="btn btn-secondary">Back to Genre Index</a>
    </div>

    <form action="{{route('admin.genre.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Name_ru</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Genre Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection