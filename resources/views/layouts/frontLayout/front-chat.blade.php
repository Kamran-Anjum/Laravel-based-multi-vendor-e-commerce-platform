<!DOCTYPE html>
<html lang="">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <!-- site Favicon -->
        <link rel="icon" href="{{ asset('images/frontend-images/favicon/favicon.png') }}" sizes="32x32">
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/lilac2express-logo.png') }}"> -->
        <title>Lilac2xpress</title>

        <!-- css Icon Font -->
        <!-- <link rel="stylesheet" href="{{ asset('css/frontend-css/vendor/gicons.css') }}"> -->

        <!-- css All Plugins Files -->
        <!-- <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/plugins/nouislider.css') }}"> -->

        <!-- Main Style -->
        <!-- <link rel="stylesheet" id="main_style" href="{{ asset('css/frontend-css/demo-1.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend-css/responsive.css') }}"> -->

        @vite('resources/scss/app.scss')

        <link href="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

        <meta name="_token" content="{{csrf_token()}}" />

    </head>

    <body>
        
        @include('layouts.frontLayout.front-header')
        @yield('content')
        @include('layouts.frontLayout.front-footer')

        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        
        <!-- Plugins JS -->
        <script src="{{ asset('js/frontend-js/plugins/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/fontawesome.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/countdownTimer.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/infiniteslidev2.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/slick.min.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/nouislider.js') }}"></script>
        <script src="{{ asset('js/frontend-js/plugins/wow.js') }}"></script>

        <!-- Main Js -->
        <script src="{{ asset('js/frontend-js/main.js') }}"></script>
        <script src="{{ asset('js/frontend-js/main-2.js') }}"></script>
        <script src="{{ asset('js/frontend-js/demo-1.js') }}"></script>

        <script src="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('css/backend_css/sweetalert2/sweet-alert.init.js') }}"></script>

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
