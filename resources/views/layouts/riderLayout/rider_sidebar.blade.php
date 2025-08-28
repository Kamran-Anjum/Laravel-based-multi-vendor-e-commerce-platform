<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if(preg_match("/dashboard/i", $url)){?>  class="active" <?php } ?>>
      <a href="{{ url('/rider/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
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
            ->where(['o.city_id'=>Session::get('RiderCity')])
            ->where(['o.deliverySchedualDate'=> date('Y-m-d 00:00:00')])
            ->where(['o.status_id'=>3])
            ->where(['o.rider_id'=>null])
            ->orwhere(['o.rider_id'=> Auth::user()->id])
            ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/order/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/view-order/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/rider/view-order') }}">View Orders</a>
        </li>
        <li <?php if(preg_match("/view-delivered-order/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/rider/view-delivered-order') }}">View Delivered Orders</a>
        </li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->
