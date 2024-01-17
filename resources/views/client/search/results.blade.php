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
            <div class="row row-cols-1 row-cols-lg-2">
                @foreach($tracks as $obj)
                    <div class="col">
                        @include('client.app.track')
                    </div>
                @endforeach
            </div>
        @endisset
        @isset($albums[0])
            @include('client.home.index.album')
        @endisset
        @isset($artists[0])
            @include('client.home.index.artist')
        @endisset
    </div>
@endsection
