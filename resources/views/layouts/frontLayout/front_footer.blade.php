<div class="footer-dark" style="padding-top: 50px;padding-bottom: 50px;background-color: rgba(157,157,157,0.11);margin-top: 30px;">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-2" style="padding: 15px;">
                    <h3 style="color: rgb(40,45,50);margin-bottom: 6px;">
                        @if(session()->get('lang') == 'en')
                          QUICK LINKS
                        @elseif(session()->get('lang') == 'ar')
                          تروابط سريعة
                        @endif
                    </h3>
                    <ul style="margin-bottom: 6px;">
                        <li><a href="{{ url(session()->get('lang').'/about-us') }}" style="color: rgb(38,38,38);">
                            @if(session()->get('lang') == 'en')
                                About Us
                            @elseif(session()->get('lang') == 'ar')
                               معلومات عنا
                            @endif
                        </a></li>
                        <li style="color: rgb(142,142,142);"><a href="{{ url(session()->get('lang').'/contact-us') }}" style="color: rgb(38,38,38);">
                            @if(session()->get('lang') == 'en')
                                Contact Us
                            @elseif(session()->get('lang') == 'ar')
                                تصل بنا
                            @endif
                        </a></li>
                        <li style="color: rgb(142,142,142);"><a href="#" style="color: rgb(38,38,38);">
                            @if(session()->get('lang') == 'en')
                                Privacy Policy
                            @elseif(session()->get('lang') == 'ar')
                                سياسة خاصة
                            @endif
                        </a></li>
                        <li style="color: rgb(142,142,142);"><a href="#" style="color: rgb(38,38,38);">
                            @if(session()->get('lang') == 'en')
                                Terms & Conditions
                            @elseif(session()->get('lang') == 'ar')
                                البنود و الظروف
                            @endif
                        </a></li>
                        <li style="color: rgb(142,142,142);"><a href="#" style="color: rgb(38,38,38);">
                            @if(session()->get('lang') == 'en')
                                FAQ
                            @elseif(session()->get('lang') == 'ar')
                                التعليمات
                            @endif
                        </a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-xl-4" style="padding: 15px;">
                    <h3 style="color: rgb(40,45,50);margin-bottom: 6px;">
                        @if(session()->get('lang') == 'en')
                            CONTACT DETAILS
                        @elseif(session()->get('lang') == 'ar')
                            كبيانات المتصل
                        @endif
                    </h3>
                    <ul style="margin-bottom: 6px;">
                        <li><i class="la la-phone" style="color: rgb(38,38,38);"></i><a href="tel:" style="color: rgb(38,38,38);">&nbsp;+92-333-1234567<br></a></li>
                        <li><i class="la la-envelope-o" style="color: rgb(38,38,38);"></i><a href="tel:" style="color: rgb(38,38,38);">&nbsp;info@example.com<br></a></li>
                        <li><i class="la la-map-marker" style="color: rgb(38,38,38);"></i><a href="tel:" style="color: rgb(38,38,38);">&nbsp;
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales facilisis leo sed varius
                        <br></a></li>
                    </ul>
                </div>
                <div class="col-10 col-sm-10 col-md-9 col-xl-5 text-center" style="padding: 15px;"><i class="icon-envelope-letter" style="color: rgb(196,82,163);font-size: 3rem;"></i>
                    <h1 style="color: rgb(40,45,50);font-size: 1rem;margin-bottom: 0px;">
                        @if(session()->get('lang') == 'en')
                            Subscribe for our Newsletter
                        @elseif(session()->get('lang') == 'ar')
                            اشترك في النشرة الإخبارية لدينا
                        @endif
                    </h1>
                    <p style="color: rgb(38,38,38);font-size: 0.8rem;font-weight: 700;opacity: 0.40;">
                        @if(session()->get('lang') == 'en')
                            Never miss an update!
                        @elseif(session()->get('lang') == 'ar')
                            كلا تفوت أي تحديث!
                        @endif
                    </p>
                    <form class="form-inline">
                        <!-- <div class="form-row" style="width: 100%;"><input class="border rounded-0 form-control" type="email" style="width: 70%;"><button class="btn btn-primary border rounded-0" type="button" style="width: 30%;background-color: rgb(196,82,163);font-size: 0.8rem;">SUBSCRIBE</button></div> -->
                        <div class="input-group mb-3" style="width:100%;">
                          <input type="email" class="form-control" aria-label="Subscriber's email" aria-describedby="button-addon2" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="button-addon2" style="border: none; background-color: rgb(196,82,163);font-size: 0.8rem;border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                                @if(session()->get('lang') == 'en')
                                    SUBSCRIBE
                                @elseif(session()->get('lang') == 'ar')
                                    الإشتراك
                                @endif
                            </button>
                          </div>
                        </div>
                    </form>

                </div>
                <div class="col-2 col-sm-2 col-md-3 col-xl-1" style="padding: 15px;"><a class="btn btn-primary d-xl-flex" role="button" style="float: right;border: none;margin-top: 106px;border-radius: 20px;background-color: rgb(195,80,160);padding-bottom: 10px;" href="#top"><i class="fa fa-chevron-up"></i></a></div>
            </div>
        </div>
    </footer>
</div>
<div class="footer-dark" style="padding-top: 20px;padding-bottom: 20px;background-color: rgb(196,82,163);">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xl-4 text-left">
                        <p class="text-center" style="font-size: 0.9rem;margin-bottom: 0px;">© Lilac2xpress | LilacEdge 2019. 
                            @if(session()->get('lang') == 'en')
                                All Rights Reserved
                            @elseif(session()->get('lang') == 'ar')
                                كل الحقوق محفوظة
                            @endif
                        </p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4 text-right">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item" style="font-size: 0.9rem;">
                                @if(session()->get('lang') == 'en')
                                    DOWNLOAD THE APP
                                @elseif(session()->get('lang') == 'ar')
                                    قم بتنزيل التطبيق
                                @endif
                            </li>
                            <li class="list-inline-item"><a href="#" style="font-size: 0.9rem;color: rgb(255,255,255);/*opacity: 0.80;*/"><i class="fa fa-android" style="font-size: 1rem;"></i></a></li>
                            <li class="list-inline-item"><a href="#" style="font-size: 0.9rem;"><i class="fa fa-apple" style="font-size: 1rem;"></i></a></li>
                            <li class="list-inline-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-4 text-right">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item" style="font-size: 0.9rem;">
                                @if(session()->get('lang') == 'en')
                                    Follow Us
                                @elseif(session()->get('lang') == 'ar')
                                    تابعنا
                                @endif
                            </li>
                            <li class="list-inline-item"><a href="#" style="font-size: 0.9rem;"><i class="fa fa-facebook-square" style="font-size: 1rem;"></i></a></li>
                            <li class="list-inline-item"><a href="#" style="font-size: 0.9rem;"><i class="fa fa-twitter" style="font-size: 1rem;"></i></a></li>
                            <li class="list-inline-item"><a href="#" style="font-size: 0.9rem;"><i class="fa fa-instagram" style="font-size: 1rem;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
