<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{URL::to('src/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/font-awesome.min.css')}}">
    <script src="{{URL::to('src/js/popper.min.js')}}"></script>
    <script src="{{URL::to('src/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('src/js/bootstrap.min.js')}}"></script>

    @yield('styles')
</head>
<body>

    <div class="container mt-4">
        @yield('header')
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>