@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Categories</a> </div>
    <h1>Categories</h1>
  </div>
  <style>
    .form-horizontal .control-label {
      text-align: left !important;
      padding-left: 10px !important;
    }
  </style>
  <div class="container-fluid"><hr>
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>

      @endif
      @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{!! session('flash_message_success') !!}</strong>
        </div>
      @endif
    <div class="row-fluid">
      <div class="span12">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Category</h5>
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
                  <label class="control-label"><strong>Name</strong></label>
                  <div class="controls">
                    <input type="text" name="en_category_name" id="en_category_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Level</strong></label>
                  <div class="controls">
                    <select name="en_parent_id" id="en_parent_id">
                      <option value="0">Main Category</option>
                      @foreach($en_levels as $val)
                      <option value="{{ $val->category_id }}"> {{ $val->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description</strong></label>
                  <div class="controls">
                    <textarea rows="4" name="en_description" id="en_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Image</strong></label>
                  <div class="controls">
                    <input name="en_image" id="en_image" type="file" required />
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
                  <label class="control-label"><strong>اسم</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_category_name" id="ar_category_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>مستوى</strong></label>
                  <div class="controls">
                    <select name="ar_parent_id" id="ar_parent_id">
                      <option value="0">الفئة الرئيسية</option>
                      @foreach($ar_levels as $val)
                      <option value="{{ $val->category_id }}"> {{ $val->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" rows="4" name="ar_description" id="ar_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة</strong></label>
                  <div class="controls">
                    <input name="ar_image" id="ar_image" type="file" required />
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
            <input style="padding: 5px 50px; font-size: 15px;" id="sub_both_data" type="submit" value="Add Category / إضافة فئة" class="btn btn-success">
          </div>
          <div id="sub_en" style="text-align: left; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Category" class="btn btn-success">
          </div>
          <div id="sub_ar" style="text-align: right; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="إضافة فئة" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
