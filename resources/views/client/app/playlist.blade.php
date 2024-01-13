<a href="{{ route('playlists.show', $playlist->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
    <div class="col text-center py-3">
        <div>
            <img src="{{ asset('storage/img/' . $playlist->image) }}" alt="{{ $playlist->image }}" class="w-75
            rounded-circle">
        </div>
        <div class="py-3">
            {{ $playlist->getName() }}
        </div>
    </div>
</a>