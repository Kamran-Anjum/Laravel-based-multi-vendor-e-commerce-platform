@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Units</a> <a href="#" class="current">Edit Product Units</a> </div>
    <h1>Product Units</h1>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-prod-unit/'.$product_unit_trans->id ) }}" name="edit_product_unit" id="edit_product_unit" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <input type="hidden" name="lang" id="lang" value="{{ $product_unit_trans->lang }}">
            @if($product_unit_trans->lang == 'en')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Product Unit</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>Name</strong></label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{ $product_unit_trans->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>code</strong></label>
                  <div class="controls">
                    <input type="text" name="code" id="code" value="{{ $product_unit_trans->code }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Short Name</strong></label>
                  <div class="controls">
                    <input type="text" name="short_name" id="short_name" value="{{ $product_unit_trans->shortName }}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Active</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($product_unit_trans->isActive == 0) selected="true" @endif > No </option>
                            <option value="1" @if($product_unit_trans->isActive == 1) selected="true" @endif> Yes </option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Product Unit" class="btn btn-success">
              </div>
            @elseif($product_unit_trans->lang == 'ar')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>تحرير العلامة التجارية</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>اسم</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="name" id="name" value="{{ $product_unit_trans->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>الشفرة</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="code" id="code" value="{{ $product_unit_trans->code }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم قصير</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="short_name" id="short_name" value="{{ $product_unit_trans->shortName }}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>نشيط</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($product_unit_trans->isActive == 0) selected="true" @endif >  رقم  </option>
                            <option value="1" @if($product_unit_trans->isActive == 1) selected="true" @endif>  نعم  </option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="تحرير وحدة المنتج" class="btn btn-success">
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
