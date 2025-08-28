@extends('layouts.riderLayout.rider_design')
@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
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
                          Total Delivered orders 
                          <span class="pull-right strong">
                            {!!
                              $count=\Illuminate\Support\Facades\DB::table('orders as o')
                              ->where('o.isDeleted','=','0')
                              ->where('o.deleted_at','=',Null)
                              ->where(['o.rider_id'=> Auth::user()->id])
                              ->count()
                            !!}
                          </span>
                          <div class="progress progress-success progress-striped ">
                            <div style="width: {!! $count !!}" class="bar"></div>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <a href="{{ url('rider/view-delivered-order') }}">
                  <li class="bg_lh">
                    <i class="icon-shopping-cart"></i> 
                    <strong>{!! $count !!}</strong> 
                    <small>Total Delivered Orders</small>
                  </li>
                </a>
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
