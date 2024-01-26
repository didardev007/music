<a href="@if ($obj->slug == 'favorites') @auth {{ route('favorites', ['userId' => $user->id, 'playlistId' => $obj->id]) }} @else {{ route('register') }} @endif @else {{ route('playlists.show', $obj->id) }} @endif"
   class="link-danger fw-semibold
            text-decoration-none text-danger-emphasis h5">
    <div class="col text-center py-3">
        <div>
            <img src="{{ asset('storage/' . $obj->image) }}" alt="{{ $obj->image }}" class="w-75
            rounded-circle">
        </div>
        <div class="py-3">
            {{ $obj->getName() }}
        </div>
    </div>
</a>
