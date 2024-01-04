<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('artists.index') }}" class="text-decoration-none link-primary">@lang('app.artists')</a>
    </div>
    <section id="artist-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($artists as $artist)
                    <li class="splide__slide">
                        @include('client.app.artist')
                    </li>
                @endforeach()
            </ul>
        </div>
    </section>
</div>



