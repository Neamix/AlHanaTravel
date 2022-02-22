<div class="container container-custom margin_80_0">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>{{ $title }}</h2>
    </div>
    <div id="reccomended" class="owl-carousel owl-theme">
        @foreach($hotels as $hotel)
        <div class="item">
        <div class="box_grid">
    <figure>
        <a href="#0" class="wish_bt"></a>
        <a href="tour-detail.html"><img src="{{ asset('images/small/'.$hotel->preview->name) }}" class="img-fluid" alt="" width="800" height="533">
            <div class="read_more"><span>مزيد من المعلومات</span></div>
        </a>
    </figure>
    <div class="wrapper">
        <h3><a href="tour-detail.html">{{ $hotel->name }}</a></h3>
        <p>{{ mb_substr($hotel->description, 0, 100) . '....' }}.</p>
        <span class="price">ابتداء من <strong>{{ $hotel->prices[0]->price }}</strong> /{{ $hotel->prices[0] ->quota}}</span>
    </div>
    <ul>
        <li><i class="icon_star ml-2 mr-2"></i>{{ $hotel->city->name }}</li>
        <li><div class="score"><span>Star<em>{{ $hotel->meal_plane }}</em></span><strong>{{ $hotel->stars }}</strong></div></li>
    </ul>
</div>
        </div>
        @endforeach
    </div>
    <!-- /carousel -->
    <p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">اظهار جميع الفنادق</a></p>
    <hr class="large">
</div>