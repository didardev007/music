@extends('admin.layouts.app')

@section('title')
    Admin|Create User
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Create User</h1>
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back to User Index</a>
    </div>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="is_admin" class="form-label">Admin</label>
            <select class="form-select" id="is_admin" name="is_admin">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
@endsection

