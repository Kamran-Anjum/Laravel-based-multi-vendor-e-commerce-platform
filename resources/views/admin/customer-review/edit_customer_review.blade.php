@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customer Review</a> <a href="#" class="current">Edit Customer Review</a> </div>
    <h1>Customer Review</h1>
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
                      <h5>Edit Customer Review</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-customer-review/'.$customer_review->id) }}" name="add_customer_review" id="add_customer_review" novalidate="novalidate"> {{ csrf_field() }}
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
                              <input type="hidden" name="cur_image" value="{{ $customer_review->image }}">
                              @if(!empty( $customer_review->image ))
                                <img src=" {{ asset('/images/backend_images/customer-review/'.$customer_review->image ) }}" alt="customer_review-image" width="100">
                              @endif
                              <span style="color: red;">Image size is 300x300 required.</span>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Name</strong></label>
                            <div class="controls">
                              <input type="text" name="name" id="name" value="{{ $customer_review->name }}">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"><strong>Job Post</strong></label>
                            <div class="controls">
                              <input type="text" name="job_post" id="job_post" value="{{ $customer_review->job_post }}">
                            </div>
                          </div>  
                          <div class="control-group">
                            <label class="control-label"><strong>Review</strong></label>
                            <div class="controls">
                              <textarea name="review">{{ $customer_review->review }}</textarea>
                            </div>
                          </div>             

                          <div class="control-group">
                              <label class="control-label"><strong>Active</strong></label>
                              <div class="controls">
                                  <select id="isActive" name="isActive" class="Active">
                                      <option value="0" @if($customer_review->isActive == 0) selected="true" @endif > No </option>
                                      <option value="1" @if($customer_review->isActive == 1) selected="true" @endif> Yes </option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-actions">
                              <input type="submit" value="Edit Customer Review" class="btn btn-success">
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
