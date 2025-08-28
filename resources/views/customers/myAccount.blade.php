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
                                User Profile
                            @elseif(session()->get('lang') == 'ar')
                                ملف تعريفي للمستخدم
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
                                    Profile
                                @elseif(session()->get('lang') == 'ar')
                                    حساب تعريفي
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
                <div class="row">
                    <div class="container">
                        <div class="gi-vendor-cover">
                            <div class="detail">
                                @if($customer->image)
                                    <img src="{{ asset('images/frontend-images/customers/large/'.$customer->image) }}" alt="User">
                                @else
                                    <img src="{{ asset('images/frontend-images/customers/large/no-img.png') }}" alt="User">
                                @endif
                                
                                <div class="v-detail">
                                    <h3 class="text-white">{{ $customer->first_name }} {{ $customer->last_name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gi-vendor-profile-card gi-vendor-profile-card">
                    <div class="gi-vendor-card-body">
                        <!-- <div class="gi-vender-about-block">
                            <h5>About Me</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s, when an unknown printer took a galley.</p>
                        </div> -->
                        <!-- <div class="gi-vender-about-block">
                            <h5>Account Information</h5>
                        </div> -->
                        <div class="row mb-minus-24px">
                            <div class="col-md-12 col-sm-12 mb-24">
                                <div class="gi-vendor-detail-block">
                                    <h6>Account Information</h6>
                                    <ul>
                                        @if(session()->get('lang') == 'en')
                                            <li><strong style="margin-right: 70px;">First Name : </strong>{{ $customer->first_name }}</li>
                                            <li><strong style="margin-right: 70px;">Last Name : </strong>{{ $customer->last_name }}</li>
                                            <li><strong style="margin-right: 98px;">E-mail : </strong>{{ $customer->email }}</li>
                                            <li><strong style="margin-right: 102px;">Phone : </strong>{{ $customer->cell }}</li>
                                            <li><strong style="margin-right: 90px;">Country : </strong>{{ $customer->countryName }}</li>
                                            <li><strong style="margin-right: 110px;">State : </strong>
                                                @if($customer->state_id != '' || $customer->state_id != 0 || $customer->state_id != '0')
                                                    @foreach($customerState as $state)
                                                        @if($state->id == $customer->state_id)
                                                            {{$state->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </li>
                                            <li><strong style="margin-right: 120px;">City : </strong>{{ $customer->cityName }}</li>
                                            <li><strong style="margin-right: 40px;">Address : </strong>{{ $customer->Address1 }}</li>
                                            <!-- <li><strong style="margin-right: 40px;">Billing Address : </strong>{{ $customer->billToAddress }}</li>
                                            <li><strong style="margin-right: 20px;">Shipping Address : </strong>{{ $customer->shipToAddress }}</li> -->
                                        @elseif(session()->get('lang') == 'ar')
                                            <li><strong style="margin-right: 70px;">الاسم الأول : </strong>{{ $customer->first_name }}</li>
                                            <li><strong style="margin-right: 95px;">الكنية : </strong>{{ $customer->last_name }}</li>
                                            <li><strong style="margin-right: 50px;">بريد الالكتروني : </strong>{{ $customer->email }}</li>
                                            <li><strong style="margin-right: 86px;">هاتف : </strong><span style="color: white;">p</span>{{ $customer->cell }}</li>
                                            <li><strong style="margin-right: 100px;">دولة : </strong>{{ $customer->countryName }}</li>
                                            <li><strong style="margin-right: 97px;">ولاية : </strong>
                                                @if($customer->state_id != '' || $customer->state_id != 0 || $customer->state_id != '0')
                                                    @foreach($customerState as $state)
                                                        @if($state->id == $customer->state_id)
                                                            {{$state->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </li>
                                            <li><strong style="margin-right: 95px;">مدينة : </strong>{{ $customer->cityName }}</li>
                                            <li><strong style="margin-right: 16px;">عنوان : </strong>{{ $customer->Address1 }}</li>
                                            <!-- <li><strong style="margin-right: 16px;">عنوان وصول الفواتير : </strong>{{ $customer->billToAddress }}</li>
                                            <li><strong style="margin-right: 56px;">عنوان الشحن : </strong>{{ $customer->shipToAddress }}</li> -->
                                        @endif
                                            
                                    </ul>
                                </div>
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
