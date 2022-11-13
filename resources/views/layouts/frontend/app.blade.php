<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="description" content="Billto is an online invoice generator and accounting software – an innovative business tool you can use for creating invoices online without any hassle. It allows businesses to produce invoices using a ready-made template, where all that needs to be done is inserting the client’s details, the items for payment, taxes (if necessary), and the total amount – then sending the invoice to the client online.">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="@yield('title')">
  <meta property="og:type" content="">
  <meta property="og:description" content="Billto is an online invoice generator and accounting software – an innovative business tool you can use for creating invoices online without any hassle. It allows businesses to produce invoices using a ready-made template, where all that needs to be done is inserting the client’s details, the items for payment, taxes (if necessary), and the total amount – then sending the invoice to the client online.">
  <meta property="og:url" content="https://billto.io">
  <meta property="og:image" content="{{ asset('assets/frontend/img/thumbnail/banner.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="{{ asset('icon.png') }}">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="{{ asset('assets/frontend/css/normalize.css') }}">

  <!-- Bootstrap v5.1.3  -->
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
  <!-- Bootstrap icons v1.7.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

 
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap');
    *{
      font-family: 'Open Sans', sans-serif !important;
    }
  </style>

  <!--JQuery-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

    @stack('frontend_css')

  <meta name="theme-color" content="#fafafa">

</head>

<body>
  <!-- Header Start -->
  @include('layouts.frontend.partial.header')
  <!-- Header End -->

    @yield('frontend_content')

  <!-- Footer Start -->
  @include('layouts.frontend.partial.footer')
  <!-- Footer End -->

  <script src="{{ asset('assets/frontend/js/vendor/modernizr-3.11.2.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>

  <!-- Bootstrap v5.1.3 -->
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>



  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

  @stack('frontend_js')
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

</html>
