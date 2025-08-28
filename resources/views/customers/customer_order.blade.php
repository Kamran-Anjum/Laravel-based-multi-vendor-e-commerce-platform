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
                                My Orders
                            @elseif(session()->get('lang') == 'ar')
                                طلباتي
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
                                    My Orders
                                @elseif(session()->get('lang') == 'ar')
                                    طلباتي
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
                <div class="gi-vendor-dashboard-card">
                    <div class="gi-vendor-card-header">
                        @if(session()->get('lang') == 'en')
                            <h5>My Orders</h5>
                        @elseif(session()->get('lang') == 'ar')
                           <h5> طلباتي</h5>
                        @endif
                        <!-- <div class="gi-header-btn">
                            <a class="gi-btn-2" href="#">View All</a>
                        </div> -->
                    </div>
                    <div class="gi-vendor-card-body">
                        <div class="gi-vendor-card-table">
                            <table class="table gi-vender-table">
                                <thead>
                                    <tr>
                                        @if(session()->get('lang') == 'en')
                                            <th scope="col">Order No.</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Delivered Date</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        @elseif(session()->get('lang') == 'ar')
                                            <th scope="col">رقم الطلب</th>
                                            <th scope="col">تاريخ الطلب</th>
                                            <th scope="col">تاريخ تسليمها</th>
                                            <th scope="col">طريقة الدفع او السداد</th>
                                            <th scope="col">كمية</th>
                                            <th scope="col">الحالة</th>
                                            <th scope="col">أجراءات</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <th scope="row"><span>L000{{$order->orderid}}</span></th>
                                            <td><span>{{ $order->ordercreatedat }}</span></td>
                                            <td><span>{{ $order->deliverdDate }}</span></td>
                                            <td><span>{{ $order->payment_method }}</span></td>
                                            <td><span>{{$order->total_amount}}</span></td>
                                            <td><span>{{$order->s_name }}</span></td>
                                            <td><span>
                                                <a class="gi-btn-2" href="{{ url(session()->get('lang').'/order-details/'.$order->orderid) }}">
                                                    @if(session()->get('lang') == 'en')
                                                      View
                                                    @elseif(session()->get('lang') == 'ar')
                                                    رأي
                                                    @endif
                                                </a>
                                            </span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Vendor profile section end -->

@endsection
