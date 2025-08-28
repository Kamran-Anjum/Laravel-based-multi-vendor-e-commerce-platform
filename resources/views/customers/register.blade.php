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
                                Register
                            @elseif(session()->get('lang') == 'ar')
                                يسجل
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
                                    Register
                                @elseif(session()->get('lang') == 'ar')
                                    يسجل
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

<!-- Register section -->
<section class="gi-register padding-tb-40">
    <div class="container">
        <div class="section-title-2">
            @if(session()->get('lang') == 'en')
                <h2 class="gi-title">Register<span></span></h2>
                <p>Best place to buy and sell digital products.</p>
            @elseif(session()->get('lang') == 'ar')
                <h2 class="gi-title">يسجل<span></span></h2>
                <p>أفضل مكان لشراء وبيع المنتجات الرقمية.</p>
            @endif
        </div>
        <div class="row">
            <div class="gi-register-wrapper">
                <div class="gi-register-container">
                    <div class="gi-register-form">
                        <form action="{{ url(session()->get('lang').'/register') }}" method="post">
                            {{ csrf_field() }}

                            @if(session()->get('lang') == 'en')
                                <span class="gi-register-wrap gi-register-half">
                                    <label>First Name*</label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Last Name*</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Phone Number*</label>
                                    <input type="text" name="phonenumber" placeholder="Enter your phone number"
                                        required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Email*</label>
                                    <input type="email" name="email" placeholder="Enter your email add..." required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Password*</label>
                                    <input type="password" name="password1" id="myPassword" placeholder="Password" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Country*</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="country" id="country_id" class="gi-register-select frontend_customer_country_class">
                                            <option selected value='' disabled>Select Country</option>
                                            {!! $countries_dropdown !!}
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>Region/State</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="state" id="customer_state_id" class="gi-register-select frontend_customer_state_class">
                                            <option>Select Region/State (optional)</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>City*</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="city" id="customer_city_id" class="gi-register-select">
                                            <option selected disabled>Select City</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap">
                                    <label>Address*</label>
                                    <input type="text" name="address" placeholder="Address">
                                </span>

                                <span class="gi-register-wrap gi-recaptcha">
                                    <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                        data-callback="verifyRecaptchaCallback"
                                        data-expired-callback="expiredRecaptchaCallback"></span>
                                    <input class="form-control d-none" data-recaptcha="true" required
                                        data-error="Please complete the Captcha">
                                    <span class="help-block with-errors"></span>
                                </span>
                                <span class="gi-register-wrap gi-register-btn">
                                    <span>Already have an account?<a href="{{ url(session()->get('lang').'/login') }}">Login</a></span>
                                    <button class="gi-btn-1" type="submit">Register</button>
                                </span>
                            @elseif(session()->get('lang') == 'ar')
                                <span class="gi-register-wrap gi-register-half">
                                    <label>الاسم الأول*</label>
                                    <input type="text" name="fname" id="fname" placeholder="أدخل اسمك الأول" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>اسم العائلة*</label>
                                    <input type="text" name="lname" id="lname" placeholder="أدخل اسمك الأخير" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>رقم التليفون*</label>
                                    <input type="text" name="phonenumber" placeholder="أدخل رقم هاتفك"
                                        required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>بريد إلكتروني*</label>
                                    <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني إضافة" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>كلمة المرور*</label>
                                    <input type="password" name="password1" id="myPassword" placeholder="كلمة المرور" required>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>دولة*</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="country" id="country_id" class="gi-register-select frontend_customer_country_class">
                                            <option selected value='' disabled>حدد الدولة</option>
                                            {!! $countries_dropdown !!}
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>المنطقة/الولاية</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="state" id="customer_state_id" class="gi-register-select frontend_customer_state_class">
                                            <option>حدد المنطقة/الولاية (اختياري)</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap gi-register-half">
                                    <label>مدينة *</label>
                                    <span class="gi-rg-select-inner">
                                        <select name="city" id="customer_city_id" class="gi-register-select">
                                            <option selected disabled>اختر مدينة</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="gi-register-wrap">
                                    <label>عنوان*</label>
                                    <input type="text" name="address" placeholder="عنوان">
                                </span>

                                <span class="gi-register-wrap gi-recaptcha">
                                    <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                        data-callback="verifyRecaptchaCallback"
                                        data-expired-callback="expiredRecaptchaCallback"></span>
                                    <input class="form-control d-none" data-recaptcha="true" required
                                        data-error="Please complete the Captcha">
                                    <span class="help-block with-errors"></span>
                                </span>
                                <span class="gi-register-wrap gi-register-btn">
                                    <span>هل لديك حساب؟<a href="{{ url(session()->get('lang').'/login') }}">تسجيل الدخول</a></span>
                                    <button class="gi-btn-1" type="submit">يسجل</button>
                                </span>
                            @endif
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sample section End -->

@endsection


