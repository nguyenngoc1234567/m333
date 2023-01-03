<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Eiser ecommerce</title>

  <link rel="stylesheet" href="{{asset('shop/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/linericon/style.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/css/themify-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/css/flaticon.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/owl-carousel/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/lightbox/simpleLightbox.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/nice-select/css/nice-select.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/animate-css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/vendors/jquery-ui/jquery-ui.css')}}" />

  <link rel="stylesheet" href="{{asset('shop/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('shop/css/responsive.css')}}" />
</head>

<body>

  @include('shop.includes.header');
  @yield('content')
  {{-- @include('shop.includes.main');   --}}



  @include('shop.includes.footer');

  <script src="{{asset('shop/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('shop/js/popper.js')}}"></script>
  <script src="{{asset('shop/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('shop/js/stellar.js')}}"></script>
  <script src="{{asset('shop/vendors/lightbox/simpleLightbox.min.js')}}"></script>
  <script src="{{asset('shop/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('shop/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('shop/vendors/isotope/isotope-min.js')}}"></script>
  <script src="{{asset('shop/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('shop/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('shop/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('shop/vendors/counter-up/jquery.counterup.js')}}"></script>
  <script src="{{asset('shop/js/mail-script.js')}}"></script>
  <script src="{{asset('shop/js/theme.js')}}"></script>
</body>

</html>
