<div class="col">
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="position-relative">
                <img src="{{ asset('img/artist.jpg') }}" alt="" class="img-fluid rounded">
            </div>
            <a href="{{ route('tracks.show', $track->id) }}" class="link-dark h6 text-decoration-none">
                {{ $track->name }}
            </a>
            <div class="small">
                <div class="text-danger-emphasis">
                    Artist: <a href="{{ route('tracks.index', ['artist' => $track->artist->slug]) }}"
                               class="text-decoration-none">{{ $track->artist->name }}</a>
                </div>
                <div class="text-danger-emphasis">
                    Album: <a href="{{ route('tracks.index', ['album' => $track->album->slug]) }}"
                              class="text-decoration-none">{{ $track->album->name }}</a>
                </div>
                <div class="text-danger-emphasis">
                    Genre: <a href="{{ route('tracks.index', ['genre' => $track->genre->slug]) }}"
                              class="text-decoration-none">{{ $track->genre->name }}</a>
                </div>
            </div>
            <div class="text-success">
                {{ $track->durability }}
            </div>
            <div>
                Realeased at: <span class="text-danger">{{ $track->release_date }}</span>
            </div>
        </div>
    </div>
</div>