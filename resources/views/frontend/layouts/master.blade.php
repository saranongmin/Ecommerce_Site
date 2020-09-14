<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ECommerce App</title>
    <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/fonts/icomoon/style.css">
<link href="{{ asset('ui/frontend') }}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('ui/frontend')}}/css/style.css">
    <link href="{{ asset('ui/frontend') }}/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    
  </head>
<body>

@include('frontend.layouts.partials.header')

@yield('content')

@include('frontend.layouts.partials.footer')

  <script src="{{asset('ui/frontend')}}/js/config.js"></script>
  <script src="{{asset('ui/frontend')}}/js/add-to-cart.js"></script>

<script src="{{ asset('ui/frontend') }}/js/jquery-2.2.3.min.js"></script>
  <script src="{{asset('ui/frontend')}}/js/jquery-ui.js"></script>
  <script src="{{asset('ui/frontend')}}/js/popper.min.js"></script>
  <script src="{{asset('ui/frontend')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('ui/frontend')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('ui/frontend')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('ui/frontend')}}/js/aos.js"></script>

  <script src="{{asset('ui/frontend')}}/js/main.js"></script>
</body>

</html>