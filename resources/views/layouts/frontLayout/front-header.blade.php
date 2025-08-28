<!-- Loader -->
    <div id="gi-overlay">
        <div class="loader"></div>
    </div>

    <!-- Header start  -->
    <header class="gi-header">
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-itegi-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-lg-block">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript:void(0)"><i class="fi fi-rr-phone-call"></i></a>+92-333-1234567
                                </li>
                                <!-- <li class="list-inline-item">
                                    <a href="javascript:void(0)"><i class="fi fi-brands-whatsapp"></i></a>+91 987 654
                                    3210
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message">
                            @if(session()->get('lang') == 'en')
                                World's Fastest Online Shopping Destination
                            @elseif(session()->get('lang') == 'ar')
                                أسرع وجهة للتسوق عبر الإنترنت في العالم
                            @endif
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top Language Currency -->
                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-right-inner d-flex justify-content-end">
                            <a class="gi-help" href="">
                                @if(session()->get('lang') == 'en')
                                    Help?
                                @elseif(session()->get('lang') == 'ar')
                                    يساعد؟
                                @endif
                            </a>
                            <a class="gi-help" href="">
                                @if(session()->get('lang') == 'en')
                                    Track Order?  
                                @elseif(session()->get('lang') == 'ar')
                                    ترتيب المسار؟  
                                @endif
                            </a>
                            <!-- Language Start -->
                            <div class="header-top-lan-curr header-top-lan dropdown ">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    @if(session()->get('lang') == 'en')
                                        English
                                    @elseif(session()->get('lang') == 'ar')
                                        Arabic
                                    @endif
                                    <i class="fi-rr-angle-small-down" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu">
                                     @if(session()->get('lang') == "en")
                                        <li class="active"><a class="dropdown-item language_class">English</a></li>
                                        <li><a class="dropdown-item language_class">Arabic</a></li>
                                    @elseif(session()->get('lang') == "ar")
                                        <li><a class="dropdown-item language_class">English</a></li>
                                        <li class="active"><a class="dropdown-item language_class">Arabic</a></li>
                                    @endif
                                    
                                </ul>
                                <!-- <select class="header-top-lan-curr header-top-lan dropdown language_class">
                                    @if(session()->get('lang') == "en")
                                        <option value="en" selected>{{ strtoupper("en") }}</option>
                                        <option value="ar">{{ strtoupper("ar") }}</option>
                                    @elseif(session()->get('lang') == "ar")
                                        <option value="en">{{ strtoupper("en") }}</option>
                                        <option value="ar" selected>{{ strtoupper("ar") }}</option>
                                    @endif
                                </select> -->
                            </div>
                            <!-- Language End -->
                            <!-- Currency Start -->
                            <!-- <div class="header-top-lan-curr header-top-curr dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">Dollar
                                    <i class="fi-rr-angle-small-down" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                    <li><a class="dropdown-item" href="#">EUR €</a></li>
                                </ul>
                            </div> -->
                            <!-- Currency End -->
                        </div>
                    </div>
                    <!-- Header Top Language Currency -->
                    <!-- Header Top responsive Action -->
                    <div class="col header-top-res d-lg-none">
                        <div class="gi-header-bottons">
                            <div class="right-icons">
                                <!-- Header User Start -->
                                <a href="{{ url(session()->get('lang').'/login') }}" class="gi-header-btn gi-header-user">
                                    <div class="header-icon"><i class="fi-rr-user"></i></div>
                                </a>
                                <!-- Header User End -->
                                <!-- Header Wishlist Start -->
                                <a href="{{ url(session()->get('lang').'/wishlist') }}" class="gi-header-btn gi-wish-toggle">
                                    <div class="header-icon"><i class="fi-rr-heart"></i></div>
                                    <span class="gi-header-count gi-wishlist-count">3</span>
                                </a>
                                <!-- Header Wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="javascript:void(0)" class="gi-header-btn gi-cart-toggle">
                                    <div class="header-icon"><i class="fi-rr-shopping-bag"></i>
                                        <span class="main-label-note-new"></span>
                                    </div>
                                    <span class="gi-header-count gi-cart-count">3</span>
                                </a>
                                <!-- Header Cart End -->
                                <!-- Header menu Start -->
                                <a href="javascript:void(0)" class="gi-header-btn gi-site-menu-icon d-lg-none">
                                    <i class="fi-rr-menu-burger"></i>
                                </a>
                                <!-- Header menu End -->
                            </div>
                        </div>
                    </div>
                    <!-- Header Top responsive Action -->
                </div>
            </div>
        </div>
        <!-- Header Top  End -->

        <!-- Header Bottom  Start -->
        <div class="gi-header-bottom d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="gi-flex">
                        <!-- Header Logo Start -->
                        <div class="align-self-center gi-header-logo">
                            <div class="header-logo">
                                <a href="{{ url(session()->get('lang').'/home') }}"><img src="{{ asset('images/frontend-images/logo/logo.png') }}" alt="Site Logo"></a>
                            </div>
                        </div>
                        <!-- Header Logo End -->
                        <!-- Header Search Start -->
                        <div class="align-self-center gi-header-search">
                            <div class="header-search">
                                <form class="gi-search-group-form" action="#">
                                    @if(session()->get('lang') == 'en')
                                        <input class="form-control gi-search-bar" placeholder="Search Products..." type="text">
                                    @elseif(session()->get('lang') == 'ar')
                                        <input class="form-control gi-search-bar" placeholder="البحث عن المنتجات..." type="text">
                                    @endif
                                    <button class="search_submit" type="submit"><i class="fi-rr-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Header Search End -->
                        <!-- Header Button Start -->
                        <div class="gi-header-action align-self-center">
                            <div class="gi-header-bottons">
                                <!-- Header User Start -->
                                <div class="gi-acc-drop">
                                    @if(Auth::user())
                                        @if(Auth::user()->hasRole('customer'))
                                            <a href="javascript:void(0)"
                                            class="gi-header-btn gi-header-user dropdown-toggle gi-user-toggle"
                                            title="@if(session()->get('lang') == 'en')
                                                        Account
                                                    @elseif(session()->get('lang') == 'ar')
                                                        حساب
                                                    @endif">
                                                <div class="header-icon">
                                                    <i class="fi-rr-user"></i>
                                                </div>
                                                <div class="gi-btn-desc">
                                                    <span class="gi-btn-title">
                                                        @if(session()->get('lang') == 'en')
                                                            Account
                                                        @elseif(session()->get('lang') == 'ar')
                                                            حساب
                                                        @endif
                                                    </span>
                                                    <span class="gi-btn-stitle">
                                                        {{Auth::user()->name}}
                                                    </span>
                                                </div>
                                            </a>
                                            <ul class="gi-dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ url(session()->get('lang').'/my-account') }}">
                                                    @if(session()->get('lang') == 'en')
                                                        My Account
                                                    @elseif(session()->get('lang') == 'ar')
                                                       حسابي
                                                    @endif
                                                </a></li>
                                                <li><a class="dropdown-item" href="{{ url(session()->get('lang').'/user-logout') }}">
                                                    @if(session()->get('lang') == 'en')
                                                        Logout
                                                    @elseif(session()->get('lang') == 'ar')
                                                         تسجيل خروج
                                                    @endif
                                                </a></li>
                                            </ul>
                                        @endif
                                    @else
                                        <a href="javascript:void(0)"
                                            class="gi-header-btn gi-header-user dropdown-toggle gi-user-toggle"
                                            title="@if(session()->get('lang') == 'en')
                                                        Account
                                                    @elseif(session()->get('lang') == 'ar')
                                                        حساب
                                                    @endif">
                                            <div class="header-icon">
                                                <i class="fi-rr-user"></i>
                                            </div>
                                            <div class="gi-btn-desc">
                                                <span class="gi-btn-title">
                                                    @if(session()->get('lang') == 'en')
                                                        Account
                                                    @elseif(session()->get('lang') == 'ar')
                                                        حساب
                                                    @endif
                                                </span>
                                                <span class="gi-btn-stitle">
                                                    @if(session()->get('lang') == 'en')
                                                        Login
                                                    @elseif(session()->get('lang') == 'ar')
                                                        تسجيل الدخول
                                                    @endif
                                                </span>
                                            </div>
                                        </a>
                                        <ul class="gi-dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url(session()->get('lang').'/register') }}">
                                                @if(session()->get('lang') == 'en')
                                                    Register
                                                @elseif(session()->get('lang') == 'ar')
                                                    يسجل
                                                @endif
                                            </a></li>
                                            <!-- <li><a class="dropdown-item" href="{{ url(session()->get('lang').'/checkout') }}">
                                                @if(session()->get('lang') == 'en')
                                                    Checkout
                                                @elseif(session()->get('lang') == 'ar')
                                                    الدفع
                                                @endif
                                            </a></li> -->
                                            <li><a class="dropdown-item" href="{{ url(session()->get('lang').'/login') }}">
                                                @if(session()->get('lang') == 'en')
                                                    Login
                                                @elseif(session()->get('lang') == 'ar')
                                                    تسجيل الدخول
                                                @endif
                                            </a></li>
                                        </ul>
                                    @endif
                                        
                                </div>
                                <!-- Header User End -->
                                <!-- Header wishlist Start -->
                                <a href="{{ url(session()->get('lang').'/wishlist') }}" class="gi-header-btn gi-wish-toggle" title="Wishlist">
                                    <div class="header-icon">
                                        <i class="fi-rr-heart"></i>
                                    </div>
                                    <div class="gi-btn-desc">
                                        <span class="gi-btn-title">
                                            @if(session()->get('lang') == 'en')
                                                Wishlist
                                            @elseif(session()->get('lang') == 'ar')
                                                قائمة الرغبات
                                            @endif
                                        </span>
                                        <!-- <span class="gi-btn-stitle"><b class="gi-wishlist-count">3</b>-items</span> -->
                                    </div>
                                </a>
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="javascript:void(0)" class="gi-header-btn gi-cart-toggle" title="Cart">
                                    <div class="header-icon">
                                        <i class="fi-rr-shopping-bag"></i>
                                        <span class="main-label-note-new"></span>
                                    </div>
                                    <div class="gi-btn-desc">
                                        <span class="gi-btn-title">
                                            @if(session()->get('lang') == 'en')
                                                Cart
                                            @elseif(session()->get('lang') == 'ar')
                                                عربة التسوق
                                            @endif
                                        </span>
                                        <span class="gi-btn-stitle"><b class="gi-cart-count">{{ $cart_items }}</b>-@if(session()->get('lang') == 'en')
                                                Items
                                            @elseif(session()->get('lang') == 'ar')
                                                أغراض
                                            @endif</span>
                                    </div>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Button End -->

        <!-- Header menu -->
        <div class="gi-header-cat d-none d-lg-block">
            <div class="container position-relative">
                <div class="gi-nav-bar">
                    <!-- Category Toggle -->
                    <div class="gi-category-icon-block">
                        <div class="gi-category-menu">
                            <div class="gi-category-toggle">
                                <i class="fi fi-rr-apps"></i>
                                <span class="text">
                                    @if(session()->get('lang') == 'en')
                                        All Categories
                                    @elseif(session()->get('lang') == 'ar')
                                        جميع الفئات
                                    @endif
                                </span>
                                <i class="fi-rr-angle-small-down d-1199 gi-angle" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="gi-cat-dropdown">
                            <div class="gi-cat-block">
                                <div class="gi-cat-tab">

                                    <div class="gi-tab-list nav flex-column nav-pills me-3" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        @foreach($all_categoriesss as $category)
                                            <button class="nav-link  
                                                    @if(Request::segment(2) == 'shop')
                                                        @if(Request::segment(3) == $category->category_id)
                                                            active
                                                        @endif
                                                    @endif
                                                " 
                                                id="v-pills-home-tab" 
                                                data-bs-toggle="pill"
                                                data-bs-target="#{{ $category->category_id }}" 
                                                get-cat-id="{{ $category->category_id }}"
                                                type="button" 
                                                role="tab"
                                                aria-controls="v-pills-home" 
                                                aria-selected="true">
                                                <img src=" {{ asset('/images/backend_images/category/'.session()->get('lang').'/'.$category->image ) }}" width="20" style="margin-right: 5px;">
                                                {{ $category->name }}
                                                <!-- <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}" >{{ $category->name }}</a> -->
                                            </button>

                                        @endforeach
                                    </div>
                                    <div id="show-sub-category"></div>                                     

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Menu Start -->
                    <div id="gi-main-menu-desk" class="d-none d-lg-block sticky-nav">
                        <div class="nav-desk">
                            <div class="row">
                                <div class="col-md-12 align-self-center">
                                    <div class="gi-main-menu">
                                        <ul>
                                            <li class="dropdown drop-list">
                                                <a href="{{ url(session()->get('lang').'/home') }}" class="dropdown-arrow">
                                                    @if(session()->get('lang') == 'en')
                                                        Home
                                                    @elseif(session()->get('lang') == 'ar')
                                                        بيت
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="dropdown drop-list">
                                                <a href="{{ url(session()->get('lang').'/shop/0/0/0') }}" class="dropdown-arrow">
                                                    @if(session()->get('lang') == 'en')
                                                        Shop
                                                    @elseif(session()->get('lang') == 'ar')
                                                        محل
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="non-drop">
                                                <a href="{{ url(session()->get('lang').'/about-us') }}">
                                                    @if(session()->get('lang') == 'en')
                                                        About
                                                    @elseif(session()->get('lang') == 'ar')
                                                        عن
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="non-drop">
                                                <a href="{{ url(session()->get('lang').'/contact-us') }}">
                                                    @if(session()->get('lang') == 'en')
                                                        Contact
                                                    @elseif(session()->get('lang') == 'ar')
                                                        اتصال
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="non-drop">
                                                <a href="{{ url(session()->get('lang').'/sell-with-us') }}">
                                                    @if(session()->get('lang') == 'en')
                                                        Sell With Us
                                                    @elseif(session()->get('lang') == 'ar')
                                                         بيع معنا
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main Menu End -->

                    <div class="gi-location-block">
                        <div class="gi-location-menu">
                            <div class="gi-location-toggle">
                                <i class="fi fi-rr-marker location"></i>
                                <span class="gi-location-title d-1199 gi-location">Riyadh</span>
                                <i class="fi-rr-angle-small-down d-1199 gi-angle" aria-hidden="true"></i>
                            </div>
                            <div class="gi-location-content">
                                <div class="gi-location-dropdown">
                                    <div class="row gi-location-wrapper">
                                        <ul class="loc-grid">
                                            @foreach($all_cities as $data)
                                                <li class="loc-list">
                                                    <i class="fi fi-rr-map-marker-plus"></i>
                                                    <span class="gi-detail">{{ $data->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Header menu End -->

        <!-- Mobile Menu sidebar Start -->
        <div class="gi-mobile-menu-overlay"></div>
        <div id="gi-mobile-menu" class="gi-mobile-menu">
            <div class="gi-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="gi-close-menu">×</button>
            </div>
            <div class="gi-menu-inner">
                <div class="gi-menu-content">
                    <ul>
                        <li class="dropdown drop-list">
                            <a href="{{ url(session()->get('lang').'/home') }}" class="dropdown-arrow">
                                @if(session()->get('lang') == 'en')
                                    Home
                                @elseif(session()->get('lang') == 'ar')
                                    بيت
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ url(session()->get('lang').'/shop/0/0/0') }}" class="dropdown-arrow">
                                @if(session()->get('lang') == 'en')
                                    Shop
                                @elseif(session()->get('lang') == 'ar')
                                    محل
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ url(session()->get('lang').'/about-us') }}">
                                @if(session()->get('lang') == 'en')
                                    About
                                @elseif(session()->get('lang') == 'ar')
                                    عن
                                @endif
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url(session()->get('lang').'/contact-us') }}">
                                @if(session()->get('lang') == 'en')
                                    Contact
                                @elseif(session()->get('lang') == 'ar')
                                    اتصال
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a href="#"><i class="gicon gi-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="gicon gi-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="gicon gi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="gicon gi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- Mobile Menu sidebar End -->
    </header>
    <!-- Header End  -->

    <!-- Cart sidebar Start -->
    <div class="gi-side-cart-overlay"></div>
    <div id="gi-side-cart" class="gi-side-cart">
        <div class="gi-cart-inner">
            <div class="gi-cart-top">
                <div class="gi-cart-title">
                    <span class="cart_title">
                        @if(session()->get('lang') == 'en')
                            My Cart
                        @elseif(session()->get('lang') == 'ar')
                            عربتي
                        @endif
                    </span>
                    <a href="javascript:void(0)" class="gi-cart-close">
                        <i class="fi-rr-cross-small"></i>
                    </a>
                </div>
                <ul class="gi-cart-pro-items">
                    @php $i =0; $total = 0; $weight = 0;  @endphp
                    @if(session()->has('session_cart'))
                        @foreach($cart_productDetails as $product)
                            @php $i++ @endphp
                            @php
                              $sub_total = $product['price'] * $product['quantity'];
                              $total = $total + $sub_total;

                              $sub_weight = $product['weight'] * $product['quantity'];
                              $weight = $weight + $sub_weight;
                            @endphp
                            <span style="display: none;" class="tot" id="subTotal{{$i}}">{{ $sub_total }}</span>
                            <li>
                                <a href="{{ url(session()->get('lang').'/product/'.$product['id'].'/'.str_replace(' ', '-', strtolower($product['name'])) ) }}" class="gi-pro-img">
                                    <img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product['image'] ) }}" alt="product">
                                </a>
                                <div class="gi-pro-content">
                                    <a href="{{ url(session()->get('lang').'/product/'.$product['id'].'/'.str_replace(' ', '-', strtolower($product['name'])) ) }}" class="cart-pro-title">{{ $product['name'] }}</a>
                                    <span class="cart-price"><span>{{ $product['price'] }}</span> x {{ $product['quantity'] }}</span>
                                    <!-- <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="gi-qtybtn" value="{{ $product['quantity'] }}">
                                    </div> -->
                                    <!-- <button param-id="{{ $product['id'] }}" param-route="deletecartAjax" param-user="frontend" class="deleteCartItems" type="button"><i class="gicon gi-trash-o"></i></button> -->
                                    <!-- <a href="javascript:void(0)" class="remove">×</a> -->
                                </div>
                            </li>
                        @endforeach
                    @else
                        @if(session()->get('lang') == 'en')
                            No Records found
                        @elseif(session()->get('lang') == 'ar')
                            لا توجد سجلات.
                        @endif
                    @endif
                </ul>
            </div>
            <div class="gi-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <tr>
                                <td class="text-left">
                                    @if(session()->get('lang') == 'en')
                                        Sub-Total
                                    @elseif(session()->get('lang') == 'ar')
                                        المجموع الفرعي
                                    @endif
                                 :</td>
                                <td id="id" class="text-right total"></td>
                            </tr>

                            @if($vat->isActive == 1)
                                <input type="hidden" id="vat_value" value="{{$vat->vat}}">
                                <tr>
                                    <td class="text-left">
                                        @if(session()->get('lang') == 'en')
                                            VAT
                                        @elseif(session()->get('lang') == 'ar')
                                            ضريبة القيمة المضافة
                                        @endif 
                                    ({{$vat->vat}}%) :</td>
                                    <td class="text-right vat_amount" id="vat_amount"></td>
                                </tr>
                            @else
                                <input type="hidden" id="vat_value" value="0">
                            @endif 
                                
                            <tr>
                                <td class="text-left">
                                    @if(session()->get('lang') == 'en')
                                        Total
                                    @elseif(session()->get('lang') == 'ar')
                                        المجموع
                                    @endif 
                                :</td>
                                <td class="text-right primary-color totalId" id="totalId"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="{{ url(session()->get('lang').'/cart') }}" class="gi-btn-1">
                        @if(session()->get('lang') == 'en')
                            View Cart
                        @elseif(session()->get('lang') == 'ar')
                            عرض العربة
                        @endif
                    </a>
                    <a href="{{ url(session()->get('lang').'/checkout') }}" class="gi-btn-2">
                        @if(session()->get('lang') == 'en')
                            Checkout
                        @elseif(session()->get('lang') == 'ar')
                            الدفع
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart sidebar End 