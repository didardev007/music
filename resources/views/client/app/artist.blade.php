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