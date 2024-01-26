@extends('client.layouts.app')
@section('title') Music.com @endsection
@section('main')
    <div class="container-xl">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('home') }}
        </div>
        <hr>
    </div>
    @include('client.home.index.genre')
    @include('client.home.index.newTrack')
    @include('client.home.index.popularTrack')
    @include('client.home.index.artist')

    <script src="{{ asset('js/splide.min.js') }}"></script>

    <script>
        new Splide('#newTracks-carousel', {
            type: 'loop',
            perPage: 3,
            autoplay: false,
            interval: 2500,
            pauseOnHover: false,
            perMove: 1,
            pagination: false,
            arrows: false,
            breakpoints: {
                576: {
                    perPage: 1,
                },
                991: {
                    perPage: 2,
                },
                1199: {
                    perPage: 2,
                }
            }
        }).mount();
    </script>

    <script>
        new Splide('#genre-carousel', {
            type: 'loop',
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
                    perPage: 2,
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
        }).mount();
    </script>

    <script>
        new Splide('#artist-carousel', {
            @if(!request()->routeIs('search'))
            type: 'loop',
            @endif
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
        }).mount();
    </script>
@endsection
