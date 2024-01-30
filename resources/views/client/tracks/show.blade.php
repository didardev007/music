@extends('client.layouts.app')
@section('title')
    Music | @lang('app.tracks') | {{ $obj->getName() }}
@endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('track', $obj) }}
        </div>
        <hr>
        @include('client.tracks.show.track')
        @include('client.tracks.show.same_genre')
        @include('client.tracks.show.same_artist')
        @include('client.tracks.show.same_album')
    </div>

    <script src="{{ asset('js/splide.min.js') }}"></script>

    <script>
        new Splide('#sameArtist-carousel', {
            type: 'loop',
            perPage: 3,
            autoplay: false,
            interval: 2500,
            pauseOnHover: false,
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
        }).mount();
    </script>

    <script>
        new Splide('#sameAlbum-carousel', {
            type: 'loop',
            perPage: 3,
            autoplay: false,
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
        }).mount();
    </script>

    <script>
        new Splide('#sameGenre-carousel', {
            type: 'loop',
            perPage: 3,
            autoplay: false,
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
        }).mount();
    </script>
@endsection
