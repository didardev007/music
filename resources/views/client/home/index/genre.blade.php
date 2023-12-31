<div class="container-xl bg-light py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('genres.index') }}" class="text-decoration-none link-primary">@lang('app.genres')</a>
    </div>
    <section id="genre-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($genres as $genre)
                    <li class="splide__slide">
                        <a href="{{ route('genres.show', $genre->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
                            <div class="col text-center py-3">
                                <div>
                                    <img src="{{ asset('img/drawn_mic.jpg') }}" class="w-75 rounded-circle">
                                </div>
                                <div class="py-3">
                                    {{ $genre->name }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>

