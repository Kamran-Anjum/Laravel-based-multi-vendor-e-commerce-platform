@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">VAT</a> <a href="#" class="current">Edit VAT</a> </div>
    <h1>VAT</h1>

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
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
                      <h5>Edit VAT</h5>
                  </div>
                  <div class="widget-content nopEditing">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-vat') }}" name="Edit_home_banner" id="Edit_home_banner" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              pediting-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>VAT</strong></label>
                            <div class="controls">
                              <input type="number" name="vat" value="{{ $vat->vat }}">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Active</strong></label>
                            <div class="controls">
                              <select name="isActive">
                                @if($vat->isActive == 0)
                                  <option value="0" selected>No</option>
                                  <option value="1">Yes</option>
                                @else
                                  <option value="0">No</option>
                                  <option value="1" selected>Yes</option>
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit VAT" class="btn btn-success">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
