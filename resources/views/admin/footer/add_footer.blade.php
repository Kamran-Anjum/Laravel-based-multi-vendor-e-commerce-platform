@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Add Footer</a> <a href="#" class="current">Add Footer</a> </div>
    <h1>Add Footer</h1>
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
                      <h5>Contact Info</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-footer-item') }}" name="add_footer" id="add_footer" novalidate="novalidate"> {{ csrf_field() }}
                          <style>
                          .form-horizontal .control-label {
                              text-align: left !important;
                              padding-left: 10px !important;
                            }
                          </style>

                          <div class="control-group">
                            <label class="control-label"><strong>E-mail<span class="text-danger">*</span></strong></label>
                            <div class="controls">
                              <input type="email" name="email" id="email" placeholder="info@example.com" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Phone<span class="text-danger">*</span></strong></label>
                            <div class="controls">
                              <input type="text" name="phone_1" id="phone_1" placeholder="+92-346-0329659" required>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Phone 2</strong></label>
                            <div class="controls">
                              <input type="text" name="phone_2" id="phone_2" placeholder="+92-346-0329659">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label"><strong>Address<span class="text-danger">*</span></strong></label>
                            <div class="controls">
                              <textarea name="address" id="address" rows="5" required></textarea>
                            </div>
                          </div>

                           <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                              <h5>Social Info</h5>
                          </div>

                            <div class="control-group">
                                <label class="control-label">Facebook</label>
                                <div class="controls">
                                    <input type="text" id="facebook" name="facebook" placeholder="https://www.facebook.com/yourname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Google</label>
                                <div class="controls">
                                    <input type="text" id="google" name="google" placeholder="https://www.google.com/yourname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Instagram</label>
                                <div class="controls">
                                    <input type="text" id="instagram" name="instagram" placeholder="https://www.instagram.com/yourname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Linkedin</label>
                                <div class="controls">
                                    <input type="text" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/yourname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Twitter</label>
                                <div class="controls">
                                    <input type="text" id="twitter" name="twitter" placeholder="https://www.twitter.com/yourname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Youtube</label>
                                <div class="controls">
                                    <input type="text" id="youtube" name="youtube" placeholder="https://www.youtube.com/yourname">
                                </div>
                            </div>

                          <div class="form-actions">
                              <input type="submit" value="Add Footer" class="btn btn-success">
                              <a href="{{ url('/admin/view-footer-item' ) }}">
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
