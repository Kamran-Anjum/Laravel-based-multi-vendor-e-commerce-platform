<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if(preg_match("/dashboard/i", $url)){?>  class="active" <?php } ?>>
      <a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Meta Tags</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('meta_tags as mt')->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/meta-tag/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-meta-tags/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-meta-tags') }}">Add Meta Tags</a>
        </li>
        <li <?php if(preg_match("/view-meta-tags/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-meta-tags') }}">View Meta Tags</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Site Analytics</span> 
      </a>
      <ul 
        <?php if(preg_match("/analytics/i", $url)){?>  
          style="display:block;" 
        <?php } ?>>
        <li <?php if(preg_match("/view-analytics/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-analytics') }}"> View Analytics</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Front Features</span> 
      </a>
      <ul 
        <?php if(preg_match("/slider/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/home-banner/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/we-serve-card/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/about/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/customer-review/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/our-team/i", $url)){?>  
          style="display:block;" 
        <?php } elseif(preg_match("/footer-item/i", $url)){?>  
          style="display:block;" 
        <?php } ?>>
        <li <?php if(preg_match("/view-sliders/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-sliders') }}"> Sliders</a>
        </li>
        <li <?php if(preg_match("/view-home-banners/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-home-banners') }}"> Home Banners</a>
        </li>
        <li <?php if(preg_match("/view-we-serve-cards/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-we-serve-cards') }}"> We Serve Cards</a>
        </li>
        <li <?php if(preg_match("/view-about/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-about') }}"> About</a>
        </li>
        <li <?php if(preg_match("/view-customer-review/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-customer-reviews') }}"> Customer Review</a>
        </li>
        <li <?php if(preg_match("/view-our-team/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-our-team') }}"> Our Team</a>
        </li>
        <li <?php if(preg_match("/view-footer-item/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-footer-item') }}"> Footer</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i>
        <span>Categories</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('categories as c')
            ->where(['ct.isActive'=>1])
            ->join('category_translates as ct','ct.category_id', '=', 'c.id')
            ->select('ct.*')
            ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/categor/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-category/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-category') }}">Add Category</a>
        </li>
        <li <?php if(preg_match("/view-categories/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-categories') }}">View Categories</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Brands</span> 
        <span class="label label-important">
          {!!
              $count=\Illuminate\Support\Facades\DB::table('brands as b')
              ->where(['bt.isActive'=>1])
              ->join('brand_translates as bt','bt.brand_id', '=', 'b.id')
              ->select('bt.*')
              ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/brand/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-brand/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-brand') }}">Add Brand</a>
        </li>
        <li <?php if(preg_match("/view-brands/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-brands') }}">View Brands</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Products</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('products as p')
            ->where(['pt.isActive'=>1])
            ->join('product_translates as pt','pt.product_id', '=', 'p.id')
            ->select('pt.*')
            ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/product/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-product/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-product') }}">Add Product</a>
        </li>
        <li <?php if(preg_match("/view-products/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-products') }}">View Products</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Promotions</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('promotions as p')->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/promotion/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-promotion/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-promotion') }}">Add Promotion</a>
        </li>
        <li <?php if(preg_match("/view-promotions/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-promotions') }}">View Promotions</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Product Units</span> 
        <span class="label label-important">
          {!!
              $count=\Illuminate\Support\Facades\DB::table('product_units as pu')
              ->where(['put.isActive'=>1])
              ->join('product_unit_translates as put','put.product_unit_id', '=', 'pu.id')
              ->select('put.*')
              ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/prod-unit/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-prod-unit/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-prod-unit') }}">Add Product Unit</a>
        </li>
        <li <?php if(preg_match("/view-prod-units/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-prod-units') }}">View Product Units</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Price Units</span> 
        <span class="label label-important">
          {!!
              $count=\Illuminate\Support\Facades\DB::table('price_units as pu')
              ->where(['put.isActive'=>1])
              ->join('price_unit_translates as put','put.price_unit_id', '=', 'pu.id')
              ->select('put.*')
              ->count()
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/price-unit/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-price-unit/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-price-unit') }}">Add Price Unit</a>
        </li>
        <li <?php if(preg_match("/view-price-units/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-price-units') }}">View Price Units</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Orders</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('orders')
          ->where('isDeleted','=','0')
          ->where('deleted_at','=',Null)
          ->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/order/i", $url)){?>  style="display:block;" <?php } ?>>
        <!-- <li <?php if(preg_match("/add-order/i", $url)){?>  style="display:block;" <?php } ?>><a href="{{ url('/admin/add-order') }}">Add Order</a></li> -->
        <li <?php if(preg_match("/view-order/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-order') }}">View Orders</a>
        </li>
      </ul>
    </li>
    <!-- <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Customers</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('users as u')
            ->where(['mhr.role_id'=> 5])
            ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
            ->select('u.*')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/customer/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/view-customer/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-customer') }}">View Customers</a>
        </li>
      </ul>
    </li> -->
    <li id="privilege_vendors" class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Vendor Setup</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('users as u')
            ->where(['mhr.role_id'=> 3])
            ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
            ->select('u.*')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/vendors/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/view-vendors/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-vendors') }}">View Vendor</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Sub Admin Setup</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('users as u')
            ->where(['mhr.role_id'=> 2])
            ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
            ->select('u.*')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/sub-admin/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/create-sub-admin/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/create-sub-admin') }}">Add SubAdmin</a>
        </li>
        <li <?php if(preg_match("/view-sub-admin/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-sub-admin') }}">View SubAdmins</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Rider/Driver Setup</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('riders as r')
            ->where(['r.isActive'=> 1])
            ->select('r.*')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/rider/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/create-rider/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/create-rider') }}">Add Rider</a>
        </li>
        <li <?php if(preg_match("/view-rider/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-rider') }}">View Rider</a>
        </li>
      </ul>
    </li>
    <!-- Support Chat -->
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Support Chat</span> 
        <span class="label label-important">
          {!!
            $count=\Illuminate\Support\Facades\DB::table('support_chat_rooms')
            ->count();
          !!}
        </span>
      </a>
      <ul <?php if(preg_match("/support-chat/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/view-support-chat/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-support-chat') }}">View All Chat List</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Countries</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('countries')
          ->where('isDeleted','=','0')
          ->where('isActive','=',1)
          ->count() !!}
        </span>
     </a>
      <ul <?php if(preg_match("/country/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-country/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-country') }}">Add Country</a>
        </li>
        <li <?php if(preg_match("/view-country/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-country') }}">View Country</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>States</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('states')
          ->where('isDeleted','=','0')
          ->where('isActive','=',1)
          ->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/state/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-state/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-state') }}">Add State</a>
        </li>
        <li <?php if(preg_match("/view-state/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-state') }}">View State</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Cities</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('cities')
          ->where('isDeleted','=','0')
          ->where('isActive','=',1)
          ->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/city/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-city/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-city') }}">Add Cites</a>
        </li>
        <li <?php if(preg_match("/view-city/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-city') }}">View Cites</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>City Areas</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('city_areas')
          ->where('isActive','=',1)
          ->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/area/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-city-area/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-city-area') }}">Add City Area</a>
        </li>
        <li <?php if(preg_match("/view-city-area/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-city-area') }}">View City Area</a>
        </li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#">
        <i class="icon icon-th-list"></i> 
        <span>Delivery Zone Charges</span> 
        <span class="label label-important">
          {!! $count=\Illuminate\Support\Facades\DB::table('shippingcosts')
          ->where('isDeleted','=','0')
          ->where('deleted_at','=',Null)
          ->count() !!}
        </span>
      </a>
      <ul <?php if(preg_match("/zone/i", $url)){?>  style="display:block;" <?php } ?>>
        <li <?php if(preg_match("/add-zone/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/add-zone') }}">Add Delivery Zone</a>
        </li>
        <li <?php if(preg_match("/view-zone/i", $url)){?>  class="active" <?php } ?>>
          <a href="{{ url('/admin/view-zone') }}">View Delivery Zone</a>
        </li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->
