<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('front.layouts.header')
</head>
<body>
    <div id="app" class="auth">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
