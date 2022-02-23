<section class="mt-3">
@if($cities)
<div class="main_title_3">
    <span><em></em></span>
    <h2>المدن التي يكمكنك زيارتها معنا</h2>
    <p>زر افضل مدن مصر معنا</p>
</div>
<div class="row">
@foreach($cities as $city)
<div class="col-xl-3 col-lg-6 col-md-6">
    <a href="restaurant-detail.html" class="grid_item">
        <figure>
            <img src="{{ asset('images/small/'.$city->image->name) }}" class="img-fluid" alt="">
            <div class="info">
                <h3>{{ $city->name }}</h3>
            </div>
        </figure>
    </a>
</div>
@endforeach
</div>
@endif
</section>