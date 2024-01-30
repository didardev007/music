@extends('client.layouts.app')
@section('title') Music | @lang('app.tracks') @endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('tracks') }}
        </div>
        <hr>
        <div class="h4 text-primary text-center pb-3">@lang('app.tracks')</div>
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-2">
                @include('client.app.filter')
            </div>
            <div class="col">
                @foreach($tracks as $obj)
                    @include('client.app.track')
                @endforeach
                <div class="py-3">
                    {{ $tracks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
