<div class="item">
    <div class="box_grid">
        <figure>
            @auth
            <a class="wish_bt hotel_like @if(Auth::user()->isLikedHotel($hotel->id)) liked @endif" data_id="{{$hotel->id}}"></a>
            @endauth
            <a href="{{ route('hotel.show',['hotel'=>$hotel->id]) }}"><img src="{{ asset('images/small/'.$hotel->preview->name) }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
            <small>{{ $hotel->city->name }}</small>
        </figure>
        <div class="wrapper">
            <h3><a href="tour-detail.html">{{ $hotel->name }}</a></h3>
            <p>@if(mb_strlen($hotel->view_description) > 0 ){{ mb_substr( $hotel->view_description , 0 ,80) }} @else لايوجد وصف @endif</p>
            <span class="price">ابتداء من <strong>{{ $hotel->prices[0]->price }}</strong> /{{ $hotel->prices[0]->quota }}</span>
        </div>
        <ul>
            <li><i class="icon_clock_alt"></i>{{ $hotel->min_day }}</li>
            <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
        </ul>
    </div>
</div>