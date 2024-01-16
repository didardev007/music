@extends('client.layouts.app')

@section('main')
    <div class="container-xl">
        <form class="d-flex input-group px-5 py-3" action="{{ route('search') }}" method="get">
            @csrf
            <input type="text" class="form-control" name="query" value="{{ old('query', $query ?? '') }}" placeholder="@lang('app.search')">
            <button class="btn btn-outline-secondary" type="submit">@lang('app.search')</button>
        </form>

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

