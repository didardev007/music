@extends('client.layouts.app')
@section('title') Music | @lang('app.albums') @endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('albums') }}
        </div>
        <hr>
    </div>
    @include('client.albums.index.albums')
@endsection
