@extends('client.layouts.app')
@section('title')
    Music | Search
@endsection
@section('main')
    <div class="container-xl">
        <form class="d-flex input-group p-3" action="{{ route('search') }}" method="get">
            @csrf
            <input type="text" class="form-control" name="q" value="{{ old('q', $f_q ?? '') }}"
                   placeholder="@lang('app.search')">
            <button class="btn btn-outline-secondary" type="submit">@lang('app.search')</button>
        </form>
        @isset($tracks[0])
            <div class="h4 text-center text-primary py-3">
                @lang('app.tracks')
            </div>
            <div id="tracks-carousel" class="splide" aria-label="Beautiful Images">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($tracks as $obj)
                            <li class="splide__slide">
                                @include('client.app.track')
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endisset
        @isset($albums[0])
            @include('client.home.index.album')
        @endisset
        @isset($artists[0])
            @include('client.home.index.artist')
        @endisset
    </div>

    <script src="{{ asset('js/splide.min.js') }}"></script>

    <script>
        new Splide('#tracks-carousel', {
            @if(!request()->routeIs('search'))
            type: 'loop',
            @endif
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
        new Splide('#album-carousel', {
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
