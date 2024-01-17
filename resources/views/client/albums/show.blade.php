@extends('client.layouts.app')
@section('title') Music | Album | {{ $obj->getName() }} @endsection
@section('main')
    <div class="container-xl">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('album', $obj) }}
        </div>
        <hr>
        @include('client.albums.show.album')
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
