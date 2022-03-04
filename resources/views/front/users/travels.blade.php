@extends('front.layouts.app')

@section('css')
<style>
    .hotels_detail {
        background-image: url('{{ asset("img/wallpaper.jpg") }}');
		background-position: center;
		background-size: cover;
    }
</style>
@endsection

@section('content')

<div class="user-travels">
    <section class="hero_in hotels_detail">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>رحلاتي</h1>
            </div>
        </div>
        
    </section>
    <section id="description" class="container container-custom mt-4 no-border">
        <x-fav-search-component></x-fav-search-component>
    </section>
</div>

@endsection