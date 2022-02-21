@extends('front.layouts.app')

@section('content')
<main>		
<section class="hero_in hotels">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Paris hotels grid</h1>
        </div>
    </div>
</section>

<div class="container margin_60_35">
    <form class="search_form">
        <div class="row no-gutters custom-search-input-2 inner">
            <div class="col-lg-4">
                <div class="form-group">
                    <input class="form-control filter_box" name="name" type="text" placeholder="ما الذي تبحث عنه">
                    <i class="icon_search"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <select class="wide filter_box" name="city_id">
                    <option>All Categories</option>	
                    <option>Paris Center</option>
                    <option>La Defanse</option>
                    <option>Latin Quarter</option>
                </select>
            </div>
            <div class="col-lg-4" name="stars">
                <select class="wide filter_box">
                    <option>All Categories</option>	
                    <option>Paris Center</option>
                    <option>La Defanse</option>
                    <option>Latin Quarter</option>
                </select>
            </div>
        </div>
    </form>
</div>

<div class="container">
   
    <div class="loader_container w-100 d-flex justify-content-center mb-4 mt-4 d-none">
        <div class="loader" data-load="data-loader"></div>
    </div>

    <div class="row hotel_container">
       @foreach($hotels as $hotel)
       <div class="col-md-4">
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
                </div>
                <ul>
                    <li><i class="icon_star ml-2 mr-2"></i>{{ $hotel->city->name }}</li>
                    <li><div class="score"><span>Star<em>{{ $hotel->meal_plane }}</em></span><strong>{{ $hotel->stars }}</strong></div></li>
                </ul>
            </div>
       </div>
       @endforeach
    </div>
</div>

<p class="text-center"><button href="" class="btn_1 rounded add_top_30 load_more">Load more</button></p>

</main>
<div id="toTop"></div>
@endsection

@section('custom_script')
<script>
    let page = 0;

    $('.filter_box').on('keyup',function(){
        $('.loader_container').removeClass('d-none');

        $('.hotel_container').html('');

        let page = 1;

        $('.load_more').addClass('d-none');
        $('.load_more').trigger('click');
    });

    $(document).on('click',() => {
        let name = $('.search_form').serialize();
        console.log(formSerialize);
        page++

        $.ajax({
            url: `{{ route('hotel.filter') }}?page=${page}&${formSerialize}`,
            method: 'post',
            success: function(e) {
                let payload = e.data;

                if(payload.length < 6 ) {
                    $(this).remove();
                }
                console.log(payload);
                if(payload.length > 0) {
                    payload.forEach((hotel) => {
                        $('.hotel_container').append(buildHotel(hotel))
                    })
                }
            }
        });
    });
</script>
@endsection
</html>