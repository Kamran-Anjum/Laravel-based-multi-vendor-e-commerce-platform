@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li id="vendor_approval_request" class="bg_lb view_Admin_vendorApprovalRequest"> 
          <a href="javascript:void(0)"> 
            <i class="icon-user"></i>
            <span class="label label-important">
            {!!
              \Illuminate\Support\Facades\DB::table('vendor_approval_requests')->where('viewAdmin','=',0)->count()
            !!}
            </span>  
            Vendor Approval Requests
          </a> 
        </li>
        <li id="vendor_city_request" class="bg_lb view_Admin_vendorCityRequest"> 
          <a href="javascript:void(0)"> 
            <i class="icon-user"></i>
            <span class="label label-important">
            {!!
              \Illuminate\Support\Facades\DB::table('vendor_city_requests')->where('viewAdmin','=',0)->count()
            !!}
            </span>  
            Vendor City Requests
          </a> 
        </li>
        <li id="vat" class="bg_lb vat_vat"> 
          <a href="{{ url('/admin/edit-vat') }}"> 
            <i class="icon-money"></i>
            <span class="label label-important"></span>  
            VAT
          </a> 
        </li>
        <!-- <li class="bg_lb"> 
          <a href="dashboard"> 
            <i class="icon-dashboard"></i> 
            <span class="label label-important">8</span> My Dashboard 
          </a> 
        </li>
        <li class="bg_lg"> 
          <a href="view-categories"> 
            <i class="icon-th-list"></i>
            <span class="label label-important">
              {!!
                $count=\Illuminate\Support\Facades\DB::table('categories as c')
                ->where(['ct.isActive'=>1])
                ->join('category_translates as ct','ct.category_id', '=', 'c.id')
                ->select('ct.*')
                ->count()
              !!}
            </span> Categories
          </a> 
        </li>
        <li class="bg_ly span3"> 
          <a href="view-products"> 
            <i class="icon-briefcase"></i>
            <span class="label label-important">
              {!!
                  $count=\Illuminate\Support\Facades\DB::table('products as p')
                  ->where(['pt.isActive'=>1])
                  ->join('product_translates as pt','pt.product_id', '=', 'p.id')
                  ->select('pt.*')
                  ->count()
              !!}
            </span> Products 
          </a> 
        </li>
        <li class="bg_lo"> 
          <a href="view-brands"> 
            <i class="icon-th"></i> 
            <span class="label label-important">
              {!!
                    $count=\Illuminate\Support\Facades\DB::table('brands as b')
                    ->where(['bt.isActive'=>1])
                    ->join('brand_translates as bt','bt.brand_id', '=', 'b.id')
                    ->select('bt.*')
                    ->count()
              !!}
            </span> Brands 
          </a>
        </li>
        <li class="bg_ls"> 
          <a href="view-stores"> 
            <i class="icon-home"></i>
            <span class="label label-important">
              {!! $count=\Illuminate\Support\Facades\DB::table('shop_owners')->where('deleted_at','=',NULL)->count() !!}
            </span> Stores
          </a> 
        </li>
        <li class="bg_ly"> 
          <a href="view-countries"> 
            <i class="icon-map-marker"></i>
            <span class="label label-important">
              {!! $count=\Illuminate\Support\Facades\DB::table('countries')->where('deleted_at','=',NULL)->count() !!}
            </span> Countries
          </a> 
        </li>
        <li class="bg_lo"> 
          <a href="view-state"> 
            <i class="icon-map-marker"></i>
            <span class="label label-important">
              {!! $count=\Illuminate\Support\Facades\DB::table('states')->where('deleted_at','=',NULL)->count() !!}
            </span> States
          </a> 
        </li>
        <li class="bg_ls"> 
          <a href="view-city"> 
            <i class="icon-map-marker"></i>
            <span class="label label-important">
              {!! $count=\Illuminate\Support\Facades\DB::table('cities')->where('deleted_at','=',NULL)->count() !!}
            </span> Cities
          </a> 
        </li>
        <li class="bg_lb span3"> 
          <a href="view-order"> 
            <i class="icon-shopping-cart"></i>
            <span class="label label-important">
              {!! $count=\Illuminate\Support\Facades\DB::table('orders')->where('deleted_at','=',NULL)->count() !!}
            </span> Orders
          </a> 
        </li>
        <li class="bg_lg"> 
          <a href="view-customer"> 
            <i class="icon-user"></i> 
            <span class="label label-important">
              {{--!! $count=\Illuminate\Support\Facades\DB::table('customers')->where('deleted_at','=',NULL)->count() !! --}}
            </span> Customers
          </a> 
        </li> -->
      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
                <div class="widget-content">
                    <ul class="unstyled">
                        <li> 
                          <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 
                          Total user 
                          <span class="pull-right strong">
                            {!! $count=\Illuminate\Support\Facades\DB::table('users')->count() !!}
                          </span>
                          <div class="progress progress-striped ">
                            <div style="width:{!!$count !!};" class="bar"></div>
                          </div>
                        </li>
                        <li> 
                          <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 
                          Total orders 
                          <span class="pull-right strong">
                            {!! $count=\Illuminate\Support\Facades\DB::table('orders')->count() !!}
                          </span>
                          <div class="progress progress-success progress-striped ">
                            <div style="width: {!! $count !!}" class="bar"></div>
                          </div>
                        </li>
                        <li> 
                          <span class="icon24 icomoon-icon-arrow-down-2 red"></span> 
                          53% Impressions 
                          <span class="pull-right strong">457</span>
                          <div class="progress progress-warning progress-striped ">
                            <div style="width: 53%;" class="bar"></div>
                          </div>
                        </li>
                        <li> 
                          <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 
                          Online Users 
                          <span class="pull-right strong">
                            {!! $count=\Illuminate\Support\Facades\DB::table('customers')->count() !!}
                          </span>
                          <div class="progress progress-danger progress-striped ">
                            <div style="width:{!! $count !!} " class="bar"></div>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh">
                  <i class="icon-user"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('users')->count() !!}</strong> 
                  <small>Total Users</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-user"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('customers')->count() !!}</strong> 
                  <small>Customers</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-home"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('shop_owners')->count() !!}</strong> 
                  <small>Total Stores</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-shopping-cart"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('orders')->count() !!}</strong> 
                  <small>Total Orders</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-repeat"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('orders')->where(['status_id'=>1])->count() !!}</strong> 
                  <small>Pending Orders</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-globe"></i> 
                  <strong>{!! $count=\Illuminate\Support\Facades\DB::table('orders')->where(['status_id'=>5])->count() !!}</strong> 
                  <small>Deliered Orders</small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--End-Chart-box-->
    <hr/>

  </div>
</div>

<!--end-main-container-part-->
@endsection
<script src="js/excanvas.min.js"></script>
