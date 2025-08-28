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
                                About Us
                            @elseif(session()->get('lang') == 'ar')
                                معلومات عنا
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
                                    About Us
                                @elseif(session()->get('lang') == 'ar')
                                    معلومات عنا
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

@if(!empty($abouts))
<!-- About section -->
<section class="gi-about padding-tb-40">
    <div class="container">
        <div class="row">
            @foreach($abouts as $about)
                <div class="col-xl-6 col-md-12">
                    <div class="gi-about-img">
                        <img src="{{ asset('images/backend_images/about/'.$about->image) }}" class="v-img" alt="about">
                        <img src="{{ asset('images/backend_images/about/'.$about->image_2) }}" class="h-img" alt="about">
                        <img src="{{ asset('images/backend_images/about/'.$about->image_3) }}" class="h-img" alt="about">
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="gi-about-detail">
                        <div class="section-title">
                            @if(session()->get('lang') == 'en') 
                                <h3>{{ $about->en_title }}</h3>
                                {!! html_entity_decode($about->en_description) !!}
                            @elseif(session()->get('lang') == 'ar') 
                                <h3>{{ $about->ar_title }}</h3>
                                {!! html_entity_decode($about->ar_description) !!}
                            @endif                        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About section End -->
@endif

@if(!empty($we_serve_provides))
    <!-- Service Section -->
    <section class="gi-service-section padding-tb-40">
        <div class="container">
            <div class="section-title-2">
                @if(session()->get('lang') == 'en') 
                    <h2 class="gi-title">Our <span>Services</span></h2>
                    <p>Customer service should not be a department. It should be the entire company.</p>
                @elseif(session()->get('lang') == 'ar')
                    <h2 class="gi-title">ملكنا <span> خدمات</span></h2>
                    <p>لا ينبغي أن تكون خدمة العملاء قسمًا. ينبغي أن تكون الشركة بأكملها.</p>
                @endif
            </div>
            <div class="row m-tb-minus-12">
                @foreach($we_serve_provides as $card)
                    <div class="gi-ser-content gi-ser-content-1 col-sm-6 col-md-6 col-lg-3 p-tp-12" data-aos="fade-up"
                        data-aos-duration="2000" data-aos-delay="200">
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

@if(!empty($customer_reviews))
    <!-- Testimonials Section -->
    <section class="gi-testimonials-section padding-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testim-bg p-tb-80">
                        <div class="section-title d-none">
                            @if(session()->get('lang') == 'en') 
                                <h2>Customers <span>Review</span></h2>
                            @elseif(session()->get('lang') == 'ar')
                                <h2>عملاء <span>مراجعة</span></h2>
                            @endif
                        </div>
                        <span class="gi-testi-shape-1"></span>
                        <div class="gi-test-outer gi-test-section">
                            <ul id="gi-testimonial-slider" class="owl-carousel">
                                @foreach($customer_reviews as $customer_review)
                                <li class="gi-test-item">
                                    <img src="{{ asset('images/frontend-images/icons/top-quotes.svg') }}" class="svg_img test_svg top" alt="user">
                                    <div class="gi-test-inner">
                                        <div class="gi-test-img">
                                            <img alt="testimonial" title="testimonial" src="{{ asset('images/backend_images/customer-review/'.$customer_review->image) }}">
                                        </div>
                                        <div class="gi-test-content">
                                            <div class="gi-test-desc">{{ $customer_review->review }}</div>
                                            <div class="gi-test-name">{{ $customer_review->name }}</div>
                                            <div class="gi-test-designation">{{ $customer_review->job_post }}</div>
                                            <!-- <div class="gi-test-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                    <img src="{{ asset('images/frontend-images/icons/bottom-quotes.svg') }}" class="svg_img test_svg bottom"
                                        alt="">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <span class="gi-testi-shape-2"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->
@endif

<!-- Facts Section -->
<!-- <section class="gi-facts-section padding-tb-40">
    <div class="container">
        <div class="row m-tb-minus-12">
            <div class="gi-facts-content col-sm-12 col-md-6 col-lg-3 p-tp-12">
                <div class="gi-facts-inner">
                    <div class="gi-count">
                        <span class="counter">65K+</span>
                    </div>
                    <div class="gi-facts-desc">
                        <h4>Vendors</h4>
                        <p>Contrary to popular belief, Lorem is not simply random text.</p>
                    </div>
                </div>
            </div>
            <div class="gi-facts-content col-sm-12 col-md-6 col-lg-3 p-tp-12">
                <div class="gi-facts-inner">
                    <div class="gi-count">
                        <span class="counter">$45B+</span>
                    </div>
                    <div class="gi-facts-desc">
                        <h4>Earnings</h4>
                        <p>Contrary to popular belief, Lorem is not simply random text.</p>
                    </div>
                </div>
            </div>
            <div class="gi-facts-content col-sm-12 col-md-6 col-lg-3 p-tp-12">
                <div class="gi-facts-inner">
                    <div class="gi-count">
                        <span class="counter">25M+</span>
                    </div>
                    <div class="gi-facts-desc">
                        <h4>Sold</h4>
                        <p>Contrary to popular belief, Lorem is not simply random text.</p>
                    </div>
                </div>
            </div>
            <div class="gi-facts-content col-sm-12 col-md-6 col-lg-3 p-tp-12">
                <div class="gi-facts-inner">
                    <div class="gi-count">
                        <span class="counter">70K+</span>
                    </div>
                    <div class="gi-facts-desc">
                        <h4>Products</h4>
                        <p>Contrary to popular belief, Lorem is not simply random text.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Facts Section End -->

@if(!empty($our_teams))
    <!-- Team Section -->
    <section class="gi-team-section padding-tb-40">
        <div class="container">
            <div class="section-title-2">
                @if(session()->get('lang') == 'en') 
                    <h2 class="gi-title">Our <span>Team</span></h2>
                    <p>Meet expert team members.</p>
                @elseif(session()->get('lang') == 'ar')
                    <h2 class="gi-title">ملكنا <span>فريق</span></h2>
                    <p>تعرف على أعضاء فريقنا.</p>
                @endif
            </div>
            <div class="gi-team owl-carousel">
                @foreach($our_teams as $our_team)
                    <div class="gi-team-box">
                        <div class="gi-team-imag">
                            <img src="{{ asset('images/backend_images/our-team/'.$our_team->image) }}" alt="user">
                            <!-- <div class="gi-team-socials">
                                <ul class="align-itegi-center">
                                    <li class="gi-social-link">
                                        <a href="#"><i class="gicon gi-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="gi-social-link">
                                        <a href="#"><i class="gicon gi-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="gi-social-link">
                                        <a href="#"><i class="gicon gi-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="gi-team-info">
                            <h5>{{ $our_team->name }}</h5>
                            <p>{{ $our_team->job_post }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Facts Section End -->
@endif

@endsection
