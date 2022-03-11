@extends('front.layouts.app')

@section('title')
{{$city->name}}
@endsection

@section('content')
<main>
    <section class="hero_in hotels" style="background-image:url(@if($city->image) {{asset('images/large/'.$city->image->name)}} @else {{ asset('img/no-image.jpg') }} @endif);">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>اكتشف رحلاتنا</h1>
            </div>
        </div>
    </section>
    <x-search-component :city="$city"></x-search-component>

</main>
<div id="toTop"></div>
@endsection

</html>