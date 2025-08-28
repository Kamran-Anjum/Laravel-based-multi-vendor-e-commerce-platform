@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Home Banner</a> <a href="#" class="current">Edit Home Banner</a> </div>
    <h1>Home Banner</h1>
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
                      <h5>Edit Home Banner</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-home-banner/'.$home_banner->id) }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>
                          <?php
                              if($home_banner->condition == 1){
                                  $condition = 'Full Banner';
                              }elseif($home_banner->condition == 2){
                                  $condition = 'Side By Side Banner';
                              }elseif($home_banner->condition == 3){
                                  $condition = 'Bottom Left Banner';
                              }
                          ?> 
                          <div class="control-group">
                            <label class="control-label"><strong>Condition</strong></label>
                            <div class="controls">
                              <input type="text" name="condition" readonly value="{{ $condition }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Image</strong></label>
                            <div class="controls">
                              <input name="image" id="image" type="file" />
                              <input type="hidden" name="cur_image" value="{{ $home_banner->image }}">
                              @if(!empty( $home_banner->image ))
                                <img src=" {{ asset('/images/backend_images/home_banner/'.$home_banner->image ) }}" alt="home_banner-image" width="150">
                              @endif
                              @if($home_banner->condition == 1)
                                <span style="color: red;">Image size is 1920x800 required.</span>
                              @elseif($home_banner->condition == 2)
                                <span style="color: red;">Image size is 600x300 required.</span>
                              @elseif($home_banner->condition == 3)
                                <span style="color: red;">Image size is 1000x1500 required.</span>
                              @endif
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>En Title</strong></label>
                            <div class="controls">
                              <input type="text" name="en_title" id="en_title" value="{{ $home_banner->en_title }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Title</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_title" id="ar_title" value="{{ $home_banner->ar_title }}">
                            </div>
                          </div>              

                          @if($home_banner->condition == 2)
                            <div class="control-group">
                              <label class="control-label"><strong>Image 2</strong></label>
                              <div class="controls">
                                <input name="image_2" id="image_2" type="file" required />
                                <input type="hidden" name="cur_image_2" value="{{ $home_banner->image_2 }}">
                                @if(!empty( $home_banner->image_2 ))
                                  <img src=" {{ asset('/images/backend_images/home_banner/'.$home_banner->image_2 ) }}" alt="home_banner-image" width="150">
                                @endif
                                <span style="color: red;">Image size is 600x300 required.</span>
                              </div>
                            </div>

                            <div class="control-group">
                              <label class="control-label"><strong>En Title 2</strong></label>
                              <div class="controls">
                                <input type="text" name="en_title_2" id="en_title_2" value="{{ $home_banner->en_title_2 }}">
                              </div>
                            </div>

                            <div class="control-group" id="">
                              <label class="control-label"><strong>Ar Title 2</strong></label>
                              <div class="controls">
                                <input type="text" name="ar_title_2" id="ar_title_2" value="{{ $home_banner->ar_title_2 }}">
                              </div>
                            </div>
                          @else
                            <input type="hidden" name="cur_image_2" value="{{ $home_banner->image_2 }}">
                            <input type="hidden" name="en_title_2" value="{{ $home_banner->en_title_2 }}">
                            <input type="hidden" name="ar_title_2" value="{{ $home_banner->ar_title_2 }}">
                          @endif

                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($home_banner->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($home_banner->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Home Banner" class="btn btn-success">
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
