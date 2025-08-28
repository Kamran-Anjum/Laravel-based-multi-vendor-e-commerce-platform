@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">About</a> 
      <a href="#" class="current">About Details</a> 
    </div>
    <h1>About Details</h1>
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
            <h5>About Details</h5>
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
                <label class="control-label"><strong>Image:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/about/'.$about->image ) }}" alt="about" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Image 2:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/about/'.$about->image_2 ) }}" alt="about" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Image 3:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('/images/backend_images/about/'.$about->image_3 ) }}" alt="about" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>En Title:</strong></label>
                <label class="control-label">{{ $about->en_title }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Ar Title:</strong></label>
                <label class="control-label">{{ $about->ar_title }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>En Description:</strong></label>
                <label class="control-label">{!! html_entity_decode($about->en_description) !!}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Ar Description:</strong></label>
                <label class="control-label">{!! html_entity_decode($about->ar_description) !!}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Active:</strong></label>
                <label class="control-label">@if($about->isActive == 0) No @else Yes @endif</label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
