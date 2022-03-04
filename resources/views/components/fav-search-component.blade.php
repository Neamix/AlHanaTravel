<div class="container margin_60_35">
    <form class="search_form">
        <div class="col-lg-12">
            <div class="row no-gutters custom-search-input-2 inner">
                <div class="@if(count($cities) > 1) col-lg-10 @else col-lg-10 @endif">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="عن ماذا تبحث ...." name="name">
                        <i class="icon_search"></i>
                    </div>
                </div>
                <div class="col-lg-2">
                    <input type="submit" class="btn_search" value="ابحث">
                </div>
            </div>
            <!-- /row -->
        </div>
    </form>
    <div class="container main_container">

        <div class="loader_container w-100 d-flex justify-content-center mb-4 mt-4">
        <div class="loader  main_loader d-none mt-3" data-load="data-loader"></div>
        </div>

        <p class="w-100 text-center  @if(count($hotels)) d-none @endif">لا يوجد فنادق للعرض</p>
       

        <div class="row hotel_container trans position-relative">
        @foreach($hotels as $hotel)
        <div class="col-md-4">
            <x-like-box-component :hotel="$hotel"></x-like-box-component>
        </div>
        @endforeach
        </div>

        @if(count($hotels) > 9)
        <p class="text-center"><button href="" class="btn_1 rounded add_top_30 load_more loader_key position-relative" loader_name="hotel_more">المزيد <div class="loader small_loader position-relative d-none" data-load="hotel_more"></div> </button></p>
        @endif
        </div>
</div>

@section('custom_script')
<script>
    let page = 1;
    let all_loaded = false;

    $('.search_form').on('submit',function(e){
        e.preventDefault();

        $('.hotel_container').html('');
        $('.main_loader').removeClass('d-none');

        page = 0;
        $('.load_more').addClass('d-none');
        searchHotel(this);
    });

    $('.load_more').on('click',function(){
        searchHotel(document.querySelector('.search_form'));
    });

    function searchHotel(form) {
        let formData = new FormData(form);
        page++

        $.ajax({
            url: `{{ route('likes.filter') }}?page=${page}`,
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(e) {
                let payload = e.data;

                if(payload.length < 9 ) {
                    $(this).remove();
                }
                console.log(payload.length > 8)
                if(payload.length > 8) {
                    $('.load_more').removeClass('d-none');
                } else {
                    $('.load_more').addClass('d-none');
                }   
                
                $('.main_loader').addClass('d-none');

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
