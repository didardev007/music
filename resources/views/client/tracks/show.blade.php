@extends('client.layouts.app')
@section('title')
    Music | Tracks | {{ $obj->getName() }}
@endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('track', $obj) }}
        </div>
        <hr>
        @include('client.app.track')
    </div>
@endsection
