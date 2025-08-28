@extends('layouts.frontLayout.front-design')
@section('content')

<!-- Hero Slider Start -->
    <section class="section gi-hero m-tb-10">
        <div class="container">
            <div class="gi-main-content">
                <!-- Hero Slider Start -->
                <div class="gi-slider-content">
                    <div class="gi-main-slider">
                        <div class="gi-slider swiper-container main-slider-nav main-slider-dot">
                            <!-- Main slider  -->
                            <div class="swiper-wrapper">
                                @foreach($sliders as $slider)
                                    <div class="gi-slide-item swiper-slide d-flex " style="background: url(' {{ asset('/images/backend_images/slider/'.$slider->image ) }} '); background-position: center;">
                                        <div class="gi-slide-content slider-animation">
                                            <!-- <p>Starting at $ <b>20.00</b></p> -->
                                            @if(session()->get('lang') == 'en')
                                                <h1 class="gi-slide-title text-white">{{ $slider->en_title }}</h1>
                                            @elseif(session()->get('lang') == 'ar')
                                                <h1 class="gi-slide-title text-white">{{ $slider->ar_title }}</h1>
                                            @endif 
                                            <div class="gi-slide-btn">
                                                <a href="{{ url(session()->get('lang').'/shop/0/0/0' ) }}" class="gi-btn-1">Shop Now <i
                                                        class="fi-rr-angle-double-small-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination swiper-pagination-white"></div>
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Category section -->
    <section class="gi-category body-bg padding-tb-40 wow fadeInUp" data-wow-duration="2s">
        <div class="container">
            <div class="row m-b-minus-15px">
                <div class="col-xl-12 border-content-color">
                    <div class="gi-category-block owl-carousel">
                        @foreach($all_categoriesss as $category)
                            <div class="gi-cat-box gi-cat-box-2">
                                <div class="gi-cat-icon" style="height: 150px;">
                                    @if($category->promotion_id > 0)
                                        @foreach($all_promo as $promo)
                                            @if($category->promotion_id == $promo->id)
                                            <span class="gi-lbl">{{ $promo->amount }}%</span>
                                            @endif
                                        @endforeach
                                    @endif
                                    <!-- <i class="fi fi-tr-peach"></i> -->
                                    <img src=" {{ asset('/images/backend_images/category/'.session()->get('lang').'/'.$category->image ) }}" width="50">
                                    <div class="gi-cat-detail">
                                        <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}">
                                            <h4 class="gi-cat-title">{{strtoupper($category->name)}}</h4>
                                        </a>
                                        <!-- <p class="items">{{ $category->product_count }} Items</p> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category section End -->

    <!--  Day Of The Deal Start -->
    <section class="gi-deal-section padding-tb-40 wow fadeInUp" data-wow-duration="2s">
        <div class="container">
            <div class="row overflow-hidden m-b-minus-24px">
                <div class="gi-deal-section col-lg-12">
                    <div class="gi-products">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                            <div class="section-detail">
                                @if(session()->get('lang') == 'en')
                                    <h2 class="gi-title">Day of the <span>deal</span></h2>
                                    <p>Don't wait. The time will never be just right.</p>
                                @elseif(session()->get('lang') == 'ar')
                                    <h2 class="gi-title"><span>يوم </span> الصفقة</h2>
                                    <p>لا تنتظر. لا أحد يستطيع أن يؤذيني دون إذن مني.</p>
                                @endif  
                            </div>
                            <div id="dealend" class="dealend-timer"></div>
                        </div>
                        <div class="gi-deal-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000"
                            data-aos-delay="300">
                            <div class="deal-slick-carousel gi-product-slider">
                                @foreach($isHotDealProducts as $product)
                                    <div class="gi-product-content">
                                        <div class="gi-product-inner">
                                            <div class="gi-pro-image-outer">
                                                <div class="gi-pro-image">
                                                    <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}" class="image">
                                                        <span class="label veg">
                                                            <span class="dot"></span>
                                                        </span>
                                                        <img class="main-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                            alt="Product">
                                                        <img class="hover-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                            alt="Product">
                                                    </a>
                                                    @if($product->saleprice != null && $product->promotion_id == 0)
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
                                                    @elseif($product->promotion_id > 0)
                                                        @foreach($all_promo as $promo)
                                                            @if($product->promotion_id == $promo->id)
                                                            <span class="flags">
                                                                <span class="sale">{{ $promo->amount }}% OFF</span>
                                                            </span>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <div class="gi-pro-actions">
                                                        <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                                class="fi-rr-heart"></i></a>
                                                        <a href="#" class="gi-btn-group quickview"
                                                            data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                                class="fi-rr-eye"></i></a>
                                                        <a href="javascript:void(0)" class="gi-btn-group compare"
                                                            title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>

                                                        <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart">
                                                            <button id="{{$product->product_id}}" class="addtocartBtn" role="button">
                                                                <i class="fi-rr-shopping-basket"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gi-pro-content">
                                                <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">
                                                    <h6 class="gi-pro-stitle">{{ $product->brand_name }}</h6>
                                                </a>
                                                <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">{{ $product->name }}</a></h5>
                                                <div class="gi-pro-rat-price">
                                                    <span class="gi-pro-rating">
                                                        @if($product->productrating == '0')
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        @elseif($product->productrating <= '1')
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        @elseif($product->productrating <= '2')
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        @elseif($product->productrating <= '3')
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        @elseif($product->productrating <= '4')
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        @elseif($product->productrating >= '5')
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                        @endif
                                                            
                                                    </span>
                                                    @if($product->saleprice != null && $product->promotion_id == 0)
                                                        <span class="gi-price">
                                                            <span class="new-price">{{ $product->price_unit}} {{ $product->saleprice }}</span>
                                                            <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                        </span>
                                                    @elseif($product->promotion_id > 0)
                                                        @foreach($all_promo as $promo)
                                                            @if($product->promotion_id == $promo->id)
                                                                @php
                                                                    $p_amount =  $promo->amount;
                                                                    $pp = $product->price/100*$p_amount;
                                                                    $promo_price = $product->price - $pp;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <span class="gi-price">
                                                            <span class="new-price">{{ $product->price_unit}} {{ $promo_price }}</span>
                                                            <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                        </span>
                                                    @else
                                                        <span class="gi-price">
                                                            <span class="new-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Day Of The Deal Start End -->

    @if(!empty($homebanner_full))
        <!-- Banner section -->
        <section class="gi-banner padding-tb-40 wow fadeInUp" data-wow-duration="2s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gi-animated-banner" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200" style="background: url(' {{ asset('/images/backend_images/home_banner/'.$homebanner_full->image ) }} '); background-position: center;">
                            <!-- <h2 class="d-none">Offers</h2> -->
                            <div class="gi-bnr-detail">
                                <div class="gi-bnr-info">
                                    <h2 class="text-white">
                                        @if(session()->get('lang') == 'en')
                                            {{ $homebanner_full->en_title }}
                                        @elseif(session()->get('lang') == 'ar')
                                            {{ $homebanner_full->ar_title }}
                                        @endif 
                                    </h2>
                                    <!-- <h3>30% off sale <span>Hurry up!!!</span></h3> -->
                                    <a href="{{ url(session()->get('lang').'/shop/0/0/0' ) }}" class="gi-btn-2">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner section End -->
    @endif

    <!-- New Product tab Area Start -->
    <section class="gi-product-tab gi-products padding-tb-40 wow fadeInUp" data-wow-duration="2s">
        <div class="container">
            <div class="gi-tab-title">
                <div class="gi-main-title">
                    <div class="section-title">
                        <div class="section-detail">
                            @if(session()->get('lang') == 'en')
                                <h2 class="gi-title">New <span>Arrivals</span></h2>
                                <p>Shop online for new arrivals and get free shipping!</p>
                            @elseif(session()->get('lang') == 'ar')
                                <h2 class="gi-title"><span> الوافدين  </span>الجدد</h2>
                                <p>تسوق عبر الإنترنت للوافدين الجدد واحصل على شحن مجاني!</p>
                            @endif  
                        </div>
                    </div>
                </div>
                <!-- Tab Start -->
                <!-- <div class="gi-pro-tab">
                    <ul class="gi-pro-tab-nav nav">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#all">All</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#snack">Snack & Spices</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#fruit">Fruits</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#veg">Vegetables</a></li>
                    </ul>
                </div> -->
                <!-- Tab End -->
            </div>
            <!-- New Product -->
            <div class="row m-b-minus-24px">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active product-block" id="all">
                            <div class="row">
                                @foreach($newArrivalProducts as $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                alt="Product">
                                                            <img class="hover-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                alt="Product">
                                                        </a>
                                                        @if($product->saleprice != null && $product->promotion_id == 0)
                                                            <span class="flags">
                                                                <span class="sale">Sale</span>
                                                            </span>
                                                        @elseif($product->promotion_id > 0)
                                                            @foreach($all_promo as $promo)
                                                                @if($product->promotion_id == $promo->id)
                                                                <span class="flags">
                                                                    <span class="sale">{{ $promo->amount }}% OFF</span>
                                                                </span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                            
                                                        <div class="gi-pro-actions">
                                                            <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                                    class="fi-rr-heart"></i></a>
                                                            <a href="#" class="gi-btn-group quickview"
                                                                data-link-action="quickview" title="Quick view"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#gi_quickview_modal"><i
                                                                    class="fi-rr-eye"></i></a>
                                                            <a href="javascript:void(0)" class="gi-btn-group compare"
                                                                title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                            <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart">
                                                                <button id="{{$product->product_id}}" class="addtocartBtn" role="button">
                                                                    <i class="fi-rr-shopping-basket"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gi-pro-content">
                                                    <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">
                                                        <h6 class="gi-pro-stitle">{{ $product->brand_name }}</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">{{ $product->name }}</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            @if($product->productrating == '0')
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($product->productrating <= '1')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($product->productrating <= '2')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($product->productrating <= '3')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($product->productrating <= '4')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($product->productrating >= '5')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                            @endif
                                                                
                                                        </span>
                                                        @if($product->saleprice != null && $product->promotion_id == 0)
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $product->saleprice }}</span>
                                                                <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @elseif($product->promotion_id > 0)
                                                            @foreach($all_promo as $promo)
                                                                @if($product->promotion_id == $promo->id)
                                                                    @php
                                                                        $p_amount =  $promo->amount;
                                                                        $pp = $product->price/100*$p_amount;
                                                                        $promo_price = $product->price - $pp;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $promo_price }}</span>
                                                                <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @else
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- 1st Product tab end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product tab Area End -->

    @if(!empty($homebanner_sidebyside))
        <!-- Offer Banner Section Start -->
        <section class="gi-offer-section padding-tb-40">
            <div class="container">
                <!--  Offer banners -->
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s">
                        <div class="gi-ofr-banners">
                            <div class="gi-bnr-body">
                                <div class="gi-bnr-img">
                                    <!-- <span class="lbl">70% Off</span> -->
                                    <img src="{{ asset('images/backend_images/home_banner/'.$homebanner_sidebyside->image) }}" alt="banner">
                                </div>
                                <div class="gi-bnr-detail">
                                    <h5 class="">
                                        @if(session()->get('lang') == 'en')
                                            {{ $homebanner_sidebyside->en_title }}
                                        @elseif(session()->get('lang') == 'ar')
                                            {{ $homebanner_sidebyside->ar_title }}
                                        @endif 
                                    </h5>
                                    <a href="{{ url(session()->get('lang').'/shop/0/0/0' ) }}" class="gi-btn-2">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight" data-wow-duration="2s">
                        <div class="gi-ofr-banners m-t-767">
                            <div class="gi-bnr-body">
                                <div class="gi-bnr-img">
                                    <!-- <span class="lbl">50% Off</span> -->
                                    <img src="{{ asset('images/backend_images/home_banner/'.$homebanner_sidebyside->image_2) }}" alt="banner">
                                </div>
                                <div class="gi-bnr-detail">
                                    <h5 class="">
                                        @if(session()->get('lang') == 'en')
                                            {{ $homebanner_sidebyside->en_title_2 }}
                                        @elseif(session()->get('lang') == 'ar')
                                            {{ $homebanner_sidebyside->ar_title_2 }}
                                        @endif 
                                    </h5>
                                    <a href="{{ url(session()->get('lang').'/shop/0/0/0' ) }}" class="gi-btn-2">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Offer section end -->
    @endif

    @if(!empty($we_serve_provides))
    <!-- Service Section -->
    <section class="gi-service-section padding-tb-40">
        <div class="container">
            <div class="row m-tb-minus-12 justify-content-center">
                @foreach($we_serve_provides as $card)
                <div class="gi-ser-content gi-ser-content-1 col-sm-6 col-md-6 col-lg-3 p-tp-12 wow fadeInUp">
                    <div class="gi-ser-inner">
                        @if(!empty($card->image))
                            <div class="gi-service-image">
                                <img src="{{ asset('images/backend_images/we_serve_provide/'.$card->image) }}" alt="card" width="100">
                            </div>
                        @endif
                        <div class="gi-service-desc">
                            @if(session()->get('lang') == 'en') 
                                <h3>{{ $card->en_title }}</h3>
                                <p>{{ $card->en_title_2 }}</p>
                            @elseif(session()->get('lang') == 'ar') 
                                <h3>{{ $card->ar_title }}</h3>
                                <p>{{ $card->ar_title_2 }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    @endif

    <!-- Trending, Top Rated Start -->
    <section class="gi-offer-section padding-tb-40">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Banner -->
                @if(!empty($homebanner_bottomleft))
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-6 gi-all-product-content gi-new-product-content wow fadeInUp">
                        <div class="gi-banner-inner">
                            <div class="gi-banner-block gi-banner-block-1" style="background: url(' {{ asset('/images/backend_images/home_banner/'.$homebanner_bottomleft->image ) }} '); background-position: center;">
                                <div class="banner-block">
                                    <div class="banner-content">
                                        <div class="banner-text">
                                            <span class="gi-banner-title text-white">
                                                @if(session()->get('lang') == 'en')
                                                    {{ $homebanner_bottomleft->en_title }}
                                                @elseif(session()->get('lang') == 'ar')
                                                    {{ $homebanner_bottomleft->ar_title }}
                                                @endif 
                                            </span>
                                        </div>
                                        <a href="{{ url(session()->get('lang').'/shop/0/0/0' ) }}" class="gi-btn-2">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Trending -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-6 gi-all-product-content gi-new-product-content mt-767-40 wow fadeInUp"
                    data-wow-delay=".4s">
                    <div class="col-md-12">
                        <div class="section-title">
                            <div class="section-detail">
                                <h2 class="gi-title">Trending <span>Items</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="gi-trending-slider">
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/10_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html"
                                            title="Healthy Nutmix, 200g Pack">Healthy Nutmix, 200g Pack</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                                <span class="qty">- 5 kg</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/11_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Organic fresh
                                            tomato</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$25.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 250 g</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/19_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Coffee with chocolate
                                            cream mix pack</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Coffee</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$62.00</span>
                                                <span class="old-price">$65.00</span>
                                                <span class="qty">- 1 kg</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/25_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Fresh Lichi</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Fruits</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$10.00</span>
                                                <span class="old-price">$11.00</span>
                                                <span class="qty">- 500 g</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/5_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Berry & Graps Mix
                                            Snack</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$52.00</span>
                                                <span class="old-price">$55.00</span>
                                                <span class="qty">- 1 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/29_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Pineapple</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Fruits</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$20.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 12 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Rated -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-6 gi-all-product-content gi-new-product-content mt-1199-40 wow fadeInUp"
                    data-wow-delay=".6s">
                    <div class="col-md-12">
                        <div class="section-title">
                            <div class="section-detail">
                                <h2 class="gi-title">Top <span>Rated</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="gi-rated-slider">
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/17_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Ginger - Organic</a>
                                    </h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$62.00</span>
                                                <span class="old-price">$65.00</span>
                                                <span class="qty">- 1 kg</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/2_2.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Dates Value Pouch Dates
                                            Value Pouch</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$56.00</span>
                                                <span class="old-price">$78.00</span>
                                                <span class="qty">- 3 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/23_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Blue berry</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Fruits</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$25.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 250 g</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/13_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Onion - Hybrid</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$20.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 12 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/12_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Potato</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$55.00</span>
                                                <span class="qty">- 2 pack</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/28_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mango - Kesar</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Fruits</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$52.00</span>
                                                <span class="old-price">$55.00</span>
                                                <span class="qty">- 1 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Selling -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-6 gi-all-product-content gi-new-product-content mt-1199-40 wow fadeInUp"
                    data-wow-delay=".8s">
                    <div class="col-md-12">
                        <div class="section-title">
                            <div class="section-detail">
                                <h2 class="gi-title">Top <span>Selling</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="gi-trending-slider">
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/18_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Lemon - Seedless</a>
                                    </h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$42.00</span>
                                                <span class="old-price">$45.00</span>
                                                <span class="qty">- 5 kg</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/28_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mango - Kesar</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Fruits</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$62.00</span>
                                                <span class="old-price">$65.00</span>
                                                <span class="qty">- 1 kg</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/7_2.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mixed Nuts & Almonds
                                            Dry Fruits</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$10.00</span>
                                                <span class="old-price">$11.00</span>
                                                <span class="qty">- 500 g</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/3_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Californian Almonds
                                            Value Pack</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$25.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 250 g</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/13_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Onion - Hybrid</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">vegetables</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$20.00</span>
                                                <span class="old-price">$30.00</span>
                                                <span class="qty">- 12 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 gi-all-product-block">
                            <div class="gi-all-product-inner">
                                <div class="gi-pro-image-outer">
                                    <div class="gi-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{ asset('images/frontend-images/product-images/5_1.jpg') }}"
                                                alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <div class="gi-pro-content">
                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Berry & Graps Mix
                                            Snack</a></h5>
                                    <h6 class="gi-pro-stitle"><a href="shop-left-sidebar-col-3.html">Driedfruit</a></h6>
                                    <div class="gi-pro-rat-price">
                                        <div class="gi-pro-rat-pri-inner">
                                            <span class="gi-price">
                                                <span class="new-price">$52.00</span>
                                                <span class="old-price">$55.00</span>
                                                <span class="qty">- 1 pcs</span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add-to-cart" title="Add To Cart">
                                        <i class="fi-rr-shopping-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending, Top Rated End -->

    <!-- Blog Section Start -->
    <section class="gi-blog-section padding-tb-40 wow fadeInUp">
        <div class="container">
            <div class="row m-b-minus-24px">
                <div class="section-title">
                    <div class="section-detail">
                        <h2 class="gi-title">Latest <span>Blog</span></h2>
                        <p>We tackle interesting topics every day in 2023.</p>
                    </div>
                    <span class="title-link">
                        <a href="blog-left-sidebar.html">All Blogs<i class="fi-rr-angle-double-small-right"></i></a>
                    </span>
                </div>
                <div class="gi-blog-carousel owl-carousel">
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/1.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>June 30,2022 - <a href="#">Organic</a></label>
                                <h3><a href="#">Marketing Guide: 5 Steps to Success to way.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/2.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>April 02,2022 - <a href="#">Fruits</a></label>
                                <h3><a href="#">Best way to solve business deal issue in market.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/3.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>Mar 09,2022 - <a href="#">Vegetables</a></label>
                                <h3><a href="#">31 grocery customer service stats know in 2019.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/4.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>January 25,2022 - <a href="#">Fastfood</a></label>
                                <h3><a href="#">Business ideas to grow your business traffic.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/5.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>December 10,2021 - <a href="#">Fruits</a></label>
                                <h3><a href="#">Marketing Guide: 5 Steps way to Success.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-blog-item">
                        <div class="blog-info">
                            <figure class="blog-img"><a href="#"><img src="{{ asset('images/frontend-images/blog/6.jpg') }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>August 08,2021 - <a href="#">Vegetables</a></label>
                                <h3><a href="#">15 customer service stats idea know in 2023.</a></h3>
                                <div class="more-info">
                                    <a href="blog-detail-left-sidebar.html">Read More<i
                                            class="fi-rr-angle-double-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection