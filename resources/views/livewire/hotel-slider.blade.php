<div class="container container-custom margin_80_0">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>{{ $title }}</h2>
    </div>
    <div id="reccomended" class="owl-carousel owl-theme">
        @foreach($hotels as $hotel)
        <div class="item">
            <livewire:large-box :hotel="$hotel">
        </div>
        @endforeach
    </div>
    <!-- /carousel -->
    <p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">اظهار جميع الفنادق</a></p>
    <hr class="large">
</div>