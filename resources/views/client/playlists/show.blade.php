@extends('client.layouts.app')
@section('title') Music | @lang('app.playlists') | {{ $obj->getName() }}@endsection
@section('main')
    <div class="container-xl py-4">
        <hr>
        <div class="ms-5">
            {{ Breadcrumbs::render('playlist', $obj) }}
        </div>
        <hr>
        @include('client.playlists.show.playlist')
        <hr>
        @if ($obj->id == 1)
            <div class="row row-cols-1 row-cols-lg-2 pt-3">
                @foreach($favorites->tracks as $obj)
                    <div class="col">
                        @include('client.app.track')
                    </div>
                @endforeach
            </div>
        @elseif($obj->id == 2)
            <div class="row row-cols-1 row-cols-lg-2 pt-3">
                @foreach($obj->tracks as $obj)
                    <div class="col">
                        @include('client.app.track')
                    </div>
                @endforeach
            </div>
        @elseif($obj->id == 3)
            <div class="row row-cols-1 row-cols-lg-2 pt-3">
                @foreach($top_100->tracks as $obj)
                    <div class="col">
                        @include('client.app.track')
                    </div>
                @endforeach
            </div>
        @else
            <div class="row row-cols-1 row-cols-lg-2 pt-3">
                @foreach($obj->tracks as $obj)
                    <div class="col">
                        @include('client.app.track')
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
