<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('artists.index') }}" class="text-decoration-none link-primary">@lang('app.artists')</a>
    </div>
    <section id="artist-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($artists as $artist)
                    <li class="splide__slide">
                        <a href="{{ route('artists.show', $artist->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
                            <div class="col text-center py-3">
                                <div>
                                    <img src="{{ asset('img/artist.jpg') }}" class="w-75 rounded-circle">
                                </div>
                                <div class="py-3">
                                    {{ $artist->name }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach()
            </ul>
        </div>
    </section>
</div>



