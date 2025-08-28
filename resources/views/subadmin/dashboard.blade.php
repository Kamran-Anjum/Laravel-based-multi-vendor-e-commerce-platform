@extends('layouts.subadminLayout.admin_design')
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
        @if($privilegee->vendors == 1)
          <li id="vendor_approval_request" class="bg_lb view_Subadmin_vendorApprovalRequest"> 
            <a href="javascript:void(0)"> 
              <i class="icon-user"></i>
              <span class="label label-important">
              {!!
                \Illuminate\Support\Facades\DB::table('vendor_approval_requests')->where('viewSubadmin','=',0)->where('subadmin_id','=',Auth::user()->id)->count()
              !!}
              </span>
              Vendor Approval Requests
            </a> 
          </li>
          <li id="vendor_city_request" class="bg_lg view_Subadmin_vendorCityRequest">
            <a href="javascript:void(0)"> 
              <i class="icon-user"></i>
              <span class="label label-important">
              {!!
                \Illuminate\Support\Facades\DB::table('vendor_city_requests')->where('viewSubadmin','=',0)->where('subadmin_id','=',Auth::user()->id)->count()
              !!}
              </span>
              Vendor City Requests
            </a> 
          </li>
        @endif
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
                  <strong>10</strong> 
                  <small>Pending Orders</small>
                </li>
                <li class="bg_lh">
                  <i class="icon-globe"></i> 
                  <strong>8540</strong> 
                  <small>Online Orders</small>
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
