<a href="{{ route('genres.show', $genre->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
    <div class="col text-center py-3">
        <div>
            <img src="{{ asset('img/drawn_mic.jpg') }}" class="w-75 rounded-circle">
        </div>
        <div class="py-3">
            {{ $genre->getName() }}
        </div>
    </div>
</a>