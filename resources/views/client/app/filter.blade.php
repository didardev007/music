<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="q" class="form-label">@lang('app.search')</label>
        <input type="search" class="form-control" id="q" name="q" value="{{ $f_q }}" autocomplete="off" maxlength="30">
    </div>

    <div class="mb-3">
        <label for="artist" class="form-label">Artist</label>
        <select class="form-select" id="artist" name="artist">
            <option value selected>-</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->name }}" {{ $artist->name == $f_artist ? 'selected':'' }}>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="album" class="form-label">Album</label>
        <select class="form-select" id="album" name="album">
            <option value selected>-</option>
            @foreach($albums as $album)
                <option value="{{ $album->slug }}" {{ $album->slug == $f_album ? 'selected':'' }}>
                    {{ $album->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <select class="form-select" id="genre" name="genre">
            <option value selected>-</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->slug }}" {{ $genre->slug == $f_genre ? 'selected':'' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="popularTrack" name="popularTrack" {{
        $f_popularTrack ? 'checked':'' }}>
        <label class="form-check-label" for="popularTrack">
            Popular Tracks
        </label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="newTrack" name="newTrack" {{ $f_newTrack ?
        'checked':'' }}>
        <label class="form-check-label" for="newTrack">
            New Tracks
        </label>
    </div>

    {{--<div class="mb-3">--}}
        {{--<label for="sortBy" class="form-label">Sort By</label>--}}
        {{--<select class="form-select" id="sortBy" name="sortBy">--}}
            {{--<option value {{ is_null($f_sortBy) ? 'selected':'' }}>--}}
                {{--New to old--}}
            {{--</option>--}}
            {{--<option value="old-to-new" {{ 'old-to-new' == $f_sortBy ? 'selected':'' }}>--}}
                {{--Old to new--}}
            {{--</option>--}}
            {{--<option value="low-to-high" {{ 'low-to-high' == $f_sortBy ? 'selected':'' }}>--}}
                {{--Low to high--}}
            {{--</option>--}}
            {{--<option value="high-to-low" {{ 'high-to-low' == $f_sortBy ? 'selected':'' }}>--}}
                {{--High to low--}}
            {{--</option>--}}
        {{--</select>--}}
    {{--</div>--}}

    <div class="row g-1 g-sm-2">
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">Filter</button>
        </div>
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">Clear</a>
        </div>
    </div>
</form>