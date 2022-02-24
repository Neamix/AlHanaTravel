<section class="mt-3">
@if($cities)
<div class="main_title_3">
    <span><em></em></span>
    <h2>المدن التي يكمكنك زيارتها معنا</h2>
    <p>زر افضل مدن مصر معنا</p>
</div>
<div class="row">
@foreach($cities as $city)
<x-box-small-details :city="$city"></x-box-small-details>
@endforeach
</div>
@endif
</section>