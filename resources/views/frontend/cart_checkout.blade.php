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
                              Checkout
                          @elseif(session()->get('lang') == 'ar')
                              الدفع
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
                                  Checkout
                              @elseif(session()->get('lang') == 'ar')
                                  الدفع
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

<!-- Checkout section -->
<section class="gi-checkout-section padding-tb-40">
    <h2 class="d-none">
      @if(session()->get('lang') == 'en')
          Checkout
      @elseif(session()->get('lang') == 'ar')
          الدفع
      @endif
    </h2>
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="gi-checkout-rightside col-lg-4 col-md-12">
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
                            <div class="gi-checkout-pro">
                              @php $i =0; $total = 0;  $weight = 0; @endphp
                              @foreach($productDetails as $product)
                                @php $i++ @endphp

                                @php
                                  $sub_total = $product['price'] * $product['quantity'];
                                  $total = $total + $sub_total;

                                  $sub_weight = $product['weight'] * $product['quantity'];
                                  $weight = $weight + $sub_weight;

                                @endphp
                                  <div class="col-sm-12 mb-6">
                                      <div class="gi-product-inner">
                                          <div class="gi-pro-image-outer">
                                              <div class="gi-pro-image">
                                                  <a href="{{ url(session()->get('lang').'/product/'.$product['id'] ) }}" class="image">
                                                      <img class="main-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/tiny/'.$product['image'] ) }}"
                                                          alt="Product">
                                                      <img class="hover-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/tiny/'.$product['image'] ) }}"
                                                          alt="Product">
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="gi-pro-content">
                                              <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product['id'] ) }}">{{ $product['name'] }}</a></h5>
                                              <!-- <div class="gi-pro-rating">
                                                  <i class="gicon gi-star fill"></i>
                                                  <i class="gicon gi-star fill"></i>
                                                  <i class="gicon gi-star fill"></i>
                                                  <i class="gicon gi-star fill"></i>
                                                  <i class="gicon gi-star"></i>
                                              </div> -->
                                              <span class="gi-price">
                                                  <!-- <span class="old-price">$95.00</span> -->
                                                  <span class="new-price">{{ $product['price'] }} x {{ $product['quantity'] }}</span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="gi-checkout-summary">
                                @if(session()->get('lang') == 'en')
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span id="id" class="text-right total">{{ $total }}</span>
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
                                        <span class="text-right"><a class="gi-checkout-coupan">Apply Coupan</a></span>
                                    </div>
                                    <div class="gi-checkout-coupan-content">
                                        <form class="gi-checkout-coupan-form" name="gi-checkout-coupan-form"
                                            method="post" action="#">
                                            <input class="gi-coupan" type="text" required=""
                                                placeholder="Enter Your Coupan Code" name="gi-coupan" value="">
                                            <button class="gi-coupan-btn gi-btn-2" type="submit" name="subscribe"
                                                value="">Apply</button>
                                        </form>
                                    </div>
                                    <div class="gi-checkout-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right totalId" id="totalId">{{ $total }}</span>
                                    </div>
                                @elseif(session()->get('lang') == 'ar')
                                    <div>
                                        <span class="text-left">المجموع الفرعي</span>
                                        <span id="idd" class="text-right total">{{ $total }}</span>
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
                                        <span class="text-right"><a class="gi-checkout-coupan">تطبيق القسيمة</a></span>
                                    </div>
                                    <div class="gi-checkout-coupan-content">
                                        <form class="gi-checkout-coupan-form" name="gi-checkout-coupan-form"
                                            method="post" action="#">
                                            <input class="gi-coupan" type="text" required=""
                                                placeholder="أدخل رمز القسيمة الخاص بك" name="gi-coupan" value="">
                                            <button class="gi-coupan-btn gi-btn-2" type="submit" name="subscribe"
                                                value="">يتقدم</button>
                                        </form>
                                    </div>
                                    <div class="gi-checkout-summary-total">
                                        <span class="text-left">المبلغ الإجمالي</span>
                                        <span class="text-right totalId" id="totalId">{{ $total }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>

                <!-- <div class="gi-sidebar-wrap gi-checkout-del-wrap">
                    <div class="gi-sidebar-block">
                        <div class="gi-sb-title">
                            <h3 class="gi-sidebar-title">
                              @if(session()->get('lang') == 'en')
                                  Delivery Method
                              @elseif(session()->get('lang') == 'ar')
                                  طريقة التوصيل
                              @endif
                            </h3>
                        </div>
                        <div class="gi-sb-block-content">
                            <div class="gi-checkout-del">
                                @if(session()->get('lang') == 'en')
                                  <div class="gi-del-desc">Please select the preferred shipping method to use on this order.</div>
                                @elseif(session()->get('lang') == 'ar')
                                  <div class="gi-del-desc">يرجى تحديد طريقة الشحن المفضلة لاستخدامها في هذا الطلب.</div>
                                @endif
                                <form action="#">
                                    <span class="gi-del-option">
                                        <span>
                                            <span class="gi-del-opt-head">Free Shipping</span>
                                            <input type="radio" id="del1" name="radio-group" checked>
                                            <label for="del1">Rate - $0 .00</label>
                                        </span>
                                        <span>
                                            <span class="gi-del-opt-head">Flat Rate</span>
                                            <input type="radio" id="del2" name="radio-group">
                                            <label for="del2">Rate - $5.00</label>
                                        </span>
                                    </span>
                                    <span class="gi-del-commemt">
                                        <span class="gi-del-opt-head">Add Comments About Your Order</span>
                                        <textarea name="your-commemt" placeholder="Comments"></textarea>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="gi-sidebar-wrap gi-checkout-pay-wrap">
                    <!-- Sidebar Payment Block -->
                    <div class="gi-sidebar-block">
                        <div class="gi-sb-title">
                            <h3 class="gi-sidebar-title">
                              @if(session()->get('lang') == 'en')
                                  Payment Method
                              @elseif(session()->get('lang') == 'ar')
                                  طريقة الدفع او السداد
                              @endif
                            </h3>
                        </div>
                        <div class="gi-sb-block-content">
                            <div class="gi-checkout-pay">
                                @if(session()->get('lang') == 'en')
                                  <div class="gi-pay-desc">Please select the preferred payment method to use on this order.</div>
                                @elseif(session()->get('lang') == 'ar')
                                  <div class="gi-pay-desc">يرجى تحديد طريقة الدفع المفضلة لاستخدامها في هذا الطلب.</div>
                                @endif
                                <span class="gi-pay-option">
                                    <span>
                                        <input type="radio" id="pay1" name="payment_method" value="COD" checked>
                                        <label for="pay1">
                                          @if(session()->get('lang') == 'en')
                                              Cash On Delivery
                                          @elseif(session()->get('lang') == 'ar')
                                              الدفع عند الاستلام
                                          @endif
                                        </label>
                                    </span>
                                </span>
                                <span class="gi-pay-commemt">
                                    @if(session()->get('lang') == 'en')
                                      <span class="gi-pay-opt-head">Add Comments About Your Order</span>
                                      <textarea name="your-commemt" placeholder="Comments"></textarea>
                                    @elseif(session()->get('lang') == 'ar')
                                      <span class="gi-pay-opt-head">أضف تعليقات حول طلبك</span>
                                      <textarea name="your-commemt" placeholder="تعليقات"></textarea>
                                    @endif
                                </span>
                                <span class="gi-pay-agree">
                                  <input type="checkbox" value="">
                                  @if(session()->get('lang') == 'en')
                                    <a href="#">I have read and agree to the <span>Terms & Conditions.</span></a>
                                  @elseif(session()->get('lang') == 'ar')
                                    <a href="#">لقد قرات ووافقت على ال <span>البنود و الظروف.</span></a>
                                  @endif
                                  <span class="checked"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Payment Block -->
                </div>
                <div class="gi-sidebar-wrap gi-check-pay-img-wrap">
                    <!-- Sidebar Payment Block -->
                    <div class="gi-sidebar-block">
                        <div class="gi-sb-title">
                            <h3 class="gi-sidebar-title">
                              @if(session()->get('lang') == 'en')
                                  Payment Method
                              @elseif(session()->get('lang') == 'ar')
                                  طريقة الدفع او السداد
                              @endif
                            </h3>
                        </div>
                        <div class="gi-sb-block-content">
                            <div class="gi-check-pay-img-inner">
                                <div class="gi-check-pay-img">
                                    <img src="{{ asset('/images/frontend-images/hero-bg/payment.png' ) }}" alt="payment">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Payment Block -->
                </div>
            </div>
            <div class="gi-checkout-leftside col-lg-8 col-md-12 m-t-991">
                <!-- checkout content Start -->
                <div class="gi-checkout-content">
                    <div class="gi-checkout-inner">

                        <!-- <div class="gi-checkout-wrap m-b-40">
                            <div class="gi-checkout-block gi-check-new">
                                <h3 class="gi-checkout-title">New Customer</h3>
                                <div class="gi-check-block-content">
                                    <div class="gi-check-subtitle">Checkout Options</div>
                                    <form action="#">
                                        <span class="gi-new-option">
                                            <span>
                                                <input type="radio" id="account1" name="radio-group" checked>
                                                <label for="account1">Register Account</label>
                                            </span>
                                            <span>
                                                <input type="radio" id="account2" name="radio-group">
                                                <label for="account2">Guest Account</label>
                                            </span>
                                        </span>
                                    </form>
                                    <div class="gi-new-desc">By creating an account you will be able to shop faster,
                                        be up to date on an order's status, and keep track of the orders you have
                                        previously made.
                                    </div>
                                    <div class="gi-new-btn"><a href="#" class="gi-btn-2">Continue</a></div>

                                </div>
                            </div>
                            <div class="gi-checkout-block gi-check-login">
                                <h3 class="gi-checkout-title">Returning Customer</h3>
                                <div class="gi-check-login-form">
                                    <form action="#" method="post">
                                        <span class="gi-check-login-wrap">
                                            <label>Email Address</label>
                                            <input type="text" name="name" placeholder="Enter your email address"
                                                required>
                                        </span>
                                        <span class="gi-check-login-wrap">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Enter your password"
                                                required>
                                        </span>

                                        <span class="gi-check-login-wrap gi-check-login-btn">
                                            <button class="gi-btn-2" type="submit">Login</button>
                                            <a class="gi-check-login-fp" href="#">Forgot Password?</a>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div> -->

                        @if(session()->get('lang') == 'en')
                            <div class="gi-checkout-wrap m-b-40 padding-bottom-3">
                                <div class="gi-checkout-block gi-check-bill">
                                    <h3 class="gi-checkout-title">Billing Details</h3>
                                    <div class="gi-bl-block-content">
                                        <!-- <div class="gi-check-subtitle">Checkout Options</div>
                                        <span class="gi-bill-option">
                                            <span>
                                                <input type="radio" id="bill1" name="radio-group">
                                                <label for="bill1">I want to use an existing address</label>
                                            </span>
                                            <span>
                                                <input type="radio" id="bill2" name="radio-group" checked>
                                                <label for="bill2">I want to use new address</label>
                                            </span>
                                        </span> -->
                                        <div class="gi-check-bill-form">
                                            <form enctype="multipart/form-data" class="form-horizontal"  id="my-address" method="post" action="{{ url(session()->get('lang').'/checkout/place-order') }}" > {{ csrf_field() }}

                                                @if(Auth::user())
                                                  @if(Auth::user()->hasRole('customer'))
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>First Name*</label>
                                                        <input type="text" name="fname" placeholder="Enter your first name"  value="{{$customer->first_name}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="lname" placeholder="Enter your last name" value="{{$customer->last_name}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Email*</label>
                                                        <input type="email" name="email" placeholder="Enter your email" value="{{$customer->email}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Phone*</label>
                                                        <input type="text" name="cell-no" placeholder="Enter your phone" value="{{$customer->cell}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Country *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="country" id="country_id" class="gi-bill-select frontend_customer_country_class">
                                                                <option value="" selected disabled>Select Country</option>
                                                                @foreach($country as $countries)
                                                                  <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Region/State</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="state" id="customer_state_id" class="gi-bill-select frontend_customer_state_class">
                                                                <option selected disabled>Select Region/State (optional)</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>City *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="city" id="customer_city_id" class="gi-bill-select frontend_customer_city_class">
                                                                <option selected disabled>Select City</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>Area *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="area" id="customer_area_id" class="gi-bill-select">
                                                                <option selected disabled>Select Area</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap">
                                                        <label>Address</label>
                                                        <input type="text" name="address" placeholder="Address Line 1" value="{{$customer->Address1}}" required>
                                                    </span>

                                                    <input type="hidden" name="country" value="{{$customer->country_id}}">
                                                    <input type="hidden" name="state" value="{{$customer->state_id}}">
                                                    <input type="hidden" name="city" value="{{$customer->city_id}}">

                                                  @endif

                                                @else

                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>First Name*</label>
                                                      <input type="text" name="fname" placeholder="Enter your first name" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Last Name*</label>
                                                      <input type="text" name="lname" placeholder="Enter your last name" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Email*</label>
                                                      <input type="email" name="email" placeholder="Enter your email" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Phone*</label>
                                                      <input type="text" name="cell-no" placeholder="Enter your phone" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Country *</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="country" id="country_id" class="gi-bill-select frontend_customer_country_class">
                                                              <option value="" selected disabled>Select Country</option>
                                                              @foreach($country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Region/State</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="state" id="customer_state_id" class="gi-bill-select frontend_customer_state_class">
                                                              <option selected disabled>Select Region/State (optional)</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>City *</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="city" id="customer_city_id" class="gi-bill-select frontend_customer_city_class">
                                                              <option selected disabled>Select City</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>Area*</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="area" id="customer_area_id" class="gi-bill-select">
                                                              <option selected disabled>Select Area</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap">
                                                      <label>Address</label>
                                                      <input type="text" name="address" placeholder="Address Line 1" required>
                                                  </span>

                                                @endif

                                                @php $i =0; $total = 0; $weight = 0; $vat_value = 0; $vat_amount = 0;  @endphp
                                                @foreach($productDetails as $product)
                                                  @php $i++ @endphp

                                                  @php
                                                    $sub_total = $product['price'] * $product['quantity'];
                                                    $total = $total + $sub_total;

                                                    $sub_weight = $product['weight'] * $product['quantity'];
                                                    $weight = $weight + $sub_weight;

                                                  @endphp

                                                  <input type="hidden" name="productid{{$i}}" value="{{ $product['id'] }}">
                                                  <input type="hidden" name="quantity{{$i}}" value="{{ $product['quantity'] }}">
                                                  <input type="hidden" name="price{{$i}}" value="{{ $product['price'] }}">
                                                  <input type="hidden" name="subtotal{{$i}}" value="{{ $sub_total }}">
                                                  <input type="hidden" name="total" value="{{ $total }}">
                                                  <input type="hidden" name="items" value="{{ count(session()->get('session_cart')) }}">
                                                  <input type="hidden" name="unit_weight{{$i}}" value="{{ $product['weight'] }}">
                                                  <input type="hidden" name="pro_total_weight{{$i}}" value="{{ $sub_weight }}">
                                                  <input type="hidden" name="total_weight" id="over_total_weight" value="{{ $weight }}">
                                                @endforeach
                                                  <input type="hidden" name="shippingCost" id="shippingCost" value="">
                                                @php
                                                    $vat_one = $total / 100;
                                                    $vat_amount = $vat_one * $vat->vat;
                                                @endphp
                                                @if($vat->isActive == 1)
                                                  <input type="hidden" name="vat" value="{{ $vat->vat }}">
                                                  <input type="hidden" name="vat_amount" value="{{ $vat_amount }}">
                                                @else
                                                  <input type="hidden" name="vat" value="0">
                                                  <input type="hidden" name="vat_amount" value="0">
                                                @endif 

                                                <span class="gi-check-order-btn">
                                                    <button class="gi-btn-2" type="submit">Place Order</button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(session()->get('lang') == 'ar')
                            <div class="gi-checkout-wrap m-b-40 padding-bottom-3">
                                <div class="gi-checkout-block gi-check-bill">
                                    <h3 class="gi-checkout-title">تفاصيل الفاتورة</h3>
                                    <div class="gi-bl-block-content">
                                        <!-- <div class="gi-check-subtitle">Checkout Options</div>
                                        <span class="gi-bill-option">
                                            <span>
                                                <input type="radio" id="bill1" name="radio-group">
                                                <label for="bill1">I want to use an existing address</label>
                                            </span>
                                            <span>
                                                <input type="radio" id="bill2" name="radio-group" checked>
                                                <label for="bill2">I want to use new address</label>
                                            </span>
                                        </span> -->
                                        <div class="gi-check-bill-form">
                                            <form enctype="multipart/form-data" class="form-horizontal"  id="my-address" method="post" action="{{ url(session()->get('lang').'/checkout/place-order') }}" > {{ csrf_field() }}

                                                @if(Auth::user())
                                                  @if(Auth::user()->hasRole('customer'))
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>الاسم الأول*</label>
                                                        <input type="text" name="fname" placeholder="أدخل اسمك الأول"  value="{{$customer->first_name}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>اسم العائلة*</label>
                                                        <input type="text" name="lname" placeholder="أدخل اسمك الأخير" value="{{$customer->last_name}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>بريد إلكتروني*</label>
                                                        <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" value="{{$customer->email}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>هاتف*</label>
                                                        <input type="text" name="cell-no" placeholder="أدخل رقم هاتفك" value="{{$customer->cell}}" required>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>دولة *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="country" id="country_id" class="gi-bill-select frontend_customer_country_class">
                                                                <option value="" selected disabled>حدد الدولة</option>
                                                                @foreach($country as $countries)
                                                                  <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>المنطقة/الولاية</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="state" id="customer_state_id" class="gi-bill-select frontend_customer_state_class">
                                                                <option selected disabled>حدد المنطقة/الولاية (اختياري)</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>مدينة *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="city" id="customer_city_id" class="gi-bill-select frontend_customer_city_class">
                                                                <option selected disabled>اختر مدينة</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap gi-bill-half">
                                                        <label>منطقة *</label>
                                                        <span class="gi-bl-select-inner">
                                                            <select name="area" id="customer_area_id" class="gi-bill-select">
                                                                <option selected disabled>حدد المنطقة</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="gi-bill-wrap">
                                                        <label>عنوان</label>
                                                        <input type="text" name="address" placeholder="عنوان" value="{{$customer->Address1}}" required>
                                                    </span>

                                                    <input type="hidden" name="country" value="{{$customer->country_id}}">
                                                    <input type="hidden" name="state" value="{{$customer->state_id}}">
                                                    <input type="hidden" name="city" value="{{$customer->city_id}}">

                                                  @endif

                                                @else

                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>الاسم الأول*</label>
                                                      <input type="text" name="fname" placeholder="أدخل اسمك الأول" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>اسم العائلة*</label>
                                                      <input type="text" name="lname" placeholder="أدخل اسمك الأخير" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>بريد إلكتروني*</label>
                                                      <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>هاتف*</label>
                                                      <input type="text" name="cell-no" placeholder="أدخل رقم هاتفك" required>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>دولة *</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="country" id="country_id" class="gi-bill-select frontend_customer_country_class">
                                                              <option value="" selected disabled>حدد الدولة</option>
                                                              @foreach($country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>المنطقة/الولاية</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="state" id="customer_state_id" class="gi-bill-select frontend_customer_state_class">
                                                              <option selected disabled>حدد المنطقة/الولاية (اختياري)</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>مدينة *</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="city" id="customer_city_id" class="gi-bill-select frontend_customer_city_class">
                                                              <option selected disabled>اختر مدينة</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap gi-bill-half">
                                                      <label>منطقة *</label>
                                                      <span class="gi-bl-select-inner">
                                                          <select name="area" id="customer_area_id" class="gi-bill-select">
                                                              <option selected disabled>حدد المنطقة</option>
                                                          </select>
                                                      </span>
                                                  </span>
                                                  <span class="gi-bill-wrap">
                                                      <label>عنوان</label>
                                                      <input type="text" name="address" placeholder="عنوان" required>
                                                  </span>

                                                @endif

                                                @php $i =0; $total = 0; $weight = 0;  @endphp
                                                @foreach($productDetails as $product)
                                                  @php $i++ @endphp

                                                  @php
                                                    $sub_total = $product['price'] * $product['quantity'];
                                                    $total = $total + $sub_total;

                                                    $sub_weight = $product['weight'] * $product['quantity'];
                                                    $weight = $weight + $sub_weight;

                                                  @endphp

                                                  <input type="hidden" name="productid{{$i}}" value="{{ $product['id'] }}">
                                                  <input type="hidden" name="quantity{{$i}}" value="{{ $product['quantity'] }}">
                                                  <input type="hidden" name="price{{$i}}" value="{{ $product['price'] }}">
                                                  <input type="hidden" name="subtotal{{$i}}" value="{{ $sub_total }}">
                                                  <input type="hidden" name="total" value="{{ $total }}">
                                                  <input type="hidden" name="items" value="{{ count(session()->get('session_cart')) }}">
                                                  <input type="hidden" name="unit_weight{{$i}}" value="{{ $product['weight'] }}">
                                                  <input type="hidden" name="pro_total_weight{{$i}}" value="{{ $sub_weight }}">
                                                  <input type="hidden" name="total_weight" id="over_total_weight" value="{{ $weight }}">
                                                @endforeach
                                                  <input type="hidden" name="shippingCost" id="shippingCost" value="">
                                                @php
                                                    $vat_one = $total / 100;
                                                    $vat_amount = $vat_one * $vat->vat;
                                                @endphp
                                                @if($vat->isActive == 1)
                                                  <input type="hidden" name="vat" value="{{ $vat->vat }}">
                                                  <input type="hidden" name="vat_amount" value="{{ $vat_amount }}">
                                                @else
                                                  <input type="hidden" name="vat" value="0">
                                                  <input type="hidden" name="vat_amount" value="0">
                                                @endif 

                                                <span class="gi-check-order-btn">
                                                    <button class="gi-btn-2" type="submit">مكان الامر</button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                            

                    </div>
                </div>
                <!--cart content End -->
            </div>
        </div>
    </div>
</section>
<!-- Checkout section End -->

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
function addProduct()
{
    if ($("#ship").prop("checked")) 
    {   
        $("#form1btn").click();
    }
    if ($("#shipNear").prop("checked")) 
    {   
        $("#form2btn").click();
    } 
}

</script>

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('js/mapInput.js') }}"></script>
@endsection
