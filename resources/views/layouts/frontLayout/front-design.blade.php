<!DOCTYPE html>
<html lang="">
    <head>
        <?php $cur_path = Request::path(); ?>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <!-- site Favicon -->
        <link rel="icon" href="{{ asset('images/frontend-images/favicon/favicon.png') }}" sizes="32x32">
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/lilac2express-logo.png') }}"> -->
        <title>Lilac2xpress</title>

        @if(Request::path() == 'en/home' || Request::path() == 'ar/home' && !empty($home_meta_tags))
            <meta name="keywords" content="{{ $home_meta_tags->keywords }}">
            <meta name="description" content="{!! html_entity_decode($home_meta_tags->description) !!}">
        @endif
        @if(Request::path() == 'en/about-us' || Request::path() == 'ar/about-us' && !empty($about_meta_tags))
            <meta name="keywords" content="{{ $about_meta_tags->keywords }}">
            <meta name="description" content="{!! html_entity_decode($about_meta_tags->description) !!}">
        @endif
        @if(Request::path() == 'en/contact-us' || Request::path() == 'ar/contact-us' && !empty($contact_meta_tags))
            <meta name="keywords" content="{{ $contact_meta_tags->keywords }}">
            <meta name="description" content="{!! html_entity_decode($contact_meta_tags->description) !!}">
        @endif
        @if(Request::path() == 'en/shop/0/0/0' || Request::path() == 'ar/shop/0/0/0' && !empty($shop_meta_tags))
            <meta name="keywords" content="{{ $shop_meta_tags->keywords }}">
            <meta name="description" content="{!! html_entity_decode($shop_meta_tags->description) !!}">
        @endif

        @if(!empty($product_meta_tags))
            @foreach($product_meta_tags as $tags)
                @if($cur_path == 'en/product/'.$tags->table_id.'/'.$tags->url_slug || $cur_path == 'ar/product/'.$tags->table_id.'/'.$tags->url_slug)
                    <meta name="keywords" content="{{ $tags->keywords }}">
                    <meta name="description" content="{!! html_entity_decode($tags->description) !!}">
                @endif
            @endforeach
        @endif

        @if(!empty($category_meta_tags))
            @foreach($category_meta_tags as $tags)
                @if($cur_path == 'en/shop/'.$tags->table_id.'/0/0' || $cur_path == 'ar/shop/'.$tags->table_id.'/0/0')
                    <meta name="keywords" content="{{ $tags->keywords }}">
                    <meta name="description" content="{!! html_entity_decode($tags->description) !!}">
                @endif
            @endforeach
        @endif

        @if(!empty($brand_meta_tags))
            @foreach($brand_meta_tags as $tags)
                @if($cur_path == 'en/shop/0/0'.$tags->table_id || $cur_path == 'ar/shop/0/0'.$tags->table_id)
                    <meta name="keywords" content="{{ $tags->keywords }}">
                    <meta name="description" content="{!! html_entity_decode($tags->description) !!}">
                @endif
            @endforeach
        @endif

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

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/frontend-js/app.js') }}') }}" defer></script> -->

        <meta name="_token" content="{{csrf_token()}}" />

        <style type="text/css">
            /* Button used to open the chat form - fixed at the bottom of the page */
            .open-button {
              background-color: #5caf90;
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

    <body>

        <!-- <button class="open-button" id="open_chats" onclick="openForm()">تحدث إلى فريق الدعم</button> -->

        <a href="{{ url(session()->get('lang').'/support-chat') }}" class="open-button">
            @if(session()->get('lang') == 'en')
                Talk To Support Team
            @elseif(session()->get('lang') == 'ar')
                تحدث إلى فريق الدعم
            @endif
        </a>

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

        
        @include('layouts.frontLayout.front-header')
        @yield('content')
        @yield('scripts')
        @include('layouts.frontLayout.front-footer')

        
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
        <script src="{{ asset('js/frontend-js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/frontend-js/passtrength.js') }}"></script>

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

    <script>
    $(document).ready(function(){
      loadData();
    });
    </script>

    </body>
</html>
