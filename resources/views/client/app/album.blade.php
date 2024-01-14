<a href="{{ route('albums.show', $album->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
    <div class="col text-center py-3">
        <div>
            <img src="{{ asset('storage/' . $album->image) }}" class="w-75
            rounded-circle">
        </div>
        <div class="py-3">
            {{ $album->getName() }}
        </div>
    </div>
</a>