@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Delivery Zone</a> <a href="#" class="current">Edit Delivery Zone</a> </div>
    <h1>Delivery Zone</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Delivery Zone</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-zone/'.$shippingcostDetails->id ) }}" name="edit_shippingcost" id="edit_shippingcost" novalidate="novalidate"> {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                    text-align: left !important;
                    padding-left: 10px !important;
                  }
              </style>

              <div class="control-group">
                <label class="control-label"><strong>Zone Name:<span style="color:red;">*</span></strong></label>
                <div class="controls">
                  <input type="text" name="zone_name" id="zone_name" style="width:50%;" value="{{ $shippingcostDetails->zone_name }}">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label"><strong>Zone Charges:<span style="color:red;">*</span></strong></label>
                <div class="controls">
                  <input type="number" name="shippingCost" id="shippingCost" style="width:50%;" value="{{ $shippingcostDetails->shippingCost }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Amount Limit:<span style="color:red;">*</span></strong></label>
                <div class="controls">
                  <input type="number" name="amountLimit" id="amountLimit"  value="{{$shippingcostDetails->amountLimit}}">
                </div>
              </div> -->

              <div class="form-actions">
                <input type="submit" value="Edit Zone" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
