<!-- Footer Start -->
    <footer class="gi-footer m-t-40">
        <div class="footer-container">
            <div class="footer-top padding-tb-80">
                <div class="container">
                    <div class="row m-minus-991">
                        <div class="col-sm-12 col-lg-3 gi-footer-cat wow fadeInUp">
                            <div class="gi-footer-widget gi-footer-company">
                                <img src="{{ asset('images/frontend-images/logo/logo.png') }}" class="gi-footer-logo" alt="footer logo">
                                <p class="gi-footer-detail">Grabit is the biggest market of grocery products. Get your
                                    daily
                                    needs from our store.</p>
                                <div class="gi-app-store">
                                    <a href="#" class="app-img"><img src="{{ asset('images/frontend-images/app/android.png') }}" class="adroid"
                                            alt="apple"></a>
                                    <a href="#" class="app-img"><img src="{{ asset('images/frontend-images/app/apple.png') }}" class="apple"
                                            alt="apple"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 gi-footer-info wow fadeInUp" data-wow-delay="0.2s">
                            <div class="gi-footer-widget">
                                <h4 class="gi-footer-heading">Category</h4>
                                <div class="gi-footer-links gi-footer-dropdown">
                                    <ul class="align-itegi-center">
                                        @foreach($categoriesss as $category)
                                            <li class="gi-footer-link">
                                                <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}" >{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 gi-footer-account wow fadeInUp" data-wow-delay="0.3s">
                            <div class="gi-footer-widget">
                                <h4 class="gi-footer-heading">Company</h4>
                                <div class="gi-footer-links gi-footer-dropdown">
                                    <ul class="align-itegi-center">
                                        <li class="gi-footer-link"><a href="{{ url(session()->get('lang').'/about-us' ) }}">About us</a></li>
                                        <li class="gi-footer-link"><a href="#">Track Order</a></li>
                                        <li class="gi-footer-link"><a href="#">Privacy Policy</a></li>
                                        <li class="gi-footer-link"><a href="#">Terms & conditions</a>
                                        </li>
                                        <li class="gi-footer-link"><a href="#">Secure payment</a></li>
                                        <li class="gi-footer-link"><a href="{{ url(session()->get('lang').'/contact-us' ) }}">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 gi-footer-service wow fadeInUp" data-wow-delay="0.4s">
                            <div class="gi-footer-widget">
                                <h4 class="gi-footer-heading">Account</h4>
                                <div class="gi-footer-links gi-footer-dropdown">
                                    <ul class="align-itegi-center">
                                        <li class="gi-footer-link"><a href="{{ url(session()->get('lang').'/login' ) }}">Sign In</a></li>
                                        <li class="gi-footer-link"><a href="{{ url(session()->get('lang').'/cart' ) }}">View Cart</a></li>
                                        <li class="gi-footer-link"><a href="#">Return Policy</a></li>
                                        <li class="gi-footer-link"><a href="{{ url(session()->get('lang').'/sell-with-us' ) }}">Become a Vendor</a></li>
                                        <li class="gi-footer-link"><a href="#">Affiliate Program</a></li>
                                        <li class="gi-footer-link"><a href="#">Payments</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 gi-footer-cont-social wow fadeInUp" data-wow-delay="0.5s">
                            <div class="gi-footer-contact">
                                <div class="gi-footer-widget">
                                    <h4 class="gi-footer-heading">Contact</h4>
                                    <div class="gi-footer-links gi-footer-dropdown">
                                        <ul class="align-itegi-center">
                                            <li class="gi-footer-link gi-foo-location">
                                                <span>
                                                    <i class="fi fi-rr-marker location svg_img foo_svg"></i>
                                                </span>
                                                <p>{{ $footer->address }}</p>
                                            </li>
                                            <li class="gi-footer-link gi-foo-call">
                                                <span>
                                                    <i class="fi fi-brands-whatsapp svg_img foo_svg"></i>
                                                </span>
                                                <a href="#">{{ $footer->phone_1 }}</a>
                                            </li>
                                            @if(!empty($footer->phone_2))
                                                <li class="gi-footer-link gi-foo-call">
                                                    <span>
                                                        <i class="fi fi-brands-whatsapp svg_img foo_svg"></i>
                                                    </span>
                                                    <a href="#">{{ $footer->phone_2 }}</a>
                                                </li>
                                            @endif
                                            <li class="gi-footer-link gi-foo-mail">
                                                <span>
                                                    <i class="fi fi-rr-envelope"></i>
                                                </span>
                                                <a href="#">{{ $footer->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-footer-social">
                                <div class="gi-footer-widget">
                                    <div class="gi-footer-links gi-footer-dropdown">
                                        <ul class="align-itegi-center">
                                            @if(!empty($footer->facebook))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->facebook }}">
                                                        <i class="gicon gi-facebook"aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($footer->google))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->google }}">
                                                        <i class="gicon gi-google" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($footer->instagram))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->instagram }}">
                                                        <i class="gicon gi-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($footer->linkedin))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->linkedin }}">
                                                        <i class="gicon gi-linkedin" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($footer->twitter))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->twitter }}">
                                                        <i class="gicon gi-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($footer->youtube))
                                                <li class="gi-footer-link">
                                                    <a href="{{ $footer->youtube }}">
                                                        <i class="gicon gi-youtube" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="gi-bottom-info">
                            <!-- Footer Copyright Start -->
                            <div class="footer-copy">
                                <div class="footer-bottom-copy ">
                                    <div class="gi-copy">Copyright © <a class="site-name" href="index.html">Grabit</a> all rights reserved. Powered by Grabit.</div>
                                </div>
                            </div>
                            <!-- Footer Copyright End -->
                            <!-- Footer payment -->
                            <div class="footer-bottom-right">
                                <div class="footer-bottom-payment d-flex justify-content-center">
                                    <div class="payment-link">
                                        <img src="{{ asset('images/frontend-images/hero-bg/payment.png') }}" alt="payment">
                                    </div>

                                </div>
                            </div>
                            <!-- Footer payment -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Quickview Modal -->
    <div class="modal fade quickview-modal" id="gi_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-767">
                            <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <div class="single-slide zoom-image-hover">
                                        <img class="img-responsive" src="{{ asset('images/frontend-images/product-images/10_1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="quickview-pro-content">
                                <h5 class="gi-quick-title"><a href="product-left-sidebar.html">Mix nuts premium quality
                                        organic
                                        dried fruit 250g pack</a>
                                </h5>
                                <div class="gi-quickview-rating">
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star"></i>
                                </div>

                                <div class="gi-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1900s,</div>
                                <div class="gi-quickview-price">
                                    <span class="new-price">$50.00</span>
                                    <span class="old-price">$62.00</span>
                                </div>

                                <div class="gi-pro-variation">
                                    <div class="gi-pro-variation-inner gi-pro-variation-size gi-pro-size">
                                        <div class="gi-pro-variation-content">
                                            <ul class="gi-opt-size">
                                                <li class="active"><a href="javascript:void(0)" class="gi-opt-sz"
                                                        data-tooltip="Small">250g</a></li>
                                                <li><a href="javascript:void(0)" class="gi-opt-sz"
                                                        data-tooltip="Medium">500g</a></li>
                                                <li><a href="javascript:void(0)" class="gi-opt-sz"
                                                        data-tooltip="Large">1kg</a></li>
                                                <li><a href="javascript:void(0)" class="gi-opt-sz"
                                                        data-tooltip="Extra Large">2kg</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="gi_qtybtn" value="1">
                                    </div>
                                    <div class="gi-quickview-cart ">
                                        <button class="gi-btn-1"><i class="fi-rr-shopping-basket"></i> Add To
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Modal end -->

    <!-- Newsletter Modal Start -->
    <!-- <div id="gi-popnews-bg"></div>
    <div id="gi-popnews-box">
        <div id="gi-popnews-close">×</div>
        <div class="row">
            <div class="col-md-6 disp-no-767">
                <img src="{{ asset('images/frontend-images/bg/newsletter.png') }}" alt="newsletter">
            </div>
            <div class="col-md-6">
                <div id="gi-popnews-box-content">
                    <h2>Newsletter.</h2>
                    <p>Subscribe the masterkart to get in touch and get the future update.</p>
                    <form id="gi-popnews-form" action="#" method="post">
                        <input type="email" name="newsemail" placeholder="Email Address" required>
                        <button type="button" class="gi-btn-2" name="subscribe">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Newsletter Modal end -->

    <!-- Back to top  -->
    <a class="gi-back-to-top"></a>

    <!-- Feature tools -->
    <!-- <div class="gi-tools-sidebar-overlay"></div>
    <div class="gi-tools-sidebar">
        <a href="javascript:void(0)" class="gi-tools-sidebar-toggle in-out">
            <i class="fi fi-rr-settings"></i>
        </a>
        <div class="gi-bar-title">
            <h6>Tools</h6>
            <a href="#" class="close-tools"><i class="ri-close-line"></i></a>
        </div>
        <div class="gi-tools-detail">
            <div class="gi-tools-block">
                <h3>Select Color</h3>
                <ul class="gi-color">
                    <li class="color-primary active-variant">
                    </li>
                    <li class="color-1">
                    </li>
                    <li class="color-2">
                    </li>
                    <li class="color-3">
                    </li>
                    <li class="color-4">
                    </li>
                    <li class="color-5">
                    </li>
                    <li class="color-6">
                    </li>
                    <li class="color-7">
                    </li>
                    <li class="color-8">
                    </li>
                    <li class="color-9">
                    </li>
                </ul>
            </div>
            <div class="gi-tools-block">
                <h3>Modes</h3>
                <div class="gi-tools-rtl">
                    <div class="mode-primary gi-tools-item rtl-mode mode active-mode ltr" data-gi-mode-tool="ltr">
                        <img src="{{ asset('images/frontend-images/tools/ltr.png') }}" alt="ltr">
                        <p>LTR</p>
                    </div>
                    <div class="gi-tools-item rtl-mode mode rtl" data-gi-mode-tool="rtl">
                        <img src="{{ asset('images/frontend-images/tools/rtl.png') }}" alt="rtl">
                        <p>RTL</p>
                    </div>
                </div>
            </div>
            <div class="gi-tools-block">
                <h3>Dark Modes</h3>
                <div class="gi-tools-dark">
                    <div class="mode-primary gi-tools-item mode-dark active-mode light" data-gi-mode-dark="light">
                        <img src="{{ asset('images/frontend-images/tools/light.png') }}" alt="light">
                        <p>Light</p>
                    </div>
                    <div class="gi-tools-item mode-dark dark" data-gi-mode-dark="dark">
                        <img src="{{ asset('images/frontend-images/tools/dark.png') }}" alt="dark">
                        <p>Dark</p>
                    </div>
                </div>
            </div>
        </div>
    </div>