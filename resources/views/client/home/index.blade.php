@extends('client.layouts.app')
@section('title') Music.com @endsection
@section('main')
    @foreach($tracks as $track)
        @include('client.home.index.artist')
    @endforeach
@endsection