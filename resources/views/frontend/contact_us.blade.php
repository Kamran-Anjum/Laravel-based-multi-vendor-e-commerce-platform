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
                                Contact Us
                            @elseif(session()->get('lang') == 'ar')
                                اتصل بنا
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
                                    Contact Us
                                @elseif(session()->get('lang') == 'ar')
                                    اتصل بنا
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

<!-- Contact us section -->
<section class="gi-contact padding-tb-40">
    <div class="container">
        <div class="section-title-2">
            <h2 class="gi-title">Get in <span>Touch</span></h2>
            <p>Please select a topic below related to you inquiry. If you don't fint what you need, fill out our
                contact form.</p>
        </div>
        <div class="row gi-contact-detail m-tb-minus-12">
            <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                <div class="gi-box">
                    <div class="detail">
                        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title">Mail & Website</h3>
                            <p>
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; {{ $footer->email }}
                            </p>
                            <!-- <p>
                                <i class="fa fa-globe" aria-hidden="true"></i> &nbsp; www.yourdomain.com
                            </p> -->
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                <div class="gi-box">
                    <div class="detail">
                        <div class="icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title">Contact</h3>
                            <p>
                                <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp; {{ $footer->phone_1 }}
                            </p>
                            @if(!empty($footer->phone_2))
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp; {{ $footer->phone_2 }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12 m-auto">
                <div class="gi-box">
                    <div class="detail">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title">Address</h3>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; {{ $footer->address }}
                            </p>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
        </div>
        <div class="row p-t-80">
            <div class="col-md-6">
                <iframe src="//maps.google.com/maps?q=-12.942227,-38.480291&z=15&output=embed"
                    allowfullscreen=""></iframe>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fname" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="umail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="gi-btn-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
