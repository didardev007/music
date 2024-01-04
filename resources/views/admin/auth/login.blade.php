@extends('admin.layouts.app')
@section('title')
    Admin|Login
@endsection

@section('main')
    <main class=" text-danger w-100 m-auto" style="max-width: 330px;padding: 1rem">
        <form action="{{route('admin.login')}}" method="post">
            @csrf
            <div class="text-center">
                <i class="bi bi-person h1 border rounded-pill py-2 px-3"></i>
                <div class="h3 mb-3 fw-normal pt-3">Login</div>
            </div>

            <div class="form-floating pb-3">
                <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
                <label for="username" class="text-black">Username</label>
            </div>
            <div class="form-floating pb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                       required>
                <label for="floatingPassword" class="text-black">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
    </main>
@endsection