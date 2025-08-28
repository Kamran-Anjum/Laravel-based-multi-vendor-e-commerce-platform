<!DOCTYPE html>
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
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <meta name="_token" content="{{csrf_token()}}" />

    <style type="text/css">
        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
          background-color: #c452a3;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          /*opacity: 0.8;*/
          position: fixed;
          bottom: 23px;
          right: 28px;
          width: auto;
          z-index: 10;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
          display: none;
          position: fixed;
          bottom: 1px;
          right: 10px;
          border: 3px solid #edd5e6;
          border-radius: 10px, 10px, 10px, 10px;
          z-index: 10;
          width: 350px;
        }

        /* Add styles to the form container */
        .form-container {
          width: 350px;
          padding: 10px;
          background-color: white;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
          background-color: #c452a3;
          color: white;
          /*padding: 16px 20px;*/
          border: none;
          cursor: pointer;
          margin-left: -15px;
          width: 40px;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
          background-color: #c452a3;
          color: white;
          padding: 5px 10px;
          border: none;
          cursor: pointer;
          float: right;
          /*width: 100%;*/
          /*margin-bottom:10px;*/
        }

        .chat {
            border: 0.5px gray;
            border-radius: 5px;
            /*width: auto;*/
            padding: 0.5em;
        }

        .chat-left {
            background-color: #edd5e6;
            align-self: flex-start;
            max-width: 80%;
            /*float: left;*/
            text-overflow: inherit;
        }

        .chat-right {
            background-color: #e37bc5;
            align-self: flex-end;
            max-width: 80%;
            /*float: right;*/
            text-overflow: inherit;
            margin-right: 3px;

        }
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 300px;
            overflow-y: auto;
        }
    </style>

</head>

<body style="width: 100%;">

    <!-- <button class="open-button" id="open_chats" onclick="openForm()">Talk To Support Team</button> -->

    <a href="{{ url(session()->get('lang').'/support-chat') }}" class="open-button">Talk To Support Team</a>

    <!-- <div class="chat-popup form-container" id="myForm">
      <div>
        <button type="button" class="cancel" onclick="closeForm()">X</button>
        <h4 style="color: #c452a3">Talk To Support Team</h4>
        <hr>
        <div class="chat-container">
            <p class="chat chat-left">
                Hello! How may I help you?
            </p>
            <div id="view_chats">
            </div>
        </div>
        <hr>
        <div class="row form-group">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <input type="hidden" name="front_user" id="front_user" value="{{ Session::get('Support_User') }}">
                <input type="hidden" name="admin" id="admin" value="1">
                <input type="text" name="message" placeholder="Message..." autocomplete="false" class="form-control" style="height: 35px;" id="message">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <button type="submit" id="msg_Send"  class="btn form-control"><span class="fa fa-paper-plane-o"></span></button>
            </div>
        </div>
    </div> -->
        <!-- <div id="app">
            <support-chat-component 
                :front_user = "{{ Session::get('Support_User') }}"
                :admin = "1"
            > 
            </support-chat-component>
        </div> -->
    <!-- </div> -->
    
    @include('layouts.frontLayout.front_header')
    @yield('content')
    @yield('scripts')
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
