@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Promotion</a> <a href="#" class="current">Add Promotion</a> </div>
    <h1>Promotion</h1>
    @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{!! session('flash_message_error') !!}</strong>
      </div>
    @endif
  </div>
  <style>
    .form-horizontal .control-label {
      text-align: left !important;
      padding-left: 10px !important;
    }
  </style>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
          <div class="span12">
              <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                      <h5>Add Promotion</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-promotion') }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>Name</strong></label>
                            <div class="controls">
                              <input type="text" name="name" id="name" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Amount</strong></label>
                            <div class="controls">
                              <input type="number" name="amount" min="0" max="100" id="amount" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Type</strong></label>
                            <div class="controls">
                              <select class="country" name="type" id="type" required>
                                  <!-- <option value="Fixed" >Fixed</option> -->
                                  <option value="Percentage" selected>Percentage</option>
                              </select>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>From</strong></label>
                            <div class="controls">
                              <input type="date" name="from_date" id="from_date" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>To</strong></label>
                            <div class="controls">
                              <input type="date" name="to_date" id="to_date" required>
                            </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Add Promotion" class="btn btn-success">
                              <a href="{{ url('/admin/view-promotions' ) }}">
                                <button type="button" class="btn btn-info">Cancel</button>
                              </a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
