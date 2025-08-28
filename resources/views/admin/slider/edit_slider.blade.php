@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Slider</a> <a href="#" class="current">Add Slider</a> </div>
    <h1>Slider</h1>
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
                      <h5>Add Slider</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-slider/'.$slider->id) }}" name="add_slider" id="add_slider" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>
                          <div class="control-group">
                            <label class="control-label"><strong>Image</strong></label>
                            <div class="controls">
                              <input name="image" id="image" type="file" />
                              <input type="hidden" name="cur_image" value="{{ $slider->image }}">
                              @if(!empty( $slider->image ))
                                <img src=" {{ asset('/images/backend_images/slider/'.$slider->image ) }}" alt="slider-image" width="150">
                              @endif
                              <span style="color: red;">Image size is 1800x300 required.</span>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>En Title</strong></label>
                            <div class="controls">
                              <input type="text" name="en_title" id="en_title" value="{{ $slider->en_title }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Title</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_title" id="ar_title" value="{{ $slider->ar_title }}">
                            </div>
                          </div>                          
                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($slider->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($slider->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Slider" class="btn btn-success">
                              <a href="{{ url('/admin/view-sliders' ) }}">
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
