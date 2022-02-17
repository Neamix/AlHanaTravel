<div class="col-xl-3 col-lg-6 col-md-6">
    <a href="hotel-detail.html" class="grid_item">
        <figure>
            <div class="score"><strong>{{ $city->hotels->count() }} فندق</strong><em></em></div>
            <img src="{{ asset('images/small/'.$city->image->name) }}" class="img-fluid" alt="">
            <div class="info">
                <h3>{{ $city->name }}</h3>
            </div>
        </figure>
    </a>
</div>