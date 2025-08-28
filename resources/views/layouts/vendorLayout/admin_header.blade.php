Header-part-->
<div id="header">
  <h1><a href="{{ url('/vendor/dashboard') }}">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="{{ url('/vendor/settings') }}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="{{ url('/vendor/logout') }}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <span class="text">City : </span>
  <select class="vendor_privilege_city_class" name="vendor_privilege_cityid" id="vendor_privilege_cityid">
      @foreach($vendor_citiess as $vendor_citi)
        @if(session()->get('VendorActiveCity') == $vendor_citi->cityId)
            <option selected value="{{$vendor_citi->cityId}}">{{$vendor_citi->cityName}}</option>
        @else
            <option value="{{$vendor_citi->cityId}}">{{$vendor_citi->cityName}}</option>
        @endif
      @endforeach
  </select>
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch