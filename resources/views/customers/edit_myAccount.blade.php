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
                                Edit Profile
                            @elseif(session()->get('lang') == 'ar')
                                تعديل الملف الشخصي
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
                                    Edit Profile
                                @elseif(session()->get('lang') == 'ar')
                                    تعديل الملف الشخصي
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

<!-- Vendor profile section start -->
<section class="gi-vendor-profile padding-tb-40">
    <div class="container">
        <div class="row mb-minus-24px">
            <div class="col-lg-3 col-md-12 mb-24">
                <div class="gi-sidebar-wrap gi-border-box gi-sticky-sidebar">
                    <div class="gi-vendor-block-items">
                        <ul>
                            @if(session()->get('lang') == 'en')
                                <li><a href="{{ url(session()->get('lang').'/my-account') }}">User Profile</a></li>
                                <li><a href="{{ url(session()->get('lang').'/my-orders')}}">Orders</a></li>
                                <li><a href="track-order.html">Track Order</a></li>
                                <li><a href="user-invoice.html">Invoice</a></li>
                                <li><a href="{{ url(session()->get('lang').'/edit-profile') }}">Edit Profile</a></li>
                                <li><a href="{{ url(session()->get('lang').'/change-password') }}">Change Password</a></li>
                                <li><a href="{{ url(session()->get('lang').'/user-logout') }}">Logout</a></li>
                            @elseif(session()->get('lang') == 'ar')
                                <li><a href="{{ url(session()->get('lang').'/my-account') }}">ملف تعريفي للمستخدم</a></li>
                                <li><a href="{{ url(session()->get('lang').'/my-orders')}}">طلبات</a></li>
                                <li><a href="track-order.html">Track Order</a></li>
                                <li><a href="user-invoice.html">Invoice</a></li>
                                <li><a href="{{ url(session()->get('lang').'/edit-profile') }}">تعديل الملف الشخصي</a></li>
                                <li><a href="{{ url(session()->get('lang').'/change-password') }}">تغيير كلمة المرور</a></li>
                                <li><a href="{{ url(session()->get('lang').'/user-logout') }}">تسجيل خروج</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 mb-24">
                <div class="gi-vendor-profile-card gi-vendor-profile-card">
                    <div class="gi-vendor-card-body">
                        <div class="row mb-minus-24px">
                            <div class="col-md-12 col-sm-12 mb-24">
                                <!-- Reset section -->
                                <section class="gi-login padding-tb-40">
                                    <div class="container">
                                        <div class="section-title-2">
                                            @if(session()->get('lang') == 'en')
                                                <h2 class="gi-title">Edit Profile<span></span></h2>
                                            @elseif(session()->get('lang') == 'ar')
                                                <h2 class="gi-title">تعديل الملف الشخصي<span></span></h2>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="gi-register-wrapper">
                                                <div class="gi-register-container">
                                                    <div class="gi-register-form">
                                                        <form enctype="multipart/form-data" class="form-horizontal"  method="post" action="{{ url(session()->get('lang').'/edit-profile') }}" name="edit_MyAccount" id="edit_MyAccount"> {{ csrf_field() }}

                                                            <span class="gi-register-wrap gi-register-half">
                                                                <label>Image</label>
                                                                <input type="hidden" name="current_image" value="{{ $customer->image }}">
                                                                <input name="image" id="image" type="file">
                                                            </span>

                                                            <input type="hidden" name="country" value="{{$customer->country_id}}">
                                                            <input type="hidden" name="state" value="{{$customer->state_id}}">
                                                            <input type="hidden" name="city" value="{{$customer->city_id}}">

                                                            @if(session()->get('lang') == 'en')
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>First Name</label>
                                                                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" required value="{{ $customer->first_name }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>Last Name</label>
                                                                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" required value="{{ $customer->last_name }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" name="phonenumber" placeholder="Enter your phone number" required value="{{ $customer->cell }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" placeholder="Enter your email add..." required value="{{ Auth::user()->email }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>Country</label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="country" id="country_id" class="gi-register-select frontend_customer_country_class">
                                                                            @foreach($country as $countries)
                                                                                @if($countries->id == $customer->countryId)
                                                                                    <option selected value="{{$countries->id}}">{{$countries->name}}</option>
                                                                                @else
                                                                                    <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>Region/State</label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="state" id="customer_state_id" class="gi-register-select frontend_customer_state_class">
                                                                            <option selected value="0">Select State</option>
                                                                            @foreach($customerState as $state)
                                                                                @if($state->id == $customer->state_id)
                                                                                    <option selected value="{{$state->id}}">{{$state->name}}</option>
                                                                                @else
                                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>City</label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="city" id="customer_city_id" class="gi-register-select">
                                                                            <option selected value="0">Select City</option>
                                                                            @foreach($customerCity as $city)
                                                                                @if($city->id == $customer->cityId)
                                                                                    <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                                                @else
                                                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap">
                                                                    <label>Address</label>
                                                                    <input type="text" name="address" placeholder="Billing Address" value="{{ $customer->Address1 }}">
                                                                </span>
                                                                <!-- <span class="gi-register-wrap">
                                                                    <label>Billing Address</label>
                                                                    <input type="text" name="bAddress" placeholder="Billing Address" value="{{ $customer->billToAddress }}">
                                                                </span>
                                                                <span class="gi-register-wrap">
                                                                    <label>Shipping Address</label>
                                                                    <input type="text" name="sAddress" placeholder="Shipping Address" value="{{ $customer->shipToAddress }}">
                                                                </span> -->

                                                                <span class="gi-register-wrap gi-register-btn">
                                                                    <button class="gi-btn-1" type="submit">Update</button>
                                                                </span>
                                                            @elseif(session()->get('lang') == 'ar')
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>الاسم الأول</label>
                                                                    <input type="text" name="fname" id="fname" placeholder="أدخل اسمك الأول" required value="{{ $customer->first_name }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>اسم العائلة</label>
                                                                    <input type="text" name="lname" id="lname" placeholder="أدخل اسمك الأخير" required value="{{ $customer->last_name }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>رقم التليفون</label>
                                                                    <input type="text" name="phonenumber" placeholder="أدخل رقم هاتفك" required value="{{ $customer->cell }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>بريد إلكتروني</label>
                                                                    <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني إضافة" required value="{{ Auth::user()->email }}">
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>دولة</label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="country" id="country_id" class="gi-register-select frontend_customer_country_class">
                                                                            @foreach($country as $countries)
                                                                                @if($countries->id == $customer->countryId)
                                                                                    <option selected value="{{$countries->id}}">{{$countries->name}}</option>
                                                                                @else
                                                                                    <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>المنطقة/الولاية</label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="state" id="customer_state_id" class="gi-register-select frontend_customer_state_class">
                                                                            <option selected value="0">اختر ولايه</option>
                                                                            @foreach($customerState as $state)
                                                                                @if($state->id == $customer->state_id)
                                                                                    <option selected value="{{$state->id}}">{{$state->name}}</option>
                                                                                @else
                                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap gi-register-half">
                                                                    <label>مدينة </label>
                                                                    <span class="gi-rg-select-inner">
                                                                        <select name="city" id="customer_city_id" class="gi-register-select">
                                                                            <option selected value="0">اختر مدينة</option>
                                                                            @foreach($customerCity as $city)
                                                                                @if($city->id == $customer->cityId)
                                                                                    <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                                                @else
                                                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="gi-register-wrap">
                                                                    <label>عنوان</label>
                                                                    <input type="text" name="address" placeholder="عنوان" value="{{ $customer->Address1 }}">
                                                                </span>
                                                                <!-- <span class="gi-register-wrap">
                                                                    <label>عنوان وصول الفواتير</label>
                                                                    <input type="text" name="bAddress" placeholder="عنوان وصول الفواتير" value="{{ $customer->billToAddress }}">
                                                                </span>
                                                                <span class="gi-register-wrap">
                                                                    <label>عنوان الشحن</label>
                                                                    <input type="text" name="sAddress" placeholder="عنوان الشحن" value="{{ $customer->shipToAddress }}">
                                                                </span> -->

                                                                <span class="gi-register-wrap gi-register-btn">
                                                                    <button class="gi-btn-1" type="submit">تحديث</button>
                                                                </span>
                                                            @endif
                                                                
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Reset section End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Vendor profile section end -->

                                

@endsection
