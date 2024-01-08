<div class="container-xl bg-light py-3">
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
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <audio id="audioPlayer" controls>
                                <source src="{{ asset('track/1668705065_ahmet-orazgulyyew-dam-dam-2022.mp3') }}" type="audio/mp3">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                    </div>
            </ul>
        </div>
    </section>
</div>



