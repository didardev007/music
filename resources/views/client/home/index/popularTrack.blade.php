<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index') }}" class="text-decoration-none link-primary">@lang('app.popularTracks')</a>
    </div>
    @foreach($popularTracks as $track)
        @include('client.app.track')
    @endforeach
</div>