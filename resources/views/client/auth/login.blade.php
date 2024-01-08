@extends('client.layouts.app')
@section('title') Music.com | Register @endsection
@section('main')
    <div class="container-xl bg-light">
        <form class="pt-4 px-5">
            @csrf

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

            <!-- 2 column grid layout for inline styling -->
            <div class="row pb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked/>
                        <label class="form-check-label" for="form2Example31"> @lang('app.rememberMe') </label>
                    </div>
                </div>

                <div class="col text-center">
                    <!-- Simple link -->
                    <a href="#!">@lang('app.forgotPassword')?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block pb-4">@lang('app.login')</button>

            <!-- Register buttons -->
            <div class="text-center pb-4">
                @lang('app.notMember')? <a href="#!">@lang('app.register')</a>
            </div>
        </form>
    </div>
@endsection