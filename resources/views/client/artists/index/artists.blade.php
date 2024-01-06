<div class="container-xl bg-light">
    <div class="h4 text-primary text-center py-3">
        <a href="{{ route('artists.index') }}" class="text-decoration-none link-primary">@lang('app.artists')</a>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
               aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
        @foreach($artists as $artist)
            @include('client.app.artist')
        @endforeach()
    </div>
</div>