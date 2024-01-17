<div class="container-xl py-2">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index', ['album' => $obj->album->slug]) }}" class="text-decoration-none
        link-primary">@lang('app.sameAlbum')
        </a>
    </div>
    <div id="sameAlbum-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($sameAlbum as $obj)
                    <li class="splide__slide">
                        @include('client.app.track')
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
