@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">Edit Brands</a> </div>
    <h1>Brands</h1>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-brand/'.$brand_trans->id ) }}" name="edit_brand" id="edit_brand" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <input type="hidden" name="lang" id="lang" value="{{ $brand_trans->lang }}">
            @if($brand_trans->lang == 'en')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Brand</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>Brand Name</strong></label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{ $brand_trans->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Short Name</strong></label>
                  <div class="controls">
                    <input type="text" name="short_name" id="short_name" value="{{ $brand_trans->short_name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description</strong></label>
                  <div class="controls">
                    <textarea name="description" rows="4" id="description">{{ $brand_trans->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Image</strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file" />
                    <input type="hidden" name="current_image" value="{{ $brand_trans->image }}">
                    @if(!empty( $brand_trans->image ))
                      <img src=" {{ asset('/images/backend_images/brands/en/tiny/'.$brand_trans->image ) }}">
                    @endif
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Active</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($brand_trans->isActive == 0) selected="true" @endif > No </option>
                            <option value="1" @if($brand_trans->isActive == 1) selected="true" @endif> Yes </option>
                        </select>
                    </div>
                </div>
              </div>
              @if($meta_tag_counter == 0)
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Meta Tags</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <div class="control-group">
                      <label class="control-label"><strong>Keywords</strong></label>
                      <div class="controls">
                        <input type="text" name="keywords" id="keywords" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label"><strong>Description</strong></label>
                      <div class="controls">
                        <textarea name="meta_description" id="description" required rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
              <div class="form-actions">
                <input type="submit" value="Edit Brand" class="btn btn-success">
              </div>
            @elseif($brand_trans->lang == 'ar')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>تحرير العلامة التجارية</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>اسم العلامة التجارية</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="name" id="name" value="{{ $brand_trans->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم قصير</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="short_name" id="short_name" value="{{ $brand_trans->short_name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="description" rows="4" id="description">{{ $brand_trans->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة</strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file" />
                    <input type="hidden" name="current_image" value="{{ $brand_trans->image }}">
                    @if(!empty( $brand_trans->image ))
                      <img src=" {{ asset('/images/backend_images/brands/ar/tiny/'.$brand_trans->image ) }}">
                    @endif
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>نشيط</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($brand_trans->isActive == 0) selected="true" @endif >  رقم  </option>
                            <option value="1" @if($brand_trans->isActive == 1) selected="true" @endif>  نعم  </option>
                        </select>
                    </div>
                </div>
              </div>
              @if($meta_tag_counter == 0)
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Meta Tags</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <div class="control-group">
                      <label class="control-label"><strong>Keywords</strong></label>
                      <div class="controls">
                        <input type="text" name="keywords" id="keywords" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label"><strong>Description</strong></label>
                      <div class="controls">
                        <textarea name="meta_description" id="description" required rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
              <div class="form-actions">
                <input type="submit" value="تحرير العلامة التجارية" class="btn btn-success">
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
