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
                              Forgot Password
                            @elseif(session()->get('lang') == 'ar')
                             هل نسيت كلمة السر
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
                                  Forgot Password
                                @elseif(session()->get('lang') == 'ar')
                                 هل نسيت كلمة السر
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

<!-- Forgot section -->
<section class="gi-login padding-tb-40">
    <div class="container">
        <div class="section-title-2">
            @if(session()->get('lang') == 'en')
                <h2 class="gi-title">Forgot Password<span></span></h2>
                <p>Enter your email & set new password.</p>
            @elseif(session()->get('lang') == 'ar')
                <h2 class="gi-title">هل نسيت كلمة السر<span></span></h2>
                <p>أدخل بريدك الإلكتروني وقم بتعيين كلمة المرور الجديدة.</p>
            @endif
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
                            @if(!empty($check_email))
                                <form method="post" id="loginForm" name="loginForm" action="{{ url(session()->get('lang').'/forgot-password/updated') }}"> 
                                    {{ csrf_field() }}
                                    @if(session()->get('lang') == 'en')
                                        <span class="gi-login-wrap">
                                            <label>Email*</label>
                                            <input type="hidden" name="user_id" value="{{ $check_email->id }}">
                                            <input type="email" name="email" id="email" placeholder="Email" disabled="" inputmode="email" value="{{ $check_email->email }}" required>
                                        </span>                
                                        <span class="gi-login-wrap">
                                            <label>New Password*</label>
                                            <input type="password" name="password" id="loginPassword" placeholder="Enter your password" required>
                                        </span>                                    
                                        <span class="gi-login-wrap">
                                            <label>Confirm Password*</label>
                                            <input type="password" name="Cpassword" id="loginPassword" placeholder="ReEnter your password" class="mb-24" required>
                                        </span>
                                        <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                            <button class="gi-btn-1 btn" type="submit">Set New Password</button>
                                        </span>
                                    @elseif(session()->get('lang') == 'ar')
                                        <span class="gi-login-wrap">
                                            <label>بريد إلكتروني*</label>
                                            <input type="hidden" name="user_id" value="{{ $check_email->id }}">
                                            <input type="email" name="email" id="email" placeholder="بريد إلكتروني" disabled="" inputmode="email" value="{{ $check_email->email }}" required>
                                        </span>                
                                        <span class="gi-login-wrap">
                                            <label>كلمة المرور الجديدة*</label>
                                            <input type="password" name="password" id="loginPassword" placeholder="أدخل كلمة المرور الجديدة" required>
                                        </span>                                    
                                        <span class="gi-login-wrap">
                                            <label>تأكيد كلمة المرور*</label>
                                            <input type="password" name="Cpassword" id="loginPassword" placeholder="أعد إدخال كلمة المرور" class="mb-24" required>
                                        </span>
                                        <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                            <button class="gi-btn-1 btn" type="submit">تعيين كلمة مرور جديدة</button>
                                        </span>
                                    @endif 
                                </form>
                            @else
                                <form id="loginForm" name="loginForm" action="{{ url(Session::get('lang').'/forgot-password') }}" method="post" style="margin-top: 30px;"> 
                                {{ csrf_field() }}
                                    @if(session()->get('lang') == 'en')
                                        <span class="gi-login-wrap">
                                            <label>Email *</label>
                                            <input type="email" name="email" placeholder="Enter your email" required>
                                        </span>
                                        <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                            <button class="gi-btn-1 btn" type="submit">Submit</button>
                                        </span>
                                    @elseif(session()->get('lang') == 'ar')
                                        <span class="gi-login-wrap">
                                            <label>بريد الالكتروني*</label>
                                            <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                                        </span>
                                        <span class="gi-login-wrap gi-login-btn gi-reset-btn mt-0">
                                            <button class="gi-btn-1 btn" type="submit">إرسال</button>
                                        </span>
                                    @endif
                                </form>
                            @endif
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
<!-- Forgot section End -->

@endsection


