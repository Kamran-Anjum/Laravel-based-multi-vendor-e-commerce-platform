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
                              Login
                            @elseif(session()->get('lang') == 'ar')
                             ضتسجيل الدخول
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
                                  Login
                                @elseif(session()->get('lang') == 'ar')
                                 ضتسجيل الدخول
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

<!-- Login section -->
<section class="gi-login padding-tb-40">
    <div class="container">
        <div class="section-title-2">
            <h2 class="gi-title">
                @if(session()->get('lang') == 'en')
                  Login
                @elseif(session()->get('lang') == 'ar')
                 ضتسجيل الدخول
                @endif
                <span></span>
            </h2>
            <p>
                @if(session()->get('lang') == 'en')
                    Get access to your Orders, Wishlist and Recommendations.
                @elseif(session()->get('lang') == 'ar')
                    احصل على إمكانية الوصول إلى طلباتك وقائمة الرغبات والتوصيات.
                @endif
            </p>
        </div>
        <div class="gi-login-content">
            <div class="gi-login-box">
                <div class="gi-login-wrapper">
                    <div class="gi-login-container">
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif
                        @if(Session::has('flash_message_error'))
                          <div class="alert alert-danger alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{!! session('flash_message_error') !!}</strong>
                          </div>
                        @endif
                        <div class="gi-login-form">
                            <form id="loginForm" name="loginForm" action="{{ url(Session::get('lang').'/login') }}" method="post"> {{ csrf_field() }}
                                @if(session()->get('lang') == 'en')
                                    <span class="gi-login-wrap">
                                        <label>Email Address*</label>
                                        <input type="text" name="email" id="email" placeholder="Enter your email..." required>
                                    </span>
                                    <span class="gi-login-wrap">
                                        <label>Password*</label>
                                        <input type="password" name="password" id="loginPassword" placeholder="Enter your password"
                                            required>
                                    </span>
                                @elseif(session()->get('lang') == 'ar')
                                    <span class="gi-login-wrap">
                                        <label>عنوان البريد الإلكتروني*</label>
                                        <input type="text" name="email" id="email" placeholder="أدخل بريدك الإلكتروني..." required>
                                    </span>
                                    <span class="gi-login-wrap">
                                        <label>كلمة المرور*</label>
                                        <input type="password" name="password" id="loginPassword" placeholder="ادخل رقمك السري"
                                            required>
                                    </span>
                                @endif
                                    
                                <span class="gi-login-wrap gi-login-fp">
                                    <label>
                                        <a href="{{ url(Session::get('lang').'/forgot-password') }}" style="color: rgb(98,36,86);">
                                            @if(session()->get('lang') == 'en')
                                                Forgot Password?
                                            @elseif(session()->get('lang') == 'ar')
                                                هل نسيت كلمة السر؟
                                            @endif
                                        </a>
                                    </label>
                                </span>
                                <span class="gi-login-wrap gi-login-btn">
                                    <span>
                                        <a href="{{ url(Session::get('lang').'/register') }}" class="">
                                            @if(session()->get('lang') == 'en')
                                                Create Account?
                                            @elseif(session()->get('lang') == 'ar')
                                                إنشاء حساب؟
                                            @endif
                                        </a>
                                    </span>
                                    <button class="gi-btn-1 btn" type="submit">
                                        @if(session()->get('lang') == 'en')
                                                Login
                                        @elseif(session()->get('lang') == 'ar')
                                        ضتسجيل الدخول
                                        @endif
                                    </button>
                                </span>
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
<!-- Login section End -->

@endsection


