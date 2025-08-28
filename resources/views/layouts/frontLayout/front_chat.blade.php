<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/lilac2express-logo.png') }}">
    <title>Lilac2xpress</title>

    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/frontend_fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/frontend_fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/frontend_fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/frontend_fonts/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Bold-BS4-CSS-Image-Slider.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Accordion-3338arvorept.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Card-Carousel-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Footer-Dark.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/jquery-ui-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Navigation-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Newsletter-Subscription-Form.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/frontend_css/Paralax-Hero-Banner.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Product-Details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Checkout-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Contact-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/Quote-Card.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/frontend_css/Product-Viewer-1.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/passtrength.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend_css/product-carousel.css') }}">

    <link href="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <!-- <link rel="stylesheet" href="{{ asset('css/frontend_css/mdb.min.css') }}"> -->
    <!-- Your custom styles (optional) -->
    <!-- <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}"> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <meta name="_token" content="{{csrf_token()}}" />

</head>

<body style="width: 100%;">

    @include('layouts.frontLayout.front_header')
    @yield('content')
    @include('layouts.frontLayout.front_footer')
    
    <script src="{{ asset('js/frontend_js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/Cart.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.cookie.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/select2.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend_js/bs-animation.js') }}"></script>
    <script src="{{ asset('js/frontend_js/owl.carousel.min.js') }}"></script>  
    <script src="{{ asset('js/frontend_js/Accordion-3338arvorept.js') }}"></script>
    <script src="{{ asset('js/frontend_js/Card-Carousel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="{{ asset('js/frontend_js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/frontend_js/MUSA_carousel-extended.js') }}"></script>
    <!-- <script src="{{ asset('js/frontend_js/Paralax-Hero-Banner.js') }}"></script> -->
    <script src="{{ asset('js/frontend_js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>
    <script src="{{ asset('js/frontend_js/passtrength.js') }}"></script>
    <!-- <script src="{{ asset('js/frontend_js/price-range.js') }}"></script> -->
    <script src="{{ asset('js/frontend_js/product-filter.js') }}"></script>
    <script src="{{ asset('js/frontend_js/Product-Viewer-1-1.js') }}"></script>
    <script src="{{ asset('js/frontend_js/Simple-Slider.js') }}"></script>
    <script src="{{ asset('js/frontend_js/Header-form.js') }}"></script>
    <script src="{{ asset('js/frontend_js/product-carousel.js') }}"></script>

    <script src="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('css/backend_css/sweetalert2/sweet-alert.init.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <!-- <script src="{{ asset('js/frontend_js/popper.min.js') }}"></script> -->
    <!-- MDB core JavaScript -->
    <!-- <script src="{{ asset('js/frontend_js/mdb.min.js') }}"></script> -->


<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script>

</body>
</html>
