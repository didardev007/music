<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('artists.index') }}" class="text-decoration-none link-primary">Artists</a>
    </div>
    <div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 g-3 g-sm-4">
        @foreach($artists as $artist)
            <a href="{{ route('artists.show', $artist->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
                <div class="col text-center py-3">
                    <div>
                        <img src="{{ asset('img/artist.jpg') }}" class="img-fluid rounded-circle">
                    </div>
                    <div class="py-3">
                        {{ $artist->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>