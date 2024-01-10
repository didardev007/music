<div class="row row-cols-3">
    @foreach($topPlaylists as $playlist)
        @include('client.app.playlist')
    @endforeach()
</div>
