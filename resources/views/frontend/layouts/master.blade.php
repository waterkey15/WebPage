<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="asdas">
    <title>Dingo</title>
    <link rel="icon" href="{{asset('frontend/dingoimg/favicon.png')}}">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{mix('frontend/dingocss/dingo.css')}}">
</head>

<body>
<!--::header part start::-->
@include('frontend.partials.header')
<!-- Header part end-->
@yield('content')

<!-- footer part start-->
@include('frontend.partials.footer')
<!-- footer part end-->

<!-- jquery plugins here-->

<!-- custom js -->
<script src="{{mix('frontend/dingojs/dingo.js')}}"></script>
<script src="{{mix('frontend/dingo/js/app.js')}}"></script>

</body>

</html>
