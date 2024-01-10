@extends('client.layouts.app')
@section('title') Music | Playlists @endsection
@section('main')
    <div class="container-xl bg-light">
        <div class="h4 text-primary text-center py-3">
            <a href="{{ route('playlists.index') }}" class="text-decoration-none link-primary">@lang('app.playlists')
            </a>
        </div>
        @include('client.playlists.index.top_playlists')
        <form class="d-flex input-group px-5 py-3" action="{{ url()->current() }}" method="get">
            @csrf
            <input type="text" class="form-control" name="q" value="{{ $f_q }}" placeholder="@lang('app.search')"
                   autocomplete="off">
            <button class="btn btn-outline-secondary" type="submit">@lang('app.search')</button>
        </form>
        @include('client.playlists.index.playlists')
    </div>

@endsection