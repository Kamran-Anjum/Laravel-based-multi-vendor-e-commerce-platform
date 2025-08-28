@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Delivery Zone Areas</a> <a href="#" class="current">Add Delivery Zone Areas</a> </div>
    <h1>Delivery Zone Areas</h1>
  </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Delivery Zone Areas</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-zone-areas/'.$zone_id) }}" name="edit_shippingcost" id="edit_shippingcost" novalidate="novalidate"> {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                    text-align: left !important;
                    padding-left: 10px !important;
                  }
              </style>

              <div class="control-group">
                  <label class="control-label"><strong>Country:<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                      <select class="countryname" name="country_id" id="country_id">
                          <option value="0" disabled="true" selected="true" >--select country--</option>
                          @foreach($countries as $cont)
                              <option value="{{$cont->id}}">{{$cont->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label"><strong>State:</strong></label>
                  <div class="controls">
                      <select class="statename"  id="state_id" name="state_id">
                          <option value="" disabled="false" selected="true" >--select state--</option>

                      </select>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label"><strong>City:</strong></label>
                  <div class="controls">
                      <select class="cityareaname"  id="city_id" name="city_id">
                          <option value="" disabled="false" selected="true" >--select city--</option>

                      </select>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label"><strong>City Area:</strong></label>
                  <div id="cityareanamemultiple" class="controls checkbox">

                  </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Zone Area" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script id="example">
$('#city_area_id').multiselect({
  enableFiltering: true,
  filterBehavior: 'value'
});
</script>

@endsection
