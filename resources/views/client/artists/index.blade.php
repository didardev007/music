@extends('client.layouts.app')
@section('title') Music | @lang('app.artists') @endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('artists') }}
        </div>
        <hr>
    </div>
    @include('client.artists.index.artists')
@endsection
