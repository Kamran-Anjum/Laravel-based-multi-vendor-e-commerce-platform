@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Price Units</a> <a href="#" class="current">Add Price Unit</a> </div>
    <h1>Price Units</h1>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-price-unit') }}" name="add_price_unit" id="add_price_unit" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Price Unit</h5>
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
                    <input type="text" name="en_name" id="en_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Code</strong></label>
                  <div class="controls">
                    <input type="text" name="en_code" id="en_code">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Short Name</strong></label>
                  <div class="controls">
                    <input type="text" name="en_short_name" id="en_short_name">
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
                    <input dir="rtl" type="text" name="ar_name" id="ar_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>رمز</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_code" id="ar_code">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم قصير</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_short_name" id="ar_short_name">
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
          <div id="sub_both" style="text-align: center;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Price Unit / أضف وحدة السعر" class="btn btn-success">
          </div>
          <div id="sub_en" style="text-align: left; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Price Unit" class="btn btn-success">
          </div>
          <div id="sub_ar" style="text-align: right; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="أضف وحدة السعر" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
