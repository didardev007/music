@extends('client.layouts.app')

@section('main')
    <div class="container-xl bg-light">
        <div class="input-group px-5 py-3">
            <input type="text" class="form-control" placeholder="@lang('app.searchArtist')">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">@lang('app.search')</button>
        </div>

        <div class="row">

            <div class="py-3">
                <h2>Search Results for "{{ $query }}"</h2>
            </div>

            <div class="col-12 col-md-4">
                <h3>Artists</h3>
                @if ($results->isEmpty())
                    <p>No artists found.</p>
                @else
                    <ul>
                        @foreach ($results as $artist)
                            <li>{{ $artist->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-12 col-md-4">
                <h3>Tracks</h3>
                @if ($results1->isEmpty())
                    <p>No tracks found.</p>
                @else
                    <ul>
                        @foreach ($results1 as $track)
                            <li>{{ $track->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-12 col-md-4">
                <h3>Albums</h3>
                @if ($results2->isEmpty())
                    <p>No albums found.</p>
                @else
                    <ul>
                        @foreach ($results2 as $album)
                            <li>{{ $album->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection

