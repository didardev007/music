@extends('client.layouts.app')
@section('title') Music.com @endsection
@section('main')
    <div class="container-xl">
        @foreach($tracks as $track)
            @include('client.home.index.artist')
        @endforeach
    </div>
@endsection