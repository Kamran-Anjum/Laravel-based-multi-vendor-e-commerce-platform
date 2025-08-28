@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">We Provide/Serve Card</a> <a href="#" class="current">Edit We Provide/Serve Card</a> </div>
    <h1>We Provide/Serve Card</h1>
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
                      <h5>Edit We Provide/Serve Card</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-we-serve-card/'.$we_serve_provide->id) }}" name="add_we_serve_provide" id="add_we_serve_provide" novalidate="novalidate"> {{ csrf_field() }}
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
                              <input type="hidden" name="cur_image" value="{{ $we_serve_provide->image }}">
                              @if(!empty( $we_serve_provide->image ))
                                <img src=" {{ asset('/images/backend_images/we_serve_provide/'.$we_serve_provide->image ) }}" alt="we_serve_provide-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 100x100 required.</span>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>En Title</strong></label>
                            <div class="controls">
                              <input type="text" name="en_title" id="en_title" value="{{ $we_serve_provide->en_title }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>En Text</strong></label>
                            <div class="controls">
                              <input type="text" name="en_text" id="en_text" value="{{ $we_serve_provide->en_title_2 }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Title</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_title" id="ar_title" value="{{ $we_serve_provide->ar_title }}">
                            </div>
                          </div>  
                          <div class="control-group">
                            <label class="control-label"><strong>Ar Text</strong></label>
                            <div class="controls">
                              <input type="text" name="ar_text" id="ar_text" value="{{ $we_serve_provide->ar_title_2 }}">
                            </div>
                          </div>              

                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($we_serve_provide->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($we_serve_provide->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Home Banner" class="btn btn-success">
                              <a href="{{ url('/admin/view-we-serve-cards' ) }}">
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
