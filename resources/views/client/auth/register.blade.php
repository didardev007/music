@extends('client.layouts.app')
@section('title') Music.com | Register @endsection
@section('main')
    <div class="container-xl bg-light">
        <form action="{{ route('register') }}" class="pt-4 px-5" method="post">
        @csrf
        <!-- Name input -->
            <div class="form-outline pb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}" required autofocus>
                <label class="form-label" for="form2Example1">@lang('app.name')</label>
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username input -->
            <div class="form-outline pb-4">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                       name="username" value="{{ old('username') }}" required>
                <label class="form-label" for="username">@lang('app.username')</label>
                @error('username')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       name="email" value="{{ old('email') }}" required>
                <label class="form-label" for="email">@lang('app.email')</label>
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline pb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password" value="{{ old('password') }}" required>
                <label class="form-label" for="password">@lang('app.password')</label>
                @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-outline pb-4">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                       id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                <label class="form-label" for="password_confirmation">@lang('app.passwordConfirmation')</label>
                @error('password_confirmation')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row pb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked/>
                        <label class="form-check-label" for="form2Example31"> @lang('app.rememberMe') </label>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="text-center pb-4">
                <button type="submit" class="btn btn-primary btn-block pb-4">@lang('app.register')</button>
            </div>

            <!-- Register buttons -->
            <div class="text-center pb-4">
                @lang('app.isMember')? <a href="{{ route('admin.login') }}">@lang('app.login')</a>
            </div>
        </form>
    </div>
@endsection