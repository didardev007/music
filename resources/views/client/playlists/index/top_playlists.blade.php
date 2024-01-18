<div class="row row-cols-3">
    @foreach($topPlaylists as $obj)
        @include('client.app.playlist')
    @endforeach()
</div>
