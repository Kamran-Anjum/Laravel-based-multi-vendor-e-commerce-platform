@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">About</a> <a href="#" class="current">About</a> </div>
    <h1>About</h1>
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
                      <h5>About</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-about') }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>Image</strong></label>
                            <div class="controls">
                              <input name="image" id="image" type="file" required />
                              <span style="color: red;">Image size is 486x800 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Image 2</strong></label>
                            <div class="controls">
                              <input name="image_2" id="image_2" type="file" required />
                              <span style="color: red;">Image size is 1000x800 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Image 3</strong></label>
                            <div class="controls">
                              <input name="image_3" id="image_3" type="file" required />
                              <span style="color: red;">Image size is 1000x800 required.</span>
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

                          <div class="control-group">
                            <label class="control-label"><strong>En Description</strong></label>
                            <div class="controls">
                              <textarea name="en_description" id="texteditor"></textarea>
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Description</strong></label>
                            <div class="controls">
                              <textarea name="ar_description" id="texteditornew"></textarea>
                            </div>
                          </div>  

                          <div class="form-actions">
                              <input type="submit" value="Add About" class="btn btn-success">
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
