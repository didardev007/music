<form class="d-flex" action="{{ route('tracks.index', $f_q) }}">
    <input class="form-control me-2" type="search" placeholder="@lang('app.search')" id="q" name="q"
           value="{{ $f_q }}" autocomplete="off" maxlength="30">
    <button class="btn btn-sm btn-outline-success" type="submit">@lang('app.search')</button>
</form>