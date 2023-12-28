<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        Genres
    </div>
    <div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 g-3 g-sm-4">
        @foreach($genres as $genre)
            <a href="{{ route('tracks.index', ['genre' => $genre->slug]) }}" class="link-dark fw-semibold text-decoration-none text-danger-emphasis h5">
                <div class="col text-center py-3">
                    <div>
                        <img src="{{ asset('img/drawn_mic.jpg') }}" class="img-fluid rounded-circle">
                    </div>
                    <div class="py-3">
                        {{ $genre->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>