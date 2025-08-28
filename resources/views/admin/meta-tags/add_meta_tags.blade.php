@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Meta Tags</a> <a href="#" class="current">Add Meta Tags</a> </div>
    <h1>Meta Tags</h1>
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
                      <h5>Add Meta Tags</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-meta-tags') }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>Title</strong></label>
                            <div class="controls">
                              <select class="country" name="title" id="country_id" required>
                                  <option value="0" disabled="true" selected="true" >--select--</option>
                                  <option value="Lilac" >Home</option>
                                  <option value="Shop" >Shop</option>
                                  <option value="About" >About</option>
                                  <option value="Contact" >Contact</option>
                              </select>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Keywords</strong></label>
                            <div class="controls">
                              <input type="text" name="keywords" id="keywords" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Description</strong></label>
                            <div class="controls">
                              <textarea name="description" id="description" required rows="5"></textarea>
                            </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Add Meta Tags" class="btn btn-success">
                              <a href="{{ url('/admin/view-meta-tags' ) }}">
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
