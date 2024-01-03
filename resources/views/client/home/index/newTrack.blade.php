<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index') }}" class="text-decoration-none link-primary">@lang('app.newTracks')</a>
    </div>
    <section id="newTracks-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($newTracks as $track)
                    <li class="splide__slide">
                        @include('client.app.track')
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>