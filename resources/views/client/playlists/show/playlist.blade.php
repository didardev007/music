<div class="d-block d-md-flex justify-content-center align-items-center py-3">
    <div class="col-6 col-md-5 col-lg-4 col-xl-3 ms-auto me-auto">
        <img src="{{ asset('storage/' . $obj->image) }}" class="img-fluid rounded-circle">
    </div>
    <div class="col-md-7 px-3 pt-3 pt-md-0">
        <div class="text-center">
            <div class="h2 text-primary pb-3">
                {{ $obj->getName() }}
            </div>
        </div>
    </div>
</div>
