<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if(preg_match("/dashboard/i", $url)){?>  class="active" <?php } ?>>
      <a href="{{ url('/vendor/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
    </li>
    <li id="vendor_privilege_products" class="submenu">
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Products</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('products as p')
              ->where(['pt.isActive'=>1])
              ->where(['pt.created_for'=>Auth::user()->id])
              ->where(['pc.city_id'=>Session::get('VendorActiveCity')])
              ->join('product_translates as pt','pt.product_id', '=', 'p.id')
              ->join('product_cities as pc','pc.product_id', '=', 'p.id')
              ->select('pt.*')
              ->groupBy('pt.lang')
              ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/product/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-product/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/add-product') }}">Add Product</a>
        </li>
        <li <?php if(preg_match("/view-products/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/view-products') }}">View Products</a>
        </li>
      </ul>
    </li>
    <li id="vendor_privilege_orders" class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Orders</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('orders as o')
            ->where('o.isDeleted','=','0')
            ->where('o.deleted_at','=',Null)
            ->where(['o.city_id'=>Session::get('VendorActiveCity')])
            ->where(['p.created_for'=>Auth::user()->id])
            ->where(['p.lang'=>'en'])
            ->join('order_details as od','o.id','=','od.order_id')
            ->join('product_translates as p','od.product_id','=','p.product_id')
            ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/order/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/view-order/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/view-order') }}">View Orders</a>
        </li>
      </ul>
    </li>
    <li id="vendor_privilege_accounts" class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Accounts</span> 
        <span class="label label-important">
          {{--!! $count=\Illuminate\Support\Facades\DB::table('shop_owners')
          ->where('isDeleted','=','0')
          ->where('deleted_at','=',Null)
          ->count() !!--}}
        </span>
      </a>
    </li>
    <li id="vendor_user" class="submenu">
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Vendor User Setup</span>
        <span class="label label-important">
          {{ $count=\Illuminate\Support\Facades\DB::table('vendor_users')
          ->where('created_by','=',Auth::user()->id)
          ->count() }}
        </span>
      </a>
      <ul <?php if(preg_match("/vendor-user/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/create-vendor-user/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/create-vendor-user') }}">Add Vendor User</a>
        </li>
        <li <?php if(preg_match("/view-vendor-users/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/view-vendor-users') }}">View Vendor Users</a>
        </li>
      </ul>
    </li>
    <li id="vendor_city_request" class="submenu">
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>City Requests</span>
        <span class="label label-important">
          {{ $count=\Illuminate\Support\Facades\DB::table('vendor_city_requests')
          ->where('user_id','=',Auth::user()->id)
          ->distinct('user_id','city_id')
          ->count() }}
        </span>
      </a>
      <ul <?php if(preg_match("/city-request/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-city-request/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/add-city-request') }}">Add City Request</a>
        </li>
        <li <?php if(preg_match("/view-city-requests/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/vendor/view-city-requests') }}">View City Request</a>
        </li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->
