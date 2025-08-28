@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">About</a> <a href="#" class="current">Edit About</a> </div>
    <h1>About</h1>
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
                      <h5>Edit About</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-about/'.$about->id) }}" name="add_about" id="add_about" novalidate="novalidate"> {{ csrf_field() }}
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
                              <input type="hidden" name="cur_image" value="{{ $about->image }}">
                              @if(!empty( $about->image ))
                                <img src=" {{ asset('/images/backend_images/about/'.$about->image ) }}" alt="about-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 486x800 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Image 2</strong></label>
                            <div class="controls">
                              <input name="image_2" id="image_2" type="file" />
                              <input type="hidden" name="cur_image_2" value="{{ $about->image_2 }}">
                              @if(!empty( $about->image_2 ))
                                <img src=" {{ asset('/images/backend_images/about/'.$about->image_2 ) }}" alt="about-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 1000x800 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Image 3</strong></label>
                            <div class="controls">
                              <input name="image_3" id="image_3" type="file" />
                              <input type="hidden" name="cur_image_3" value="{{ $about->image_3 }}">
                              @if(!empty( $about->image_3 ))
                                <img src=" {{ asset('/images/backend_images/about/'.$about->image_3 ) }}" alt="about-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 1000x800 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>En Title</strong></label>
                            <div class="controls">
                              <input type="text" name="en_title" id="en_title" value="{{ $about->en_title }}">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Ar Title</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_title" id="ar_title" value="{{ $about->ar_title }}">
                            </div>
                          </div>     

                          <div class="control-group">
                            <label class="control-label"><strong>En Description</strong></label>
                            <div class="controls">
                              <textarea name="en_description" id="texteditor">{{ $about->en_description }}</textarea>
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Description</strong></label>
                            <div class="controls">
                              <textarea name="ar_description" id="texteditornew">{{ $about->ar_description }}</textarea>
                            </div>
                          </div>        

                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($about->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($about->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit About" class="btn btn-success">
                              <a href="{{ url('/admin/view-about' ) }}">
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
