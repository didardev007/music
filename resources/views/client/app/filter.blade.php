<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="q" class="form-label">@lang('app.search')</label>
        <input type="search" class="form-control" id="q" name="q" value="{{ $f_q }}" autocomplete="off" maxlength="30">
    </div>

    <div class="mb-3">
        <label for="artist" class="form-label">@lang('app.artist')</label>
        <select class="form-select" id="artist" name="artist">
            <option value selected>-</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->slug }}" {{ $artist->slug == $f_artist ? 'selected':'' }}>
                    {{ $artist->getName() }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="album" class="form-label">@lang('app.album')</label>
        <select class="form-select" id="album" name="album">
            <option value selected>-</option>
            @foreach($albums as $album)
                <option value="{{ $album->slug }}" {{ $album->slug == $f_album ? 'selected':'' }}>
                    {{ $album->getName() }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="genre" class="form-label">@lang('app.genre')</label>
        <select class="form-select" id="genre" name="genre">
            <option value selected>-</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->slug }}" {{ $genre->slug == $f_genre ? 'selected':'' }}>
                    {{ $genre->getName() }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="popularTrack" name="popularTrack" {{
        $f_popularTrack ? 'checked':'' }}>
        <label class="form-check-label" for="popularTrack">
            @lang('app.popularTracks')
        </label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="newTrack" name="newTrack" {{ $f_newTrack ?
        'checked':'' }}>
        <label class="form-check-label" for="newTrack">
            @lang('app.newTracks')
        </label>
    </div>

    <div class="row g-1 g-sm-2">
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">@lang('app.filter')</button>
        </div>
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">@lang('app.clear')</a>
        </div>
    </div>
</form>