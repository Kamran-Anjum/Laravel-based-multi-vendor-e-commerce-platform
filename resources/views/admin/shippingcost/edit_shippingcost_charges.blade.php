@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Delivery Zone Charges</a> <a href="#" class="current">Edit Delivery Zone Charges</a> </div>
    <h1>Delivery Zone Charges</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Delivery Zone Charges</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-zone-charges/'.$shippingzonecharges->id ) }}" name="edit_shippingcost" id="edit_shippingcost" novalidate="novalidate"> {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                    text-align: left !important;
                    padding-left: 10px !important;
                  }
              </style>

              <input type="hidden" name="shipping_cost_id" value="{{ $shippingzonecharges->shipping_cost_id }}">

              <div class="control-group">
                <label class="control-label"><strong>Weight Upto <small>(In Grams)</small>:<span style="color:red;">*</span></strong></label>
                <div class="controls">
                  <input type="number" name="weight_up_to" id="weight_up_to" value="{{ $shippingzonecharges->weight_up_to }}" required="">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label"><strong>Amount/Cost:<span style="color:red;">*</span></strong></label>
                <div class="controls">
                  <input type="number" name="cost" id="cost" value="{{ $shippingzonecharges->cost }}" required="">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit Zone Charges" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
