@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Home Banner</a> <a href="#" class="current">Add Home Banner</a> </div>
    <h1>Home Banner</h1>
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
                      <h5>Add Home Banner</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-home-banner') }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>
                          <div class="control-group">
                              <label class="control-label"><strong>Banner Place</strong></label>
                              <div class="controls">
                                  <select class="countryname" name="condition" id="condition_id">
                                      <option value="" disabled="true" selected="true" >Select</option>
                                      <option value="1">Full Banner</option>
                                      <option value="2">Side By Side Banner</option>
                                      <option value="3">Bottom Left Banner</option>
                                  </select>
                              </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Image</strong></label>
                            <div class="controls">
                              <input name="image" id="image" type="file" required />
                              <span id="full_b_img" style="color: red;">Image size is 1920x800 required.</span>
                              <span id="half_b_img" class="hidden" style="color: red;">Image size is 600x300 required.</span>
                              <span id="leftside_b_img" class="hidden" style="color: red;">Image size is 1000x1500 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>En Title</strong></label>
                            <div class="controls">
                              <input type="text" name="en_title" id="en_title">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Ar Title</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_title" id="ar_title">
                            </div>
                          </div>

                          <div class="hidden" id="side_by_side">
                            <div class="control-group">
                              <label class="control-label"><strong>Image 2</strong></label>
                              <div class="controls">
                                <input name="image_2" id="image_2" type="file" required />
                                <span id="half_b_img" style="color: red;">Image size is 600x300 required.</span>
                              </div>
                            </div>

                            <div class="control-group">
                              <label class="control-label"><strong>En Title 2</strong></label>
                              <div class="controls">
                                <input type="text" name="en_title_2" id="en_title_2">
                              </div>
                            </div>

                            <div class="control-group" id="">
                              <label class="control-label"><strong>Ar Title 2</strong></label>
                              <div class="controls">
                                <input type="text" name="ar_title_2" id="ar_title_2">
                              </div>
                            </div>
                          </div>
                            

                          <div class="form-actions">
                              <input type="submit" value="Add Home Banner" class="btn btn-success">
                              <a href="{{ url('/admin/view-home-banners' ) }}">
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
