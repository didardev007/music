@extends('admin.layouts.app')
@section('title')
    Admin|User
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">User Index</h1>
        <a href="{{route('admin.user.create')}}" class="btn btn-success">Create User</a>
    </div>

    <div class="py-3">
        <form action="{{ route('admin.user.index') }}" role="search">
            <input class="form-control" type="search" name="q"
                   value="{{ isset($q) ? $q : old('q') }}" placeholder="Search"
                   aria-label="Search">
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection