@extends('layouts.frontLayout.front-design')
@section('content')

<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">
                            @if(session()->get('lang') == 'en')
                              Cart
                            @elseif(session()->get('lang') == 'ar')
                             أعربة التسوق
                            @endif
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item">
                                <a href="{{ url(session()->get('lang').'/home') }}">
                                    @if(session()->get('lang') == 'en')
                                        Home
                                    @elseif(session()->get('lang') == 'ar')
                                        بيت
                                    @endif
                                </a>
                            </li>
                            <li class="gi-breadcrumb-item active">
                                @if(session()->get('lang') == 'en')
                                  Cart
                                @elseif(session()->get('lang') == 'ar')
                                 أعربة التسوق
                                @endif
                            </li>
                        </ul>
                        <!-- gi-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<!-- Cart section -->
<section class="gi-cart-section padding-tb-40">
    <h2 class="d-none">
        @if(session()->get('lang') == 'en')
          Cart
        @elseif(session()->get('lang') == 'ar')
         أعربة التسوق
        @endif
    </h2>
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="gi-cart-rightside col-lg-4 col-md-12">
                <div class="gi-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="gi-sidebar-block">
                        <div class="gi-sb-title">
                            <h3 class="gi-sidebar-title">
                                @if(session()->get('lang') == 'en')
                                    Summary
                                @elseif(session()->get('lang') == 'ar')
                                    ملخص
                                @endif
                            </h3>
                        </div>
                        <div class="gi-sb-block-content">
                            <h4 class="gi-ship-title">
                                @if(session()->get('lang') == 'en')
                                    Estimate Shipping
                                @elseif(session()->get('lang') == 'ar')
                                    تقدير الشحن
                                @endif
                            </h4>
                            <div class="gi-cart-form">
                                @if(session()->get('lang') == 'en')
                                    <p>Enter your destination to get a shipping estimate</p>
                                @elseif(session()->get('lang') == 'ar')
                                    <p>أدخل وجهتك للحصول على تقدير الشحن</p>
                                @endif
                                <form action="#" method="post">
                                    <span class="gi-cart-wrap">
                                        <label>Country *</label>
                                        <span class="gi-cart-select-inner">
                                            <select name="gi_cart_country" id="gi-cart-select-country"
                                                class="gi-cart-select">
                                                <option selected="" disabled="">United States</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                                <option value="4">Country 4</option>
                                                <option value="5">Country 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="gi-cart-wrap">
                                        <label>State/Province</label>
                                        <span class="gi-cart-select-inner">
                                            <select name="gi_cart_state" id="gi-cart-select-state"
                                                class="gi-cart-select">
                                                <option selected="" disabled="">Please Select a region, state
                                                </option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                                <option value="4">Region/State 4</option>
                                                <option value="5">Region/State 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="gi-cart-wrap">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                    </span>
                                </form>
                            </div>
                        </div>

                        <div class="gi-sb-block-content">
                            <div class="gi-cart-summary-bottom">
                                <div class="gi-cart-summary">
                                    @if(session()->get('lang') == 'en')
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span id="id" class="text-right total"></span>
                                        </div>
                                        @if($vat->isActive == 1)
                                            <div>
                                                <span class="text-left">VAT ({{$vat->vat}}%)</span>
                                                <span class="text-right vat_amount" id="vat_amount"></span>
                                            </div>
                                        @endif 
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right" id="shipping"></span>
                                        </div>
                                        <div>
                                            <span class="text-left">Coupan Discount</span>
                                            <span class="text-right"><a class="gi-cart-coupan">Apply Coupan</a></span>
                                        </div>
                                        <div class="gi-cart-coupan-content">
                                            <form class="gi-cart-coupan-form" name="gi-cart-coupan-form" method="post"
                                                action="#">
                                                <input class="gi-coupan" type="text" required=""
                                                    placeholder="Enter Your Coupan Code" name="gi-coupan" value="">
                                                <button class="gi-btn-2" type="submit" name="subscribe"
                                                    value="">Apply</button>
                                            </form>
                                        </div>
                                        <div class="gi-cart-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right totalId" id="totalId"></span>
                                        </div>
                                    @elseif(session()->get('lang') == 'ar')
                                        <div>
                                            <span class="text-left">المجموع الفرعي</span>
                                            <span id="idd" class="text-right total"></span>
                                        </div>

                                        @if($vat->isActive == 1)
                                            <div>
                                                <span class="text-left">ضريبة القيمة المضافة ({{$vat->vat}}%)</span>
                                                <span class="text-right vat_amount" id="vat_amount"></span>
                                            </div>
                                        @endif 

                                        <div>
                                            <span class="text-left">رسوم التوصيل</span>
                                            <span class="text-right" id="shipping"></span>
                                        </div>
                                        <div>
                                            <span class="text-left">خصم القسيمة</span>
                                            <span class="text-right"><a class="gi-cart-coupan">تطبيق القسيمة</a></span>
                                        </div>
                                        <div class="gi-cart-coupan-content">
                                            <form class="gi-cart-coupan-form" name="gi-cart-coupan-form" method="post"
                                                action="#">
                                                <input class="gi-coupan" type="text" required=""
                                                    placeholder="Enter Your Coupan Code" name="gi-coupan" value="">
                                                <button class="gi-btn-2" type="submit" name="subscribe"
                                                    value="">يتقدم</button>
                                            </form>
                                        </div>
                                        <div class="gi-cart-summary-total">
                                            <span class="text-left">المبلغ الإجمالي</span>
                                            <span class="text-right totalId" id="totalIdd"></span>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gi-cart-leftside col-lg-8 col-md-12 m-t-991">
                <!-- cart content Start -->
                <div class="gi-cart-content">
                    <div class="gi-cart-inner">
                        <div class="row">
                            <!-- <form action="#"> -->
                                <div class="table-content cart-table-content">
                                    <table>
                                        @php $i =0; $total = 0; $weight = 0;  @endphp
                                        @if(session()->has('session_cart'))
                                            <thead>
                                                <tr>
                                                    <th>
                                                        @if(session()->get('lang') == 'en')
                                                          Product
                                                        @elseif(session()->get('lang') == 'ar')
                                                         منتج
                                                        @endif
                                                    </th>
                                                    <th>
                                                        @if(session()->get('lang') == 'en')
                                                          Price
                                                        @elseif(session()->get('lang') == 'ar')
                                                         سعر
                                                        @endif
                                                    </th>
                                                    <th style="text-align: center;">
                                                        @if(session()->get('lang') == 'en')
                                                          Quantity
                                                        @elseif(session()->get('lang') == 'ar')
                                                         كمية
                                                        @endif
                                                    </th>
                                                    <th>
                                                        @if(session()->get('lang') == 'en')
                                                          Total
                                                        @elseif(session()->get('lang') == 'ar')
                                                         المجموع
                                                        @endif
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            @foreach($productDetails as $product)
                                                @php $i++ @endphp
                                                <tbody>
                                                    <tr>
                                                        <td data-label="Product" class="gi-cart-pro-name">
                                                            <a href="{{ url(session()->get('lang').'/product/'.$product['id'] ) }}">
                                                                <img class="gi-cart-pro-img mr-4"
                                                                    src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product['image'] ) }}" alt="">{{ $product['name'] }}
                                                            </a>
                                                        </td>
                                                        @php
                                                          $sub_total = $product['price'] * $product['quantity'];
                                                          $total = $total + $sub_total;

                                                          $sub_weight = $product['weight'] * $product['quantity'];
                                                          $weight = $weight + $sub_weight;
                                                        @endphp
                                                        <td data-label="Price" class="gi-cart-pro-price">
                                                            <span class="amount">{{ $product['price'] }}</span>
                                                        </td>
                                                        <td data-label="Quantity" class="gi-cart-pro-qty"
                                                            style="text-align: center;">
                                                            <div class="cart-qty-plus-minus">
                                                                <input class="cart-plus-minus" type="text"
                                                                    name="cartqtybutton" value="{{ $product['quantity'] }}">
                                                            </div>
                                                        </td>
                                                        <td data-label="Total" class="gi-cart-pro-subtotal" id="subTotal{{$i}}">{{ $sub_total }}</td>
                                                        <td data-label="Remove" class="gi-cart-pro-remove">
                                                            <button param-id="{{ $product['id'] }}" param-route="deletecartAjax" param-user="frontend" class="deleteCartItems" type="button"><i class="gicon gi-trash-o"></i></button>
                                                            <!-- <a href="#"><i class="gicon gi-trash-o"></i></a> -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach

                                        @else
                                            @if(session()->get('lang') == 'en')
                                                No Records found
                                            @elseif(session()->get('lang') == 'ar')
                                                لا توجد سجلات.
                                            @endif
                                        @endif
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="gi-cart-update-bottom">
                                            <a href="{{ url(session()->get('lang').'/shop/0/0/0') }}">Continue Shopping</a>
                                            <!-- <button class="gi-btn-2">Check Out</button> -->
                                            <button type="button"><a class="gi-btn-2" href="{{ url(session()->get('lang').'/checkout/') }}">
                                              @if(session()->get('lang') == 'en')
                                                Proceed To Checkout
                                              @elseif(session()->get('lang') == 'ar')
                                               أباشرالخروج من الفندق
                                              @endif
                                            </a></button>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
        </div>
    </div>
</section>
<!-- Cart section End -->

<!-- New product section -->
<section class="gi-new-product padding-tb-40">
    <div class="container">
        <div class="row overflow-hidden m-b-minus-24px">
            <div class="gi-new-prod-section col-lg-12">
                <div class="gi-products">
                    <div class="section-title-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        @if(session()->get('lang') == 'en')
                            <h2 class="gi-title">New <span>Arrivals</span></h2>
                            <p>Browse The Collection of Top Products</p>
                        @elseif(session()->get('lang') == 'ar')
                            <h2 class="gi-title"><span> الوافدين  </span>الجدد</h2>
                            <p>تصفح مجموعة أفضل المنتجات</p>
                        @endif 
                    </div>
                    <div class="gi-new-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="300">
                        <div class="new-product-carousel owl-carousel gi-product-slider">
                            @foreach($newArrivalProducts as $product)
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
<!-- New product section End -->

@endsection
