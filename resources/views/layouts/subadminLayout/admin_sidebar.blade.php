<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if(preg_match("/dashboard/i", $url)){?>  class="active" <?php } ?>>
      <a href="{{ url('/subadmin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a>
    </li>
    @if($privilegee->products == 1)
      <li id="privilege_products" class="submenu">
        <a href="#">
          <i class="icon icon-th-list"></i>
          <span>Products</span>
          <span class="label label-important">
            {!!
              $count=\Illuminate\Support\Facades\DB::table('products as p')
              ->where(['pt.isActive'=>1])
              ->where(['pt.created_by'=>Auth::user()->id])
              ->where(['pc.city_id'=>Session::get('SubAdminActiveCity')])
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
            <a href="{{ url('/subadmin/add-product') }}">Add Product</a>
          </li>
          <li <?php if(preg_match("/view-products/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/subadmin/view-products') }}">View Products</a>
          </li>
        </ul>
      </li>
    @endif
    @if($privilegee->orders == 1)
      <li id="privilege_orders" class="submenu">
        <a href="#">
          <i class="icon icon-th-list"></i>
          <span>Orders</span> 
          <span class="label label-important">
            {!!
              $count=\Illuminate\Support\Facades\DB::table('orders')
              ->where('isDeleted','=','0')
              ->where('deleted_at','=',Null)
              ->where(['city_id'=>Session::get('SubAdminActiveCity')])
              ->count()
            !!}
          </span>
        </a>
        <ul <?php if(preg_match("/order/i", $url)){?>  style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-order/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/subadmin/view-order') }}">View Orders</a>
          </li>
        </ul>
      </li>
    @endif
    @if($privilegee->vendors == 1)
      <li id="privilege_vendors" class="submenu"> 
        <a href="#">
          <i class="icon icon-th-list"></i>
          <span>Vendor Setup</span> 
          <span class="label label-important">
            {!!
              $count=\Illuminate\Support\Facades\DB::table('users as u')
              ->where(['mhr.role_id'=> 3])
              ->where(['vp.city_id'=>Session::get('SubAdminActiveCity')])
              ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
              ->join('vendors as v','v.user_id', '=', 'u.id')
              ->join('vendor_privileges as vp','v.user_id', '=', 'vp.user_id')
              ->select('u.*')
              ->count();
            !!}
          </span>
        </a>
        <ul <?php if(preg_match("/vendors/i", $url)){?>  style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-vendors/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/subadmin/view-vendors') }}">View Vendor</a>
          </li>
          <!-- <li <?php if(preg_match("/view-city-requests/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/subadmin/view-city-requests') }}">View Vendor City Requests</a>
          </li> -->
        </ul>
      </li>
    @endif
    @if($privilegee->chat_supports == 1)
      <li id="privilege_chat_supports" class="submenu"> 
        <a href="#">
          <i class="icon icon-th-list"></i> 
          <span>Chat Support</span> 
          <span class="label label-important">
            {{-- !! $count=\Illuminate\Support\Facades\DB::table('shop_owners')
            ->where('isDeleted','=','0')
            ->where('deleted_at','=',Null)
            ->count() !! --}}
          </span>
        </a>
        <!-- <ul <?php if(preg_match("/stores/i", $url)){?>  style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-stores/i", $url)){?>  class="active" <?php } ?>>
            <a href="{{ url('/subadmin/view-stores') }}">View Stores</a>
          </li>
        </ul> -->
      </li>
    @endif

    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Rider/Driver Setup</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('riders as r')
            ->where(['r.isActive'=> 1])
            ->where(['r.city_id'=>Session::get('SubAdminActiveCity')])
            ->select('r.*')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/rider/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/create-rider/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/subadmin/create-rider') }}">Add Rider</a>
        </li>
        <li <?php if(preg_match("/view-rider/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/subadmin/view-rider') }}">View Rider</a>
        </li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
