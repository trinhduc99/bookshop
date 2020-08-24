<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
</head>
<body>

<div class="main">
    @include('sweetalert::alert')
    @yield('content')
</div>
<!-- JS -->
<script src="{{asset('js/admin/jquery.min.js')}}"></script>
<script src="{{asset('js/admin/main.js')}}"></script>
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>
