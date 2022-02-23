<div>
<div id="reccomended" class="owl-carousel owl-theme">
   @foreach($hotels as $hotel)
   <div class="item">
        <div class="box_grid">
            <figure>
                <a href="#0" class="wish_bt"></a>
                <a href="tour-detail.html"><img src="img/tour_1.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                <small>{{ $hotel->city->name }}</small>
            </figure>
            <div class="wrapper">
                <h3><a href="tour-detail.html">{{ $hotel->name }}</a></h3>
                <p>{!! $hotel->description !!}</p>
                <span class="price">ابتداء من <strong>{{ $hotel->prices[0]->value }}</strong> /{{ $hotel->prices[0]->quota }}</span>
            </div>
            <ul>
                <li><i class="icon_clock_alt"></i>{{ $hotel->min_day }}</li>
                <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
            </ul>
        </div>
    </div>
   @endforeach
</div>