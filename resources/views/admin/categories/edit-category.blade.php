@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit Categories</a> </div>
    <h1>Categories</h1>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-category/'.$categoryDetails->id ) }}" name="edit_category" id="edit_category" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <input type="hidden" name="lang" id="lang" value="{{ $categoryDetails->lang }}">
            @if($categoryDetails->lang == 'en')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Product Unit</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>Name</strong></label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Level</strong></label>
                  <div class="controls">
                    <select name="parent_id">
                      <option value="0">Main Category</option>
                      @foreach($en_levels as $val)
                      <option value="{{ $val->category_id }}" @if($val->category_id == $categoryDetails->parent_id) @if($val->lang == $categoryDetails->lang) selected @endif @endif> {{ $val->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description</strong></label>
                  <div class="controls">
                    <textarea rows="4" name="description" id="description">{{ $categoryDetails->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Image</strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file" />
                    <input type="hidden" name="current_image" value="{{ $categoryDetails->image }}">
                    @if(!empty( $categoryDetails->image ))
                      <img src=" {{ asset('/images/backend_images/category/en/'.$categoryDetails->image ) }}" width="50">
                    @endif
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Active</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($categoryDetails->isActive == 0) selected="true" @endif > No </option>
                            <option value="1" @if($categoryDetails->isActive == 1) selected="true" @endif> Yes </option>
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
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            @elseif($categoryDetails->lang == 'ar')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>تحرير العلامة التجارية</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>اسم</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>مستوى</strong></label>
                  <div class="controls">
                    <select name="parent_id">
                      <option value="0">الفئة الرئيسية</option>
                      @foreach($ar_levels as $val)
                      <option value="{{ $val->category_id }}" @if($val->category_id == $categoryDetails->parent_id) @if($val->lang == $categoryDetails->lang) selected @endif @endif> {{ $val->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" rows="4" name="description" id="description">{{ $categoryDetails->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة</strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file" />
                    <input type="hidden" name="current_image" value="{{ $categoryDetails->image }}">
                    @if(!empty( $categoryDetails->image ))
                      <img src=" {{ asset('/images/backend_images/category/ar/'.$categoryDetails->image ) }}" width="50">
                    @endif
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>نشيط</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0" @if($categoryDetails->isActive == 0) selected="true" @endif >  رقم  </option>
                            <option value="1" @if($categoryDetails->isActive == 1) selected="true" @endif>  نعم  </option>
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
                <input type="submit" value="تحرير الفئة" class="btn btn-success">
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
