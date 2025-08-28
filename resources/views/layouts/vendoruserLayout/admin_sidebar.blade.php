<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if(preg_match("/dashboard/i", $url)){?>  class="active" <?php } ?>>
      <a href="{{ url('/vendoruser/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
    </li>
    @if($ven_user_privilegee->products == 1)
      <li id="vendor_user_privilege_products" class="submenu">
        <a href="#">
          <i class="icon icon-th-list"></i>
          <span>Products</span> 
          <span class="label label-important">
            {!!
              $count=\Illuminate\Support\Facades\DB::table('products as p')
              ->where(['pt.isActive'=>1])
              ->where(['pt.created_by'=>Auth::user()->id])
              ->where(['pc.city_id'=>Session::get('VendorUserActiveCity')])
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
            <a href="{{ url('/vendoruser/add-product') }}">Add Product</a>
          </li>
          <li <?php if(preg_match("/view-products/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/vendoruser/view-products') }}">View Products</a>
          </li>
        </ul>
      </li>
    @endif
    @if($ven_user_privilegee->orders == 1)
      <li id="vendor_user_privilege_orders" class="submenu"> 
        <a href="#">
          <i class="icon icon-th-list"></i> 
          <span>Orders</span> 
          <span class="label label-important">
            @php
              $vendor_user = \Illuminate\Support\Facades\DB::table('vendor_users')->where(['user_id'=>Auth::user()->id])->first();
            @endphp
            {!!
              $count=\Illuminate\Support\Facades\DB::table('orders as o')
              ->where('o.isDeleted','=','0')
              ->where('o.deleted_at','=',Null)
              ->where(['o.city_id'=>Session::get('VendorActiveCity')])
              ->where(['p.created_for'=>$vendor_user->created_by])
              ->where(['p.lang'=>'en'])
              ->join('order_details as od','o.id','=','od.order_id')
              ->join('product_translates as p','od.product_id','=','p.product_id')
              ->count()
            !!}
          </span>
        </a>
        <ul <?php if(preg_match("/order/i", $url)){?>  style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-order/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/vendoruser/view-order') }}">View Orders</a>
          </li>
        </ul>
      </li>
    @endif
    @if($ven_user_privilegee->accounts == 1)
      <li id="vendor_user_privilege_accounts" class="submenu"> 
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
    @endif
  </ul>
</div>
<!--sidebar-menu-->
