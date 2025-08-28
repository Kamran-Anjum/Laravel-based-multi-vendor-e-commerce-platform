@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Delivery Zone Charges</a> <a href="#" class="current">Add Delivery Zone Charges</a> </div>
    <h1>Delivery Zone Charges</h1>
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
            <h5>Add Delivery Zone Charges</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-zone-charges/'.$zone_id) }}" name="edit_shippingcost" id="edit_shippingcost" novalidate="novalidate"> {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                    text-align: left !important;
                    padding-left: 10px !important;
                  }
              </style>

              <div class="fields_wrap">
                <div class="wraper">
                  <button style="height: 35px; margin-left:430px; margin-bottom: -70px" class="mdi mdi-plus add_field btn btn-success">+</button>
                  <div class="control-group">
                    <label class="control-label"><strong>Weight Upto <small>(In Grams)</small>:<span style="color:red;">*</span></strong></label>
                    <div class="controls">
                      <input type="number" name="weight_up_to[]" id="weight_up_to" placeholder="500"  required="">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label"><strong>Amount/Cost:<span style="color:red;">*</span></strong></label>
                    <div class="controls">
                      <input type="number" name="cost[]" id="cost"  required="">
                    </div>
                  </div>
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
