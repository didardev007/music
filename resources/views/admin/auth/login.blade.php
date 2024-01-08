<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class=" text-black w-100 m-auto" style="max-width: 330px;padding: 1rem">
<form action="{{route('admin.login')}}" method="post">
    @csrf
    <div class="text-center">
        <i class="bi bi-person h1 border rounded-pill py-2 px-3"></i>
        <div class="h3 mb-3 fw-normal pt-3">@lang('app.login')</div>
    </div>

    <div class="form-floating pb-3">
        <input type="email" class="form-control" id="email" placeholder="@lang('app.email')" name="email" required>
        <label for="email" class="text-black">@lang('app.email')</label>
    </div>
    <div class="form-floating pb-3">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
               required>
        <label for="floatingPassword" class="text-black">@lang('app.password')</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">@lang('app.login')</button>
</form>
</body>