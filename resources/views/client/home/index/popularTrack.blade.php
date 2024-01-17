<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index', ['popularTrack' => 1]) }}" class="text-decoration-none link-primary">
            @lang('app.popularTracks')
        </a>
    </div>
    <div class="row row-cols-1 row-cols-lg-2 g-0">
        @foreach($popularTracks as $obj)
            @include('client.app.track')
        @endforeach
    </div>
</div>
