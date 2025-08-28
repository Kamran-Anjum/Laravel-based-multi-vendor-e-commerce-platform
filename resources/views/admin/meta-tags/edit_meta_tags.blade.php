@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Meta Tags</a> <a href="#" class="current">Edit Meta Tags</a> </div>
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
      pEditing-left: 10px !important;
    }
  </style>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
          <div class="span12">
              <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                      <h5>Edit Meta Tags</h5>
                  </div>
                  <div class="widget-content nopEditing">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-meta-tag/'.$meta_tag->id) }}" name="Edit_home_banner" id="Edit_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              pEditing-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>Title</strong></label>
                            <div class="controls">
                              <input type="text" name="title" readonly value="{{ $meta_tag->title }}">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Keywords</strong></label>
                            <div class="controls">
                              <input type="text" name="keywords" id="keywords" required value="{{ $meta_tag->keywords }}">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Description</strong></label>
                            <div class="controls">
                              <textarea name="description" id="description" required rows="5">{{ $meta_tag->description }}</textarea>
                            </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Meta Tags" class="btn btn-success">
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
