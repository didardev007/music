@extends('client.layouts.app')
@section('title') Music.com @endsection
@section('main')
    @include('client.home.index.artist')
    @include('client.home.index.genre')
    @include('client.home.index.album')
    @include('client.home.index.newTrack')
    @include('client.home.index.popularTrack')
@endsection