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
@endsection
