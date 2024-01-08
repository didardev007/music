@extends('client.layouts.app')

@section('main')
    <div class="container-xl bg-light">
        <div class="input-group px-5 py-3">
            <form class="d-flex" action="{{ route('search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="query" value="{{ old('query', $query ?? '') }}" placeholder="@lang('app.search')">
                <button class="btn btn-outline-secondary" type="submit">@lang('app.search')</button>
            </form>
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
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <audio id="audioPlayer" controls>
                            <h1 class="text-danger">DINLEMELI DAL</h1><source src="{{ asset('track/1668705065_ahmet-orazgulyyew-dam-dam-2022.mp3') }}" type="audio/mp3">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <audio id="audioPlayer" controls>
                            <source src="{{ asset('track/INSTASAMKA-MONEYKEN+LOVE.mp3') }}" type="audio/mp3">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                </div>
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

