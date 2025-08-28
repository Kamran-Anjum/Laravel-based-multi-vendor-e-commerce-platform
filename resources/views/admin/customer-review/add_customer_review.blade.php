@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Our Team</a> <a href="#" class="current">Add Our Team</a> </div>
    <h1>Our Team</h1>
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
                      <h5>Add Our Team</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-customer-review') }}" name="add_home_banner" id="add_home_banner" novalidate="novalidate"> {{ csrf_field() }}
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
                              <span style="color: red;">Image size is 300x300 required.</span>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Name</strong></label>
                            <div class="controls">
                              <input type="text" name="name" id="name" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Job Post</strong></label>
                            <div class="controls">
                              <input type="text" name="job_post" id="job_post">
                            </div>
                          </div>    
                          <div class="control-group">
                            <label class="control-label"><strong>Review</strong></label>
                            <div class="controls">
                              <textarea name="review"></textarea>
                            </div>
                          </div>                          

                          <div class="form-actions">
                              <input type="submit" value="Add Our team" class="btn btn-success">
                              <a href="{{ url('/admin/view-customer-reviews' ) }}">
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
