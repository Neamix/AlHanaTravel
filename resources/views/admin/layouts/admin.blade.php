<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.layouts.header')
    <title>@yield('title')</title>
</head>
<body>
    @include('admin.layouts.navbar')
    <div class="content-wrapper">
        <div class="container-fluid">
        @yield('content')
        </div>
    </div>
    <footer>
    @include('admin.layouts.footer')
    </footer>
</body>
</html>