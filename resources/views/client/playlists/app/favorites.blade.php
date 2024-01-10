@extends('client.layouts.app')

@section('main')
    <div class="container bg-light">
        <div class="my-5">
            <h1>My Favorite Tracks</h1>
            @foreach($favoriteTracks as $track)
                <div class="col">
                    <div class="card h-100">
                        @include('client.app.track')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
