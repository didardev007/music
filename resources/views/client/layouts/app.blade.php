<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
    @stack('scripts')
</head>
<body>
@include('client.app.alert')
@include('client.app.nav')
@yield('main')

@include('client.app.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/splide.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    new Splide( '#artist-carousel', {
        type   : 'loop',
        autoplay: true,
        perPage: 5,
        interval: 2500,
        pauseOnHover: false,
        pauseOnFocus: false,
        perMove: 1,
        arrows: false,
        pagination: false,
        breakpoints: {
            576: {
                perPage: 1,
            },
            767: {
                perPage: 3,
            },
            991: {
                perPage: 3,
            },
            1199: {
                perPage: 4,
            }
        }
    } ).mount();
</script>

<script>
    new Splide( '#genre-carousel', {
        type   : 'loop',
        autoplay: true,
        perPage: 5,
        interval: 2500,
        pauseOnHover: false,
        pauseOnFocus: false,
        perMove: 1,
        arrows: false,
        pagination: false,
        breakpoints: {
            576: {
                perPage: 1,
            },
            767: {
                perPage: 3,
            },
            991: {
                perPage: 3,
            },
            1199: {
                perPage: 4,
            }
        }
    } ).mount();
</script>

<script>
    new Splide( '#album-carousel', {
        type   : 'loop',
        perPage: 3,
    } ).mount();
</script>

<script>
    new Splide( '#newTracks-carousel', {
        type   : 'loop',
        perPage: 3,
        autoplay: true,
        interval: 2500,
        pauseOnHover: false,
        pauseOnFocus: false,
        perMove: 1,
        arrows: false,
        pagination: false,
        breakpoints: {
            576: {
                perPage: 1,
            },
            991: {
                perPage: 2,
            },
        }
    } ).mount();
</script>
</body>
</html>
