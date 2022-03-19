@if(count($hotels))
<div>
<div class="main_title_3">
    <span><em></em></span>
    <h2>الفنادق الاكثر رواجا</h2>
    <p>الفنادق التي يفضلها عملائنا</p>
</div>
<div id="reccomended_adventure" class="owl-carousel owl-theme">
   @foreach($hotels as $hotel)
   <x-hotel-full-image-component :hotel="$hotel"></x-hotel-full-image-component>
   @endforeach
</div>
@endif