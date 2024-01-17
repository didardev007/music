@extends('client.layouts.app')
@section('title') Music | Genre @endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('genres') }}
        </div>
        <hr>
    </div>
    @include('client.genres.index.genres')
@endsection
