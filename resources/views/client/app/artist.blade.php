<a href="{{ route('artists.show', $obj->id) }}" class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
    <div class="col text-center py-3 px-3">
        <div>
            <img src="{{ asset('storage/' . $obj->image) }}" class="img-fluid rounded-circle" @if(!request()->routeIs('artists.index'))style="object-fit: fill; width:350px; height: 230px;" @else style="object-fit: fill; width:350px; height: 350px;"@endif>
        </div>
        <div class="py-3">
            {{ $obj->getName() }}
        </div>
    </div>
</a>
