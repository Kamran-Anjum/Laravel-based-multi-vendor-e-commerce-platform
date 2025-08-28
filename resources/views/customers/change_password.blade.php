@extends('layouts.frontLayout.front-design')
@section('content')

<style>
.passtrengthMeter .showPassword {
  position: absolute;
  width: 20px;
  top: calc(50% - 10px);
  right: 10px;
  top: 6px;
}
</style>

<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">
                            @if(session()->get('lang') == 'en')
                                Change Password
                            @elseif(session()->get('lang') == 'ar')
                                تغيير كلمة المرور
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
                                    Change Password
                                @elseif(session()->get('lang') == 'ar')
                                    تغيير كلمة المرور
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
                                                <h2 class="gi-title">Change Password<span></span></h2>
                                                <p>Please set your password unique.</p>
                                            @elseif(session()->get('lang') == 'ar')
                                                <h2 class="gi-title">تغيير كلمة المرور<span></span></h2>
                                                <p>الرجاء تعيين كلمة المرور الخاصة بك فريدة من نوعها.</p>
                                            @endif
                                        </div>
                                        <div class="gi-login-content">
                                            <div class="gi-login-box">
                                                <div class="gi-login-wrapper">
                                                    <div class="gi-login-container">
                                                        <div class="gi-login-form">
                                                            <form method="post" action="{{ url(session()->get('lang').'/change-password') }}" id="customer_password_validate" name="customer_password_validate"> {{ csrf_field() }}
                                                                @if(session()->get('lang') == 'en')
                                                                    <span class="gi-login-wrap">
                                                                        <label>Current Password*</label>
                                                                        <input type="password" name="currentPassword" id="currentPassword" placeholder="Current Password" required>
                                                                    </span>                
                                                                    <span class="gi-login-wrap">
                                                                        <label>New Password*</label>
                                                                        <input type="password" name="newPassword" id="newPassword" placeholder="Enter your password" required>
                                                                    </span>                                    
                                                                    <span class="gi-login-wrap">
                                                                        <label>Confirm Password*</label>
                                                                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="ReEnter your password" class="mb-24" required>
                                                                    </span>
                                                                    <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                                                        <button class="gi-btn-1 btn" type="submit">Change Password</button>
                                                                    </span>
                                                                @elseif(session()->get('lang') == 'ar')
                                                                    <span class="gi-login-wrap">
                                                                        <label>كلمة السر الحالية*</label>
                                                                        <input type="password" name="currentPassword" id="currentPassword" placeholder="كلمة السر الحالية" required>
                                                                    </span>                
                                                                    <span class="gi-login-wrap">
                                                                        <label>كلمة المرور الجديدة*</label>
                                                                        <input type="password" name="newPassword" id="newPassword" placeholder="أدخل كلمة المرور الجديدة" required>
                                                                    </span>                                    
                                                                    <span class="gi-login-wrap">
                                                                        <label>تأكيد كلمة المرور*</label>
                                                                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="أعد إدخال كلمة المرور" class="mb-24" required>
                                                                    </span>
                                                                    <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                                                        <button class="gi-btn-1 btn" type="submit">تغيير كلمة المرور</button>
                                                                    </span>
                                                                @endif
                                                                    
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gi-login-box d-n-991">
                                                <div class="gi-login-img">
                                                    <img src="{{ asset('images/frontend-images/common/login.png') }}" alt="login">
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
