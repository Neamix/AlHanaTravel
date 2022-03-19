<div class="col-xl-3 col-lg-6 col-md-6">
    <a href="{{ route('city.hotel',['city' => $city->id]) }}" class="grid_item">
        <figure>
            <img loading="lazy" src="@if($city->image){{ asset('images/small/'.$city->image->name) }}@else {{ asset('img/no-image.jpg ') }} @endif" loading="lazy" class="img-fluid" alt="{{ $city->name }}">
            <div class="info">
                <h3>{{ $city->name }}</h3>
            </div>
        </figure>
    </a>
</div>