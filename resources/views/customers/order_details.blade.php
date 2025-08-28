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
                              Order Details
                            @elseif(session()->get('lang') == 'ar')
                             تفاصيل الطلب
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
                                  Order Details
                                @elseif(session()->get('lang') == 'ar')
                                 تفاصيل الطلب
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
                          <h5>Order Details</h5>
                        @elseif(session()->get('lang') == 'ar')
                         <h5>تفاصيل الطلب</h5>
                        @endif
                        <!-- <div class="gi-header-btn">
                            <a class="gi-btn-1" href="#">Print</a>
                            <a class="gi-btn-2" href="#">Export</a>
                        </div> -->
                    </div>
                    <!-- <div class="gi-Track-image-inner">
                        <img src="assets/img/logo/logo.png" alt="Site Logo">
                    </div> -->
                    <div class="row invoice-p-30">
                        <div class="col-sm-6">
                            <div class="text-grey-m2">
                                @if(session()->get('lang') == 'en')
                                    <div class="my-2"><b class="text-600" style="margin-right:15px;">Order No : </b>L000{{$orders->orderid}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:42px;">Date : </b>{{$orders->ordercreatedat}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:60px;">To : </b>{{$orders->custfname.' '.$orders->custlname}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:30px;">Phone : </b>{{ $orders->custcell }}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:27px;">Pay By : </b>{{ $orders->payment_method }}</div>
                                @elseif(session()->get('lang') == 'ar')
                                    <div class="my-2"><b class="text-600" style="margin-right:35px;">رقم الطلب : </b>L000{{$orders->orderid}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:42px;">تاريخ : </b><span style="color: white;">p</span>{{$orders->ordercreatedat}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:70px;">ل : </b>{{$orders->custfname.' '.$orders->custlname}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:42px;">هاتف : </b><span style="color: white;">p</span>{{ $orders->custcell }}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:10px;">ادفع عن طريق : </b>{{ $orders->payment_method }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row invoice-p-30">
                        <div class="col-sm-6">
                            <div class="text-grey-m2">
                                @if(session()->get('lang') == 'en')
                                    <div class="my-2"><b class="text-600" style="margin-right:25px;">Billing : </b>{{ $customers->billToAddress }}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:25px;">Phone : </b>{{$customers->custcell}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:10px;">Country : </b>{{$customers->co_name}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:31px;">State : </b>
                                        @foreach($customerState as $state)
                                            @if($state->id == $customers->stateId)
                                                {{$state->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="my-2"><b class="text-600" style="margin-right:40px;">City : </b>{{$customers->c_name}}</div>
                                @elseif(session()->get('lang') == 'ar')
                                    <div class="my-2"><b class="text-600" style="margin-right:25px;">الفواتير : </b>{{ $customers->billToAddress }}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:25px;">هاتف : </b><span style="color: white;">p</span>{{$customers->custcell}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:38px;">دولة : </b>{{$customers->co_name}}</div>
                                    <div class="my-2"><b class="text-600" style="margin-right:35px;">ولاية : </b>
                                        @foreach($customerState as $state)
                                            @if($state->id == $customers->stateId)
                                                {{$state->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="my-2"><b class="text-600" style="margin-right:35px;">مدينة : </b>{{$customers->c_name}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="text-95 col-sm-6 align-self-start d-sm-flex">
                            <hr class="d-sm-none">
                            <div class="text-grey-m2">
                                <div class="text-grey-m2">
                                    @if(session()->get('lang') == 'en')
                                        <div class="my-2"><b class="text-600" style="margin-right:15px;">Shipping : </b>{{ $orders->shipToAddress }}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:27px;">Phonoe : </b>{{$orders->custcell}}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:25px;">Country : </b>{{$orders->co_name}}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:45px;">State : </b>
                                            @foreach($orderState as $state)
                                                @if($state->id == $orders->stateId)
                                                    {{$state->name}}
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="my-2"><b class="text-600" style="margin-right:55px;">City : </b>{{$orders->c_name}}</div>
                                    @elseif(session()->get('lang') == 'ar')
                                        <div class="my-2"><b class="text-600" style="margin-right:20px;">شحن : </b>{{ $orders->shipToAddress }}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:10px;">هاتف : </b><span style="color: white;">p</span>{{$orders->custcell}}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:25px;">دولة : </b>{{$orders->co_name}}</div>
                                        <div class="my-2"><b class="text-600" style="margin-right:25px;">ولاية : </b>
                                            @foreach($orderState as $state)
                                                @if($state->id == $orders->stateId)
                                                    {{$state->name}}
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="my-2"><b class="text-600" style="margin-right:25px;">مدينة : </b>{{$orders->c_name}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gi-vendor-card-body">
                        <div class="gi-vendor-card-table mb-minus-24px">
                            <table class="table gi-vender-table">
                                <thead>
                                    <tr>
                                        @if(session()->get('lang') == 'en')
                                            <th scope="col">S. No.</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Unit Weight</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Total Weight</th>
                                        @elseif(session()->get('lang') == 'ar')
                                            <th scope="col">الرقم التسلسلي</th>
                                            <th scope="col">المنتج</th>
                                            <th scope="col">صورة</th>
                                            <th scope="col">سعر الوحدة</th>
                                            <th scope="col">وحدة الوزن</th>
                                            <th scope="col">كمية</th>
                                            <th scope="col">المجموع</th>
                                            <th scope="col">الوزن الكلي</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($orderdetails as $orderdetail)
                                        <tr>
                                            <td scope="row"><span>{{ $i }}</span></td>
                                            <td><span>{{ $orderdetail->p_name }}</span></td>
                                            <td><span>
                                                @if(!empty($orderdetail->productimage))
                                                    <img width="50px" height="50px" src=" {{ asset('/images/backend_images/products/'.session()->get('lang').'/tiny/'.$orderdetail->productimage ) }}">
                                                @endif
                                            </span></td>
                                            <td><span>{{ $orderdetail->unit_price }}</span></td>
                                            <td><span>{{ $orderdetail->unit_weight }}</span></td>
                                            <td><span>{{ $orderdetail->qty }}</span></td>
                                            <td><span>{{ $orderdetail->total_price}}</span></td>
                                            <td><span>{{ $orderdetail->total_weight}}</span></td>
                                        </tr>
                                    @php $i++ @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="border-none" colspan="6">
                                            <span></span></td>
                                        <td class="border-color" colspan="1">
                                            <span><strong>
                                                @if(session()->get('lang') == 'en')
                                                  Sub Total
                                                @elseif(session()->get('lang') == 'ar')
                                                 المجموع الفرعي
                                                @endif
                                            </strong></span></td>
                                        <td class="border-color">
                                            <span>{{ $orders->total }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="border-none" colspan="6">
                                            <span></span></td>
                                        <td class="border-color" colspan="1">
                                            <span><strong>
                                                @if(session()->get('lang') == 'en')
                                                  Shipping Fee
                                                @elseif(session()->get('lang') == 'ar')
                                                 رسوم الشحن
                                                @endif
                                            </strong></span></td>
                                        <td class="border-color">
                                            <span>{{ $orders->shippingFee }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="border-none" colspan="6">
                                            <span></span></td>
                                        <td class="border-color" colspan="1">
                                            <span>
                                                <strong>
                                                    @if(session()->get('lang') == 'en')
                                                        VAT
                                                    @elseif(session()->get('lang') == 'ar')
                                                        ضريبة القيمة المضافة
                                                    @endif 
                                                    ({{ $orders->vat_value }}%)
                                                </strong>
                                            </span>
                                        </td>
                                        <td class="border-color">
                                            <span>{{ $orders->vat_amount }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="border-none m-m15" colspan="6"><span class="note-text-color"></span></td>
                                        <td class="border-color m-m15" colspan="1">
                                            <span><strong>
                                                @if(session()->get('lang') == 'en')
                                                  Grand Total
                                                @elseif(session()->get('lang') == 'ar')
                                                 المبلغ الإجمالي
                                                @endif
                                            </strong></span>
                                        </td>
                                        <td class="border-color m-m15">
                                            <span>{{ $orders->total_amount }}</span></td>
                                    </tr>
                                </tfoot>
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
