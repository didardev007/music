<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('albums.index') }}" class="text-decoration-none link-primary">@lang('app.albums')</a>
    </div>
    <section id="album-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($albums as $album)
                    <li class="splide__slide">
                        <a href="{{ route('albums.show', $album->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
                            <div class="col text-center py-3">
                                <div>
                                    <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->image }}"
                                         class="w-75
                                    rounded-circle">
                                </div>
                                <div class="py-3">
                                    {{ $album->getName() }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>

