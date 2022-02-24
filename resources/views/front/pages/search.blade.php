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

    <x-search-component></x-search-component>

</main>
<div id="toTop"></div>
@endsection

</html>