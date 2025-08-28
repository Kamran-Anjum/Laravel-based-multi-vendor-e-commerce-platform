@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customers</a> <a href="#" class="current">Edit Customers</a> </div>
    <h1>Customers</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Customer</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-customer/'.$customers->id ) }}" > {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                    text-align: left !important;
                    padding-left: 10px !important;
                  }
                  </style>
            <div class="control-group">
                <label class="control-label"><strong>Username:</strong></label>
                <label class="control-label">{{ $customers->username }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>First Name:</strong></label>
                <label class="control-label">{{ $customers->firstname }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Last Name:</strong></label>
                <label class="control-label">{{ $customers->lastname }}</label>
            </div>

            <div class="control-group">
                <label class="control-label"><strong>Email:</strong></label>
                <label class="control-label">{{ $customers->email }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Country:</strong></label>
                <label class="control-label">{{ $customers->country }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>State:</strong></label>
                <label class="control-label">{{ $customers->state }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>City:</strong></label>
                <label class="control-label">{{ $customers->city }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Address:</strong></label>
                <label class="control-label">{{ $customers->Address1 }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Shipping Address:</strong></label>
                <label class="control-label">{{ $customers->shipToAddress }}</label>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Billing Address:</strong></label>
                <label class="control-label">{{ $customers->billToAddress }}</label>
            </div>

            <div class="control-group">
              <label class="control-label"><strong>Active</strong></label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="chkIsActive" @if ($customers->status == '1') checked @endif />
                  </label>
              </div>
            </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
