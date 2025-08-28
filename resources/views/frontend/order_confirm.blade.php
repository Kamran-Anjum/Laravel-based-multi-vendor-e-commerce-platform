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
                              Order Placed
                            @elseif(session()->get('lang') == 'ar')
                                تم الطلب
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
                                  Order Placed
                                @elseif(session()->get('lang') == 'ar')
                                    تم الطلب
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

<!-- Track Order section -->
    <section class="gi-track padding-tb-40">
        <div class="container">
            <div class="section-title-2">
                @if(session()->get('lang') == 'en')
                    <h2 class="gi-title">Order<span> Placed</span></h2>
                    <p>We delivering happiness and needs, Faster than you can think.</p>
                @elseif(session()->get('lang') == 'ar')
                    <h2 class="gi-title">طلب<span> وضعت</span></h2>
                    <p>نحن نقدم السعادة والاحتياجات، بشكل أسرع مما تتخيل.</p>
                @endif
            </div>
            <div class="row">
                <div class="container">
                    <div class="gi-track-box">
                        <!-- Details-->
                        <div class="row">
                            <div class="col-md-4 m-b-767">
                                <div class="gi-track-card">
                                    <span class="gi-track-title">
                                        @if(session()->get('lang') == 'en')
                                          Order
                                        @elseif(session()->get('lang') == 'ar')
                                            طلب
                                        @endif
                                    </span>
                                    <span>#L000{{ $orderDetails->id }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 m-b-767">
                                <div class="gi-track-card">
                                    <span class="gi-track-title">
                                        @if(session()->get('lang') == 'en')
                                          Payment By
                                        @elseif(session()->get('lang') == 'ar')
                                            الدفع بواسطة
                                        @endif
                                    </span>
                                    <span>{{ $orderDetails->payment_method }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 m-b-767">
                                <div class="gi-track-card">
                                    <span class="gi-track-title">
                                        @if(session()->get('lang') == 'en')
                                          Order Date
                                        @elseif(session()->get('lang') == 'ar')
                                            تاريخ الطلب
                                        @endif
                                    </span>
                                    <span>{{ $orderDetails->created_at }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Track Order section End -->      

@endsection
