@extends('front.layouts.app')

@section('title')
اكتشف
@endsection

@section('content')
<main>
    <section class="hero_in hotels" style="background-image:url('img/wallpaper.jpg');">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>اكتشف رحلاتنا</h1>
            </div>
        </div>
    </section>

    <x-search-component></x-search-component>

</main>
<div id="toTop"></div>
@endsection

</html>