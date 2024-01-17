<div class="container-xl">
    <div class="h3 text-primary text-center py-3">
        <a href="{{ route('genres.index') }}" class="text-decoration-none link-primary">@lang('app.genres')</a>
    </div>
    <form class="d-flex input-group px-5 py-3" action="{{ url()->current() }}" method="get">
        @csrf
        <input type="text" class="form-control" name="q" value="{{ $f_q }}" placeholder="@lang('app.search')"
               autocomplete="off">
        <button class="btn btn-outline-secondary" type="submit">@lang('app.search')</button>
    </form>
    <div class="row row-cols-2 row-cols-md-3">
        @foreach($genres as $obj)
            @include('client.app.genre')
        @endforeach()
    </div>
</div>
