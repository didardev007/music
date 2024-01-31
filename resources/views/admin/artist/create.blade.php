@extends('admin.layouts.app')
@section('title')
    Admin|Artists|Create
@endsection
@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create Artist</h1>
        <a href="{{ route('admin.artist.index') }}" class="btn btn-secondary">Back to Artist Index</a>
    </div>

    <form action="{{route('admin.artist.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Name_ru</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru">
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of birth</label>
            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="year-month-day" required >
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Artist Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection