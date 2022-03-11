@extends('front.layouts.app')
@section('title')
{{ $hotel->name }}
@endsection

@section('css')
<style>
    .hotels_detail::before {
        background: url('{{ asset("images/large/".$hotel->preview->name) }}') !important;
		background-position: center;
		background-size: cover;
    }
</style>
@endsection

@section('content')
<main>
		<section class="hero_in hotels_detail">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>تفاصيل عن {{ $hotel->name }}</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
            <nav class="secondary_nav sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#description" class="active">الوصف</a></li>
						<li><a href="#images">الصور</a></li>
						<li><a href="#sidebar">Booking</a></li>
					</ul>
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
                        <section id="description" class=" no_border mb-5">
                            <h2>الوصف</h2>
                            <div class="mt-1 mb-5">
                                {!! $hotel->description !!}
                            </div>
                        </section>
                        <section id="images">
                            <div  class="container margin_60_35">
                                <h2 class="mb-4">صور رحلتنا الي {{$hotel->name}} </h2>
                                <div class="pictures_grid magnific-gallery clearfix">
									@if(!count($hotel->images))
									<p class="text-center">لا يوجد صور للعرض</p>
									@endif
                                    @for($i = 0;$i <= $hotel->images->count() - 1; $i++ )
                                        <figure>
                                            <a href="{{ asset('images/medium/'.$hotel->images[$i]->name) }}" title="{{ $hotel->name }}" data-effect="mfp-zoom-in">
                                                @if($i == 4 && $hotel->images->count() > 5)
                                                <span class="d-flex align-items-center justify-content-center">{{ $hotel->images->count() - 5  }}</span>
                                                @endif
                                                <img src="{{ asset('images/small/'.$hotel->images[$i]->name) }}" alt="">
                                            </a>
                                        </figure>
                                        @if($i == 4)
                                            @break
                                        @endif
                                        @endfor
                                </div>
                            </div>
                        </section>
						<!-- /section -->	
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">

							<form class="reservation_form">
								@csrf
								<div class="price">
									<span> {{ $hotel->prices[0]->price }} جم<small> {{ $hotel->prices[0]->quota }} </small></span>
									<div class="score"><strong>{{ $hotel->stars }}</strong></div>
								</div>

								<div class="form-group input-dates">
									<input class="form-control" type="text" name="dates" placeholder="من - الي">
									<p class="error error_dates mb-0"></p>
								</div>
								@guest
								<div class="form-group input-dates">
									<input class="form-control" type="text" name="email" placeholder="البريد اليكتروني">
									<p class="error error_email mb-0"></p>
								</div>

								<div class="form-group input-dates">
									<input class="form-control" type="tel" name="phone" placeholder="الهاتف">
									<p class="error error_phone mb-0"></p>
								</div>

								<div class="form-group input-dates">
									<input class="form-control" type="text" name="name" placeholder="الاسم">
									<p class="error error_name mb-0"></p>
								</div>
								@endguest
								<input class="form-control" type="hidden" name="hotel_id" value="{{ $hotel->id }}">
								<div class="panel-dropdown">
									<a href="#">الافراد <span class="qtyTotal">1</span></a>
									<div class="panel-dropdown-content right">
										<div class="qtyButtons">
											<label>حدد عدد الافراد</label>
											<input type="text" name="qtyInput" value="1">
										</div>
									</div>
								</div>
								<p class="error error_qtyInput"></p>
								<div class="form-group clearfix">
									<div class="custom-select-form">
										<select class="wide" name="price_id">
											@foreach($hotel->prices as $price)
											<option value="{{ $price->id }}">
												<bold>{{ $price->quota }}</bold> بسعر {{ $price->price }} جم
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<button class=" add_top_30 btn_1 full-width purchase">احجز</button>
							</form>
							<!-- <a class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> اضف الي المفضلة</a> -->
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection

@section('custom_script')
	
	<!-- DATEPICKER  -->
	<script>
	$('.reservation_form').on('submit',function(e){
		e.preventDefault();
		let formData = new FormData(this);

		window.Swal.fire({
			title: 'تم تسجيل طلبك بنجاح',
			text: 'سيتم التواصل معك من طرف احد موظفين خدمه العملاء لتاكيد الحجز',
			icon: 'success',
			confirmButtonText: 'حسنا',
			showCancelButton: false,
			showCloseButton: false
		})


		$.ajax({
			url: '{{ route("hotel.reserved") }}',
			type: 'post',
			data: formData,
			processData: false,
			contentType: false,
			success:  () => {
				$('.error').each(function(){
					$(this).text('');
				});
			},
			error: (error_bag) => {
				let errors = error_bag.responseJSON.errors;
				$(this).find('.error').text('');
				for (error in errors ) {
					$(this).find(`p.error_${error}`).text(errors[error]);
				}
			}
		})
	})
	$(function() {
	 $('input[name="dates"]').daterangepicker({
		  autoUpdateInput: false,
		  parentEl:'.scroll-fix',
		  minDate:new Date(),
		  opens:'right',
		  locale: {
		  	direction: 'rtl',
			  cancelLabel: 'Clear'
		  }
	  });
	  $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
	  });
	  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });
	});
	</script>
	
	<!-- INPUT QUANTITY  -->
    <script src="{{ asset('js/front/input_qty.js') }}"></script>
@endsection