<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
<meta name="keywords" content="alhana,egypt,travel">
<meta name="author" content="Ansonika">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Cache-control" content="public">
<link rel="canonical" href=" {{  Request::url() }}" />
<!-- Favicons-->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

<!-- GOOGLE WEB FONT -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<!-- BASE CSS -->
<link href="{{ asset('css/front/bootstrap-rtl.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/front/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/front/style-rtl.css') }}" rel="stylesheet">
<link href="{{ asset('css/front/vendors.css') }}" rel="stylesheet">

<!-- REVOLUTION SLIDER CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/front/revolution-slider/fonts/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/front/revolution-slider/css/settings.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/front/revolution-slider/css/layers.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/front/revolution-slider/css/navigation.css') }}">

<!-- YOUR CUSTOM CSS -->
<link href="{{ asset('css/front/custom.css') }}" rel="stylesheet">
<link href="{{ asset('js/modernizr_slider.js') }}" rel="stylesheet">

<style type="text/css">
    .tiny_bullet_slider .tp-bullet:before {
        content: " ";
        position: absolute;
        width: 100%;
        height: 25px;
        top: -12px;
        left: 0px;
        background: transparent
    }

    .bullet-bar.tp-bullets:before {
        content: " ";
        position: absolute;
        width: 100%;
        height: 100%;
        background: transparent;
        padding: 10px;
        margin-left: -10px;
        margin-top: -10px;
        box-sizing: content-box
    }

    .bullet-bar .tp-bullet {
        width: 60px;
        height: 3px;
        position: absolute;
        background: #aaa;
        background: rgba(204, 204, 204, 0.5);
        cursor: pointer;
        box-sizing: content-box
    }

    .bullet-bar .tp-bullet:hover,
    .bullet-bar .tp-bullet.selected {
        background: rgba(204, 204, 204, 1)
    }
</style>
@yield('css')