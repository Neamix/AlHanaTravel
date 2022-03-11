@extends('front.layouts.app')

@section('title')
الرئيسية
@endsection

@section('content')
<div id="page">
		<!-- /header -->
		
		<main>
		<x-slider-component></x-slider-component>
		<div class="container container-custom margin_30_95">

			<x-popular-hotel-slider-component></x-popular-hotel-slider-component>

			<x-hotels-component></x-hotels-component>

			<x-city-component></x-city-component>

		</div>

		<div class="call_section" style="  background: url({{ asset('/img/wallpaper.jpg') }}) center center no-repeat fixed;">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>استمتع بافضل الرحلات معنا</h3>
							<p>مع الهنا ترفل فانت يمكنك ان تزور اكثر من 50 فندق حول مصر لتسمتع باجازة سعيده مع الاسرة او الاصدقاء</p>
							<a href="/search" class="btn_1 rounded">استكشف اكثر</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>
	<!--/footer-->
	</div>
	<!-- page -->
@endsection