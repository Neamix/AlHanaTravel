<div class="col-md-4">
    <a href="hotel-detail.html" class="grid_item">
        <figure>
            <div class="score"><strong>{{ $hotel->city->name }}</strong></div>
            <img src="@if($hotel->preview) {{ asset('images/small/'.$hotel->preview->name) }} @else {{ asset('img/no-image') }} @endif" class="img-fluid" alt="">
            <div class="info">
                <div class="cat_star">
                    @for($i=1;$i <= $hotel->stars;$i++)
                    <i class="icon_star"></i>
                    @endfor
                </div>
                <h3>{{ $hotel->name }}</h3>
            </div>
        </figure>
    </a>
</div>