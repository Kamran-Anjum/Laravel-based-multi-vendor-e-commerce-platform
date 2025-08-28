@extends('layouts.subadminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Products</a> </div>
    <h1>Products</h1>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/subadmin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Product</h5>
            </div>
            <div class="widget-content nopadding">
              <div class="control-group">
                  <label class="control-label"><strong>Language</strong></label>
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
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Select Vendor</h5>
            </div>
            <div class="widget-content nopadding">
              <div class="control-group">
                  <label class="control-label"><strong>Select Vendor</strong></label>
                  <div class="controls">
                      <select class="language_class" name="created_for" id="lang_dropdown">
                        {!! $vendor_dropdown !!}
                      </select>
                  </div>
              </div>
            </div>
          </div>
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <button style="height: 36px;" type="button" class="btn btn-info btn-lg pull-right subadmincountryclass_addRow" id="SubAdminCountryCity_btn_add">
                  <a style="color: #fff;" class="icon icon-plus"></a>
              </button>
            </div>
            <div class="widget-content nopadding">
              <div>
                <input type="hidden" name="countrowdata" id="countrowdata" value="1">
                <table id="SubAdminCountryCity_MultiRecGrid" class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <!-- <th style="text-align:center;">S No.</th> -->
                            <th style="text-align:center;">Country / بلد</th>
                            <th style="text-align:center;">City / مدينة</th>
                            <th style="text-align:center;">Remove / إزالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="dynamic_row">
                            @php $sno = 1 @endphp
                            <!-- <td style="text-align:center;">{{--$sno--}}</td> -->
                            <td>
                                <select class="subadmin_product_country_class" name="countryid_{{$sno}}" id="countryid_{{$sno}}">
                                  {!! $countries_dropdown !!}
                                </select>
                            </td>
                            <td>
                                <select name="cityid_{{$sno}}" id="cityid_{{$sno}}">
                                  <option value="0">Select</option>
                                </select>
                            </td>
                            <td style="text-align:center;">
                                <button type="button" id="{{$sno}}" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                  <label class="control-label"><strong>Category<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="en_category_id" id="en_category_id">
                      {!! $en_categories_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Brand<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="en_brand_id" id="en_brand_id">
                      {!! $en_brand_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Name<span style="color:red;">*</span></strong></label>
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
                  <label class="control-label"><strong>Price Units<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="en_priceunit_id" id="en_priceunit_id">
                      {!! $en_priceunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Price<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input type="number" step="0.01" onchange="en_precaldiscount()" name="en_price" id="en_price">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Discount %</strong></label>
                  <div class="controls">
                    <input onchange="en_caldiscount()" type="number" step="0.01" name="en_discount" id="en_discount">
                </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Sale Price</strong></label>
                  <div class="controls">
                    <input readonly="true" type="text" name="en_saleprice" id="en_saleprice">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label"><strong>Unit<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="en_productunit_id" id="en_productunit_id">
                      {!! $en_productunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Quantity</strong></label>
                  <div class="controls">
                    <input type="number" name="en_quantity" id="en_quantity">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Color</strong></label>
                  <div class="controls">
                    <input type="text" name="en_color" id="en_color">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Height</strong></label>
                  <div class="controls">
                    <input type="text" name="en_height" id="en_height">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Width</strong></label>
                  <div class="controls">
                    <input type="text" name="en_width" id="en_width">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Weight<small>(In Gram)</small><span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input type="number" name="en_weight" id="en_weight" required="">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <textarea name="en_description" id="en_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Detail Description</strong></label>
                  <div class="controls">
                    <textarea name="en_long_description" id="en_long_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Hot Deals</strong></label>
                  <div class="controls">
                    <label><input type="checkbox" name="en_chkIsHotDeal"/></label>
                  </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label"><strong>Top Offers</strong></label>
                  <div class="controls">
                      <label><input type="checkbox" name="en_chkIsTopOffer"/></label>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Featured</strong></label>
                  <div class="controls">
                    <label><input type="checkbox" name="en_chkIsFeatured"/></label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Featured Image<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input name="en_image" id="en_image" type="file"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Galery Image 1</strong></label>
                  <div class="controls">
                    <input name="en_galeryimage1" id="en_galeryimage1" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Galery Image 2</strong></label>
                  <div class="controls">
                    <input name="en_galeryimage2" id="en_galeryimage2" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Galery Image 3</strong></label>
                  <div class="controls">
                    <input name="en_galeryimage3" id="en_galeryimage3" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Galery Image 4</strong></label>
                  <div class="controls">
                    <input name="en_galeryimage4" id="en_galeryimage4" type="file" />
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
                  <label class="control-label"><strong>فئة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="ar_category_id" id="ar_category_id">
                      {!! $ar_categories_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>ماركة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="ar_brand_id" id="ar_brand_id">
                      {!! $ar_brand_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_name" id="ar_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>الشفرة</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_code" id="ar_code">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وحدات السعر<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="ar_priceunit_id" id="ar_priceunit_id">
                      {!! $ar_priceunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>السعر<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" step="0.01" onchange="ar_precaldiscount()" name="ar_price" id="ar_price">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>% خصم</strong></label>
                  <div class="controls">
                    <input dir="rtl" onchange="ar_caldiscount()" type="number" step="0.01" name="ar_discount" id="ar_discount">
                </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>سعر البيع</strong></label>
                  <div class="controls">
                    <input dir="rtl" readonly="true" type="text" name="ar_saleprice" id="ar_saleprice">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label"><strong>وحدة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="ar_productunit_id" id="ar_productunit_id">
                      {!! $ar_productunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>كمية</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" name="ar_quantity" id="ar_quantity">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اللون</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_color" id="ar_color">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>ارتفاع</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_height" id="ar_height">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>عرض</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="ar_width" id="ar_width">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وزن  <small>(بالجرام)</small><span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" name="ar_weight" id="ar_weight" required="">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="ar_description" id="ar_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف التفاصيل</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="ar_long_description" id="ar_long_description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صفقات ساخنة</strong></label>
                  <div class="controls">
                    <label><input type="checkbox" name="ar_chkIsHotDeal"/></label>
                  </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label"><strong>أفضل العروض</strong></label>
                  <div class="controls">
                      <label><input type="checkbox" name="ar_chkIsTopOffer"/></label>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>متميز</strong></label>
                  <div class="controls">
                    <label><input type="checkbox" name="ar_chkIsFeatured"/></label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة مميزة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input name="ar_image" id="ar_image" type="file"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>معرض الصور 1</strong></label>
                  <div class="controls">
                    <input name="ar_galeryimage1" id="ar_galeryimage1" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>معرض الصور 2</strong></label>
                  <div class="controls">
                    <input name="ar_galeryimage2" id="ar_galeryimage2" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>معرض الصور 3</strong></label>
                  <div class="controls">
                    <input name="ar_galeryimage3" id="ar_galeryimage3" type="file" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>معرض الصور 4</strong></label>
                  <div class="controls">
                    <input name="ar_galeryimage4" id="ar_galeryimage4" type="file" />
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
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" disabled="" id="sub_both_products" value="Add Product / أضف منتج" class="btn btn-success">
          </div>
          <div id="sub_en" style="text-align: left; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add Product" class="btn btn-success">
          </div>
          <div id="sub_ar" style="text-align: right; display: none;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="أضف منتج" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function en_caldiscount() {
    var price = document.getElementById('en_price').value;
    var discount = document.getElementById('en_discount').value;
    discount = parseFloat(discount).toFixed(2);
    document.getElementById('en_discount').value = discount;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('en_saleprice').value = finalsaleprice;
  }
  
  function en_precaldiscount(){
    var price = document.getElementById('en_price').value;
    price = parseFloat(price).toFixed(2);
    document.getElementById('en_price').value = price;
    if (document.getElementById('en_discount').value!=0 || document.getElementById('en_discount').value!='')
    {
    var price = document.getElementById('en_price').value;
    var discount = document.getElementById('en_discount').value;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('en_saleprice').value = finalsaleprice;
    }
  }

  function ar_caldiscount() {
    var price = document.getElementById('ar_price').value;
    var discount = document.getElementById('ar_discount').value;
    discount = parseFloat(discount).toFixed(2);
    document.getElementById('ar_discount').value = discount;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('ar_saleprice').value = finalsaleprice;
  }
  
  function ar_precaldiscount(){
    var price = document.getElementById('ar_price').value;
    price = parseFloat(price).toFixed(2);
    document.getElementById('ar_price').value = price;
    if (document.getElementById('ar_discount').value!=0 || document.getElementById('ar_discount').value!='')
    {
    var price = document.getElementById('ar_price').value;
    var discount = document.getElementById('ar_discount').value;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('ar_saleprice').value = finalsaleprice;
    }
  }
</script>

@endsection
