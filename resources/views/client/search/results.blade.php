@extends('client.layouts.app')

@section('main')
    <div class="container-xl bg-light">
        <div class="input-group px-5 py-3">
            <input type="text" class="form-control" placeholder="@lang('app.search')">
            <button class="btn btn-outline-secondary" type="button">@lang('app.search')</button>
        </div>

        <h2>Search Results for "{{ $query }}"</h2>

        <div>
            <!-- Artists -->
            <h3>Artists</h3>
            @if ($results->isEmpty())
                <p>No artists found.</p>
            @else
                <ul>
                    @foreach ($results as $artist)
                        <li>{{ $artist->name }}</li>
                        <!-- You can add more artist details here -->
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <!-- Tracks -->
            <h3>Tracks</h3>
            @if ($results1->isEmpty())
                <p>No tracks found.</p>
            @else
                <ul>
                    @foreach ($results1 as $track)
                        <li>{{ $track->name }}</li>
                        <!-- You can add more track details here -->
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <!-- Albums -->
            <h3>Albums</h3>
            @if ($results2->isEmpty())
                <p>No albums found.</p>
            @else
                <ul>
                    @foreach ($results2 as $album)
                        <li>{{ $album->name }}</li>
                        <!-- You can add more album details here -->
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

