@extends('client.layouts.app')
@section('title')
    Music | Genre
@endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('genre', $obj) }}
        </div>
        <hr>
        @include('client.genres.show.genre')
        <hr>
        <div class="row row-cols-1 row-cols-lg-2 pt-3">
            @foreach($tracks as $obj)
                <div class="col">
                    @include('client.app.track')
                </div>
            @endforeach
        </div>
    </div>
@endsection
