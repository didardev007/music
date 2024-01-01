@extends('admin.layouts.app')
@section('title')
    Admin|Genres|Edit
@endsection
@section('main')
    <h1 class="mt-4">Edit Genre</h1>

    <form action="{{route('admin.genre.update', $genre->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$genre->name}}" required>
        </div>

        <div class="mb-3">
            <label for="name_ru" class="form-label">Name_ru</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{$genre->name_ru}}" required>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description">{{$genre->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection