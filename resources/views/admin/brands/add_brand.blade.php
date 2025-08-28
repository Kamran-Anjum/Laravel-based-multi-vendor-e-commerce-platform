@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">Add Brands</a> </div>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-brand') }}" name="add_brand" id="add_brand" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Brand</h5>
            </div>
            <div class="widget-content nopadding">
              <div class="control-group">
                  <label class="control-label">Language</label>
                  <div class="controls">
                      <select class="language_class" name="lang_dropdown" id="lang_dropdown">
                        <option value="both">English-Arabic (Both)</option>
                        <option value="en">English</option>
                        <option value="ar">Arabic</option>
                      </select>
                  </div>
              </div>
            </div>
          </div>
          <div style="display: flex !important">
            <div style="width: 50% !important" id="en_div" class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
                <h5>English</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>Brand Name</strong></label>
                  <div class="controls">
                    <input type="text" name="en_name" id="en_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Short Name</strong></label>
                  <div class="controls">
                    <input type="text" name="en_short_name" id="en_short_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description</strong></label>
                  <div class="controls">
                    <textarea name="en_description" rows="4" id="en_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Image</strong></label>
                  <div class="controls">
                    <input name="en_image" id="en_image" type="file" />
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Active</strong></label>
                    <div class="controls">
                        <select id="en_isActive" name="en_isActive" class="Active">
                            <option value="0"> No </option>
                            <option value="1" selected="true"> Yes </option>
                        </select>
                    </div>
                </div>
              </div>
            </div>
            <div style="width: 5% !important"></div>
            <div style="width: 50% !important" id="ar_div" class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
                <h5>عربى</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>اسم العلامة التجارية</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_name" id="ar_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم قصير</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_short_name" id="ar_short_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="ar_description" rows="4" id="ar_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة</strong></label>
                  <div class="controls">
                    <input name="ar_image" id="ar_image" type="file" />
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>نشيط</strong></label>
                    <div class="controls">
                        <select id="ar_isActive" name="ar_isActive" class="Active">
                            <option value="0"> رقم </option>
                            <option value="1" selected="true"> نعم </option>
                        </select>
                    </div>
                </div>
              </div>
            </div>
          </div>
          
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

          <div id="sub_both" style="text-align: center;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Brand / أضف العلامة التجارية" class="btn btn-success">
          </div>
          <div id="sub_en" style="text-align: left; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Brand" class="btn btn-success">
          </div>
          <div id="sub_ar" style="text-align: right; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="أضف العلامة التجارية" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
