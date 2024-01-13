@extends('client.layouts.app')
@section('title') Music | Tracks @endsection
@section('main')
    <div class="container-xl bg-light py-4">
        <div class="h4 text-primary pb-3">Tracks</div>
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-2">
                @include('client.app.filter')
            </div>
            <div class="col">
                @foreach($tracks as $track)
                    @include('client.app.track')
                @endforeach
                <div class="py-3">
                    {{ $tracks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection