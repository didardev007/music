@extends('client.layouts.app')
@section('title') Music.com @endsection
@section('main')
    @include('client.home.index.artist')
    @include('client.home.index.genre')
    @include('client.home.index.track')
@endsection