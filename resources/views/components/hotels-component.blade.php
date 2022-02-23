<section class="mb-3">
    @if($hotels)
    <div class="main_title_3">
        <span><em></em></span>
        <h2>اخر الفنادق المضافة</h2>
        <p>يمكنك زياره افخم الفنادق في مصر معنا</p>
    </div>
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-3">
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
            @endforeach
        </div>
        @if(count($hotels) > 2)
        <a href="restaurants-grid-isotope.html"><strong>اظهر جميع الفنادق<i class="arrow_carrot-left"></i></strong></a>
        @endif
    @endif
</section>