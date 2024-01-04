<div class="container-xl">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('artists.index') }}" class="text-decoration-none link-primary">@lang('app.artists')</a>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
        @foreach($artists as $artist)
            @include('client.app.artist')
        @endforeach()
    </div>
</div>