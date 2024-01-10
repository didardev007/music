<div class="row row-cols-3">
    @foreach($playlists as $playlist)
        @if($playlist->name)
        @include('client.app.playlist')
        @endif
    @endforeach()
</div>
