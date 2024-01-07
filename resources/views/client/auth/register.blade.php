@extends('client.layouts.app')
@section('title') Music.com | Register @endsection
@section('main')
    <div class="container-xl bg-light">
        <form class="pt-4 px-5">
            <!-- Name input -->
            <div class="form-outline pb-4">
                <input type="email" id="form2Example1" class="form-control"/>
                <label class="form-label" for="form2Example1">@lang('app.name')</label>
            </div>

            <!-- Username input -->
            <div class="form-outline pb-4">
                <input type="email" id="form2Example1" class="form-control"/>
                <label class="form-label" for="form2Example1">@lang('app.username')</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control"/>
                <label class="form-label" for="form2Example1">@lang('app.email')</label>
            </div>

            <!-- Password input -->
            <div class="form-outline pb-4">
                <input type="password" id="form2Example2" class="form-control"/>
                <label class="form-label" for="form2Example2">@lang('app.password')</label>
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
                <button type="button" class="btn btn-primary btn-block pb-4">@lang('app.register')</button>
            </div>

            <!-- Register buttons -->
            <div class="text-center pb-4">
                @lang('app.isMember')? <a href="{{ route('admin.login') }}">@lang('app.login')</a>
            </div>
        </form>
    </div>
@endsection