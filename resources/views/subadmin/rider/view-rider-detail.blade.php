@extends('layouts.subadminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">Rider</a> 
      <a href="#" class="current">Rider Details</a> 
    </div>
    <h1>Rider Details</h1>
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
            <h5>Rider Details</h5>
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
              <div class="control-group">
                <label class="control-label"><strong>Name:</strong></label>
                <label class="control-label">{{ $rider->name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>E-mail:</strong></label>
                <label class="control-label">{{ $rider->email }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Date Of Birth:</strong></label>
                <label class="control-label">{{ $rider->d_o_b }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Unique ID:</strong></label>
                <label class="control-label">{{ $rider->unique_id }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Nationality:</strong></label>
                <label class="control-label">{{ $rider->nationality }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Country:</strong></label>
                <label class="control-label">{{ $rider->countryName }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>City:</strong></label>
                <label class="control-label">{{ $rider->cityName }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Address:</strong></label>
                <label class="control-label">{{ $rider->address }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Contact 1:</strong></label>
                <label class="control-label">{{ $rider->phone_1 }}</label>
              </div>

              <div class="control-group">
                <label class="control-label"><strong>Contact 2:</strong></label>
                <label class="control-label">{{ $rider->phone_2 }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Rider Image:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/rider/'.$rider->image ) }}" alt="Click To View" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Rider ID Image:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/rider/id/'.$rider->id_image ) }}" alt="Click To View" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>License Number:</strong></label>
                <label class="control-label">{{ $rider->license_number }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>License Expairy:</strong></label>
                <label class="control-label">{{ $rider->license_expiry }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>License Image:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/rider/license/'.$rider->license_image ) }}" alt="Click To DOWNLOAD" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Added By:</strong></label>
                <label class="control-label">{{ $rider->addedBy_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Is Verified:</strong></label>
                <label class="control-label">{{ $rider->is_verified }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Status:</strong></label>
                <label class="control-label">{{ $rider->status }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Rider Active:</strong></label>
                <label class="control-label">@if($rider->isActive == 0) No @else Yes @endif</label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
