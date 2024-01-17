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
@endsection
