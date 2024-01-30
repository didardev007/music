<div class="d-block d-md-flex justify-content-center align-items-center py-3">
    <div class="col-6 col-md-5 col-lg-4 col-xl-3 ms-auto me-auto">
        <img src="{{ asset('storage/' . $obj->image) }}" class="img-fluid rounded-circle">
    </div>
    <div class="col-md-7 px-3 pt-3 pt-md-0">
        <div class="text-center">
            <div class="h2 text-primary pb-3">
                {{ $obj->getName() }}
            </div>
            <div class="h6 fw-normal">
                {{ $obj->getDescription() }}
            </div>
            <a href="{{ route('artists.show', ['artist' => $obj->artist->id]) }}" class="text-decoration-none">
                <div class="row align-items-center justify-content-center py-3">
                    <div class="col-4 col-sm-3 col-lg-2">
                        <img src="{{ asset('storage/' . $obj->artist->image) }}" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-6 text-start">
                        <span class="text-danger-emphasis">@lang('app.artist'):</span> {{ $obj->artist->getName() }}
                    </div>
                </div>
            </a>
            <div class="text-danger-emphasis py-3">
                @lang('app.releasedAt'): <span class="text-danger">{{ \Carbon\Carbon::parse($obj->release_date)->format('d-M-Y') }}</span>
            </div>
        </div>
    </div>
</div>
