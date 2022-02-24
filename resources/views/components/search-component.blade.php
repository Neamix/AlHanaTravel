<div class="container margin_60_35">
    <form class="search_form">
        <div class="col-lg-12">
            <div class="row no-gutters custom-search-input-2 inner">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="عن ماذا تبحث ...." name="name">
                        <i class="icon_search"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <select class="wide" name="city_id">
                        <option value="0">جميع المدن</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}"> {{ $city->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <input type="submit" class="btn_search" value="Search">
                </div>
            </div>
            <!-- /row -->
        </div>
    </form>
    <div class="container main_container">

        <div class="loader_container w-100 d-flex justify-content-center mb-4 mt-4">
        <div class="loader  main_loader" data-load="data-loader"></div>
        </div>

        <p class="w-100 text-center  @if(count($hotels)) d-none @endif">لا يوجد فنادق للعرض</p>
       

        <div class="row hotel_container trans position-relative">
        @foreach($hotels as $hotel)
        <x-box-large-details :hotel="$hotel"></x-box-large-details>
        @endforeach
        </div>
        <p class="text-center"><button href="" class="btn_1 rounded add_top_30 load_more">Load more</button></p>
        </div>
</div>

@section('custom_script')
<script>
    let page = 1;
    let all_loaded = false;

    $('.search_form').on('submit',function(e){
        e.preventDefault();

        $('.hotel_container').fadeIn('slow',function(){
            $('.main_loader').fadeIn();
        });

        page = 0;
        $
        $('.load_more').fadeOut();
        searchHotel(this);
    });

    $('.load_more').on('click',function(){
        searchHotel(document.querySelector('.search_form'));
    });

    function searchHotel(form) {
        let formData = new FormData(form);
        page++

        $.ajax({
            url: `{{ route('hotel.filter') }}?page=${page}`,
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(e) {
                let payload = e.data;

                if(payload.length < 6 ) {
                    $(this).remove();
                }

                if(payload.length > 6) {
                    $('.load_more').fadeIn();
                } else {
                    $('.load_more').fadeOut();
                }   
                
                $('.main_loader').fadeOut('slow',function(){
                    $('.hotel_container').fadeIn();
                });

                if(payload.length > 0) {
                    payload.forEach((hotel) => {
                        $('.hotel_container').append(buildSmallDetailsHotel(hotel))
                    })
                }
            }
        });
    }
</script>
@endsection
