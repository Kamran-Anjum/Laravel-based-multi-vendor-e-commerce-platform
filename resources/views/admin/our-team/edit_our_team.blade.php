@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Our Team</a> <a href="#" class="current">Edit Our Team</a> </div>
    <h1>Our Team</h1>
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
                      <h5>Edit Our Team</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-our-team/'.$our_team->id) }}" name="add_our_team" id="add_our_team" novalidate="novalidate"> {{ csrf_field() }}
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
                              <input type="hidden" name="cur_image" value="{{ $our_team->image }}">
                              @if(!empty( $our_team->image ))
                                <img src=" {{ asset('/images/backend_images/our-team/'.$our_team->image ) }}" alt="our_team-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 300x300 required.</span>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Name</strong></label>
                            <div class="controls">
                              <input type="text" name="name" id="name" value="{{ $our_team->name }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Job Post</strong></label>
                            <div class="controls">
                              <input type="text" name="job_post" id="job_post" value="{{ $our_team->job_post }}">
                            </div>
                          </div>             

                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($our_team->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($our_team->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Our Team" class="btn btn-success">
                              <a href="{{ url('/admin/view-our-team' ) }}">
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
