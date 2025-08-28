<?php //$url = url()->current();
// $activecategory = parse_url($url);
// if(isset($activecategory['path'])){
// $activeclass = explode('/', $activecategory['path']);
// }
?>
<div id="top" style="padding-top: 0px;background-color: rgb(196,82,163); width: 100%;">
  <div class="container top-bar mt-3" style="margin-top:0px !important;">
    <div class="d-flex mb-3" style="margin-bottom:0px !important;">
      <style>
        @media screen and (max-width: 600px) {
          .follow-label{
            display: none !important;
          }
        }
      </style>
      <div class="p-1" style="width: 50%; font-size: .7757142857rem;opacity: 0.8; letter-spacing: -.3px; line-height: 1.2142857143rem;">
        <span class="follow-label text-light">
          @if(session()->get('lang') == 'en')
            Follow Us
          @elseif(session()->get('lang') == 'ar')
            تابعنا
          @endif
        </span>
        <a href="#" style="color:#ffffff; padding:0 3px;"><span>Twitter</span><span style="border-right: 1px solid #fff;display: inline-block;margin: 0px 0px 0px 0.7em;width: 1px;  height: 10px;"></span></a>
        <a href="#" style="color:#ffffff; padding:0 3px;"><span>Facebook</span><span style="border-right: 1px solid #fff;display: inline-block;margin: 0px 0px 0px 0.7em;width: 1px;  height: 10px;"></span></a>
        <a href="#" style="color:#ffffff; padding:0 3px;"><span>Instagram</span></a>
      </div>
      <div class="p-1 ml-auto" style="font-size: .7857142857rem;letter-spacing: -.3px; opacity:0.8">
        <a class="btn btn-link lilac-top-btn" role="button" style="font-size:.8571428571rem; background-color: rgba(191,68,158,0);color: #ffffff;padding: 0 .4285714286rem; border-radius: 0;height: auto;position: relative; text-decoration: none;" href="{{ url(session()->get('lang').'/sell-with-us') }}">
          <span>
            @if(session()->get('lang') == 'en')
              Sell with us
            @elseif(session()->get('lang') == 'ar')
              تبيع معنا
            @endif
          </span>
          <span style="border-right: 1px solid #fff;display: inline-block;margin: 0px 0px 0px 0.7em;width: 1px;  height: 10px;"></span>
        </a>

        <select class="form-select language_class">
          @if(session()->get('lang') == "en")
            <option value="en" selected>{{ strtoupper("en") }}</option>
            <option value="ar">{{ strtoupper("ar") }}</option>
          @elseif(session()->get('lang') == "ar")
            <option value="en">{{ strtoupper("en") }}</option>
            <option value="ar" selected>{{ strtoupper("ar") }}</option>
          @endif
        </select>
      </div>
    </div>
  </div>
</div>

<div style="padding-top: 5px; padding-bottom: 5px; width: 100%;">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-1 col-xl-1 col-md-12" style="width: 100%; padding:0px;">
        <a href=" {{ url('/') }}">
          <img class="d-block d-sm-block" style="width:80px;filter: blur(0px); margin:auto;" src=" {{ asset('images/frontend_images/lilac2express-logo.png') }}" width="100%"> 
        </a>
      </div>
      <div class="col-4 col-lg-8 col-xl-8 col-md-12 " style="padding:15px 0px 0px 0px">
        <nav class="navbar navbar-expand-md " style="background:#fff;margin: auto; display: block; width: 100%;">
          <style>
            .affix {
              position: fixed;
              top: 0;
              right: 0;
              left: 0;
              z-index: 1030;
              border-bottom: 3px solid #f7941d;
              opacity: 0.9;
            }
          </style>
          <div class="container-fluid">
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon" style="padding-top:5px !important;">
                <i style="color:rgb(196,82,163);" class="fa fa-navicon"></i>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
              <ul class="nav nav-tabs navbar-nav mr-auto" style="border-bottom:none !important; margin:auto;">

                <style>
                  .nav-tabs .nav-item .nav-link{
                    margin-bottom: -2px;
                    color: #000 ;
                    font-weight: normal;
                    font-size: 0.8rem;
                    padding: 0.4rem 1.2rem;
                  }

                  .nav-item a:hover{
                    cursor: pointer;  
                  }
                  .nav-tabs {
                      border-bottom: none;
                  }
                  .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                    border-radius: 0;
                    border: none;
                    color: rgb(196,82,163) !important;
                    font-weight: 500;
                  }

                  .nav-tabs .nav-item .active{
                    background: #c452a3;
                    color: white;
                  }

                  .dropdown-menu a {
                    color: #000000cf;
                    padding: 3px;
                    text-decoration: none;
                    display: block;
                    font-size: smaller;
                  }
                  .dropdown-menu a:hover {
                    color: #c452a3;
                    font-weight: 600 !important;
                    background-color: transparent;
                  }
                  .dropdown:hover .dropdown-menu {display: block;}
                  .mega-dropdown {
                    position: static !important;
                  }
                  .av{
                    background: yellow;
                  }
                  .mega-dropdown-menu {
                    padding: 20px 0px;
                    width: 100%;
                    box-shadow: none;
                    -webkit-box-shadow: none;
                  }
                  .dropdown-menu {
                    display: none;
                    position: absolute;
                    background-color: #ffffffba;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    border:2px solid #bf449e;
                    border-radius: 0px;
                  }
                  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
                    color: white !important;
                    background-color: #c452a3;
                    border-radius: 0;
                    border-top: none;
                    border-bottom: none;
                    border-left: 3px solid white;
                    border-right: 3px solid white;
                  }

                  .top-login-cart{
                    text-align: right;
                    padding: 13px 0px 0px 0px;
                  }

                  @media (max-width: 1200px)
                  {
                    .nav-tabs .nav-item .nav-link {
                      padding: 0.4rem 0.6rem;
                    }
                  }

                  @media (max-width: 990px)
                  {
                    .top-login-cart{
                      text-align: center;
                    }
                  }
                </style>
              
                @foreach($categoriesss as $category)
                  <li class="nav-item">
                    <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}" class="nav-link 
                      @if(Request::segment(2) == 'shop')
                        @if(Request::segment(3) == $category->category_id)
                          active
                        @endif
                      @endif
                      ">{{strtoupper($category->name)}}</a>              
                  </li>
                @endforeach
                <li class="nav-item dropdown">
                  <a href="" class="nav-link dropbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button" style="background-color: rgba(0,123,255,0); border: none;border-radius: 0px; font-size:0.9rem;">
                    @if(session()->get('lang') == 'en')
                      {{strtoupper('Show all')}}
                    @elseif(session()->get('lang') == 'ar')
                     عرض الكل
                    @endif
                  </a>
                  <div class="dropdown-menu" role="menu">
                      @foreach($all_categoriesss as $category)
                      <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}" class="dropdown-item 
                        @if(Request::segment(2) == 'shop')
                          @if(Request::segment(3) == $category->category_id)
                            active
                          @endif
                        @endif
                        ">{{strtoupper($category->name)}}</a>
                  @endforeach
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="col-8 col-lg-3 col-xl-3 col-md-12 top-login-cart">
        <div class="dropdown">
            @if(Auth::user())
              @if(Auth::user()->hasRole('customer'))
                <button class="btn btn-primary dropbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button" style="background-color: rgba(0,123,255,0);color: rgb(196, 82, 163);border: none;border-radius: 0px; font-size:0.9rem;"><i class="icon ion-person"></i>&nbsp;{{Auth::user()->name}}&nbsp;</button>

                <div class="dropdown-menu" role="menu">

                 <a href="{{ url(session()->get('lang').'/user-logout') }}" class="dropdown-item" role="presentation" href="#"><i style="color:#bf449e;" class="fa fa-sign-out"></i>
                  @if(session()->get('lang') == 'en')
                    Logout
                    @elseif(session()->get('lang') == 'ar')
                   تسجيل خروج
                  @endif
                </a>
                <a class="dropdown-item" role="presentation" href="{{ url(session()->get('lang').'/my-account') }}"><i style="color:#bf449e;" class="fa fa-home"></i> 
                  @if(session()->get('lang') == 'en')
                    My Account
                  @elseif(session()->get('lang') == 'ar')
                   حسابي
                  @endif
                </a>
              @else
                <a href="{{ url(session()->get('lang').'/register') }}" role="presentation"><i style="color:#c452a3;" class="fa fa-user"></i> 
                  @if(session()->get('lang') == 'en')
                    Register
                  @elseif(session()->get('lang') == 'ar')
                   أيسجل
                  @endif
                </a>                
                <a href="{{ url(session()->get('lang').'/login') }}" role="presentation"><i style="color:#c452a3;" class="fa fa-sign-in"></i> 
                  @if(session()->get('lang') == 'en')
                    Login
                  @elseif(session()->get('lang') == 'ar')
                   تسجيل الدخول
                  @endif
                </a>
              @endif
            @else
              <a href="{{ url(session()->get('lang').'/register') }}" role="presentation"><i style="color:#c452a3;" class="fa fa-user"></i> 
                @if(session()->get('lang') == 'en')
                  Register
                @elseif(session()->get('lang') == 'ar')
                 أيسجل
                @endif
              </a>
              <a href="{{ url(session()->get('lang').'/login') }}" role="presentation"><i style="color:#c452a3;" class="fa fa-sign-in"></i> 
                @if(session()->get('lang') == 'en')
                  Login
                @elseif(session()->get('lang') == 'ar')
                 تسجيل الدخول
                @endif
              </a>
            @endif
          </div>
          <a href="{{ url(session()->get('lang').'/cart') }}"><button id="cart_icon_btn" class="btn btn-primary lilac-top-btn badge1" data-badge="{{ $cart_items }}" style="margin: 4px 2px;background-color: rgba(191,68,158,0);" type="button"><i class="fa fa-shopping-basket" style="color: #c452a3;"></i></button></a>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-body">
            <p>Product added to cart successfully!</p>
        </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal cityyModal" id="cityyModal" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="margin: auto; width:800px;">
      <div class="modal-body" style="padding:4px; border: 4px solid #c452a3;">
        <div class="row m-0">
          <div class="col-12 col-md-6 col-lg-6" style="background-repeat: no-repeat; background-image:url({{ asset('/images/frontend_images/Banner-popup.jpeg') }});">
          </div>
          <div class="col-12 col-md-6 col-lg-6" style="padding:0px;">
            <div style="padding: 0px; display:block; margin:auto; text-align:center;">
              <img style="width:150px;" src="{{ asset('/images/frontend_images/lilac2express-logo100x100.png' ) }}">
            </div>
            <div class="modal-header" style="padding:0.5rem; background:white; border-radius:0px;">
                <h4 class="modal-title" style="font-size:1rem; color:#b84691;">SHIP TO</h4>
            </div>
            <!-- <form action="#" class="form-horizontal"> -->
              <div class="form-row" style="margin: 0px;background: #c452a3;padding: 5% 15%;">
                <div class="form-group col-md-12">
                  <select style="color: #c452a3; background-color: white;" class="form-control form-control-sm select-country-option frontend_country_class" id="country_id" name="cake_country">
                    <option value="0" readonly>All Countries</option>
                    {!! $countriesss_dropdown !!}
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <select style="color: #c452a3; background-color: white;" class="form-control form-control-sm select-city-option" id="city_id" name="cake_city">
                    <option value="0" readonly>All Cities</option>
                    {!! $citiesss_dropdown !!}
                  </select>
                </div>
              </div>
              <div style="padding:0.5rem; background:white; border-radius:0px; text-align:center;">
                <button disabled type="button" id="country_city_session_id" class="btn btn-sm country_city_session_class" style="width:123px; background-color:#c452a3; color:#ffffff; border-radius:0;">Select</button>
              </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/frontend_js/jquery.min.js') }}"></script>
<script>
$(window).on('scroll', function (event) {
    var scrollValue = $(window).scrollTop();
    if (scrollValue > 150) {
        $('.navbar').addClass('affix');
    } else{
        $('.navbar').removeClass('affix');
    }
});
</script>
