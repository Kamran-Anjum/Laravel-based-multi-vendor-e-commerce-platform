@extends('layouts.riderLayout.rider_design')
@section('content')



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">View Order</a> 
      <a href="#" class="current">Order Location</a> 
    </div>
    <h1>Order Location</h1>
    @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! session('flash_message_error') !!}</strong>
      </div>
    @endif
    @if(Session::has('flash_message_success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! session('flash_message_success') !!}</strong>
      </div>
    @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Order Location</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="" action="" > 
              {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                  text-align: left !important;
                  padding-left: 10px !important;
                }
              </style>
              @foreach($orders as $order)
              <div class="control-group">
                <label class="control-label"><strong>Street Address:</strong></label>
                <label class="control-label">{{ $order->streetAddress }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Building Address:</strong></label>
                <label class="control-label">{{ $order->buildingAddress }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Shipping Addredd:</strong></label>
                <label class="control-label">{{ $order->shipToAddress }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Billing Address:</strong></label>
                <label class="control-label">{{ $order->billToAddress }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Location:</strong></label>
                <div id="address-map-container" style="width:100%;height:500px;">
                    <div style="width: 100%; height: 100%" id="map"></div>
                </div>
              </div>
              <?php $latitude = $order->latitude; ?>
                <?php $longitude = $order->longitude; ?>
                <script type="text/javascript">
                    function initMap() {
                        var lat = <?php echo $latitude ?>;
                        var long = <?php echo $longitude ?>;

                      const myLatLng = { lat: lat, lng: long };
                      const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 18,
                        center: myLatLng,
                      });
              
                      new google.maps.Marker({
                        position: myLatLng,
                        map,
                        title: "Location!",
                      });
                    }
              
                    window.initMap = initMap;

                </script>
              @endforeach
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    @parent
  
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" ></script>
  
@endsection
