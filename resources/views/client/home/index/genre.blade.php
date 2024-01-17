<div class="container-xl py-1">
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
                                    <img src="{{ asset('storage/' . $genre->image) }}" alt="{{ $genre->image }}"
                                         class="w-75
                                    rounded-circle">
                                </div>
                                <div class="py-3">
                                    {{ $genre->getName() }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>

