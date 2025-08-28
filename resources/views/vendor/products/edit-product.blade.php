@extends('layouts.vendorLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Edit Product</a> </div>
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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/edit-product/'.$product_trans->id ) }}" name="edit_product" id="edit_product" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <input type="hidden" name="lang" id="lang" value="{{ $product_trans->lang }}">
            @if($product_trans->lang == 'en')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Product</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>Category<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="category_id" id="category_id">
                      {!! $en_categories_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Brand<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="brand_id" id="brand_id">
                      {!! $en_brand_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Name<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{$product_trans->name}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Code</strong></label>
                  <div class="controls">
                    <input type="text" name="code" id="code" value="{{$product_trans->code}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Price Units<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="priceunit_id" id="priceunit_id">
                      {!! $en_priceunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Price<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input type="number" step="0.01" onchange="en_precaldiscount()" name="price" id="price" value="{{$product_trans->price}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Discount %</strong></label>
                  <div class="controls">
                    <input onchange="en_caldiscount()" type="number" step="0.01" name="discount" id="discount" value="{{$product_trans->discount}}">
                </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Sale Price</strong></label>
                  <div class="controls">
                    <input readonly="true" type="text" name="saleprice" id="saleprice" value="{{$product_trans->saleprice}}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label"><strong>Unit<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="productunit_id" id="productunit_id">
                      {!! $en_productunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Quantity</strong></label>
                  <div class="controls">
                    <input type="number" name="quantity" id="quantity" value="{{$product_trans->quantity}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Color</strong></label>
                  <div class="controls">
                    <input type="text" name="color" id="color" value="{{$product_trans->color}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Height</strong></label>
                  <div class="controls">
                    <input type="text" name="height" id="height" value="{{$product_trans->height}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Width</strong></label>
                  <div class="controls">
                    <input type="text" name="width" id="width" value="{{$product_trans->width}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Weight<small>(In Gram)</small><span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input type="number" name="weight" id="weight" value="{{$product_trans->weight}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Description<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <textarea name="description" id="description">{{$product_trans->description}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Detail Description</strong></label>
                  <div class="controls">
                    <textarea name="long_description" id="long_description">{{$product_trans->long_description}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Hot Deals</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isHotDeal == 1)
                        <input type="checkbox" name="chkIsHotDeal" checked />
                      @else
                        <input type="checkbox" name="chkIsHotDeal"/>
                      @endif
                    </label>
                  </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label"><strong>Top Offers</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isTopOffer == 1)
                        <input type="checkbox" name="chkIsTopOffer" checked />
                      @else
                        <input type="checkbox" name="chkIsTopOffer"/>
                      @endif
                    </label>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Featured</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isFeatured == 1)
                        <input type="checkbox" name="chkIsFeatured" checked />
                      @else
                        <input type="checkbox" name="chkIsFeatured"/>
                      @endif
                    </label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>Featured Image<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file">
                    <input type="hidden" name="current_image" value="{{ $product_trans->image }}">
                    @if(!empty( $product_trans->image ))
                    <img style="width: 50px; height: 50px;" src="{{ asset('/images/backend_images/products/en/small/'.$product_trans->image) }}"> | <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $product_trans->id }}" param-route="delete-product-image" param-user="vendor" href="javascript:">Delete</a>
                    @endif
                  </div>
                </div>

                <?php $count = 0; ?>
                @foreach($en_product_details as $galleryimage)
                  <?php $count = $count+1; ?>
                  <div class="control-group">
                    <label class="control-label"><strong>Galery Image {{ $count }}:</strong></label>
                    <div class="controls">
                      <input name="galeryimage<?php echo $count;?>" id="galeryimage<?php echo $count;?>" type="file" />
                      <input type="hidden" name="current_image<?php echo $count;?>" value="{{ $galleryimage->image }}">
                      <input type="hidden" name="current_id<?php echo $count;?>" value="{{ $galleryimage->id }}">
                      @if(!empty( $galleryimage->image ))
                      <img style="width: 50px; height: 50px;" src="{{ asset('/images/backend_images/products/en/small/'.$galleryimage->image) }}"> | <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $galleryimage->id }}" param-route="delete-product-galaryimage" param-user="vendor" href="javascript:">Delete</a>
                      @endif
                    </div>
                  </div>
                @endforeach

                @if($count < 5)
                  @for($i = $count+1; $i <= 4; $i++)
                    <div class="control-group">
                      <label class="control-label"><strong>Galery Image {{ $i }}:</strong></label>
                      <div class="controls">
                        <input name="galeryimage<?php echo $i;?>" id="galeryimage<?php echo $i;?>" type="file" />
                      </div>
                    </div>
                    @endfor
                @endif

                <div class="control-group">
                    <label class="control-label"><strong>Active</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0"> No </option>
                            <option value="1" selected="true"> Yes </option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
            @elseif($product_trans->lang == 'ar')
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>تحرير العلامة التجارية</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="control-group">
                  <label class="control-label"><strong>فئة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="category_id" id="category_id">
                      {!! $ar_categories_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>ماركة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="brand_id" id="brand_id">
                      {!! $ar_brand_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اسم<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="name" id="name" value="{{$product_trans->name}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>الشفرة</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="code" id="code" value="{{$product_trans->code}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وحدات السعر<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="priceunit_id" id="priceunit_id">
                      {!! $ar_priceunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>السعر<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" step="0.01" onchange="ar_precaldiscount()" name="price" id="price" value="{{$product_trans->price}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>% خصم</strong></label>
                  <div class="controls">
                    <input dir="rtl" onchange="ar_caldiscount()" type="number" step="0.01" name="discount" id="discount" value="{{$product_trans->discount}}">
                </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>سعر البيع</strong></label>
                  <div class="controls">
                    <input dir="rtl" readonly="true" type="text" name="saleprice" id="saleprice" value="{{$product_trans->saleprice}}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label"><strong>وحدة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <select name="productunit_id" id="productunit_id">
                      {!! $ar_productunit_dropdown !!}
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>كمية</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" name="quantity" id="quantity" value="{{$product_trans->quantity}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>اللون</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="color" id="color" value="{{$product_trans->color}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>ارتفاع</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="height" id="height" value="{{$product_trans->height}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>عرض</strong></label>
                  <div class="controls">
                    <input dir="rtl" type="text" name="width" id="width" value="{{$product_trans->width}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وزن  <small>(بالجرام)</small><span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input dir="rtl" type="number" name="weight" id="weight" value="{{$product_trans->weight}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="description" id="description">{{$product_trans->description}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>وصف التفاصيل</strong></label>
                  <div class="controls">
                    <textarea dir="rtl" name="long_description" id="long_description">{{$product_trans->long_description}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صفقات ساخنة</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isHotDeal == 1)
                        <input type="checkbox" name="chkIsHotDeal" checked />
                      @else
                        <input type="checkbox" name="chkIsHotDeal"/>
                      @endif
                    </label>
                  </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label"><strong>أفضل العروض</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isTopOffer == 1)
                        <input type="checkbox" name="chkIsTopOffer" checked />
                      @else
                        <input type="checkbox" name="chkIsTopOffer"/>
                      @endif
                    </label>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>متميز</strong></label>
                  <div class="controls">
                    <label>
                      @if($product_trans->isFeatured == 1)
                        <input type="checkbox" name="chkIsFeatured" checked />
                      @else
                        <input type="checkbox" name="chkIsFeatured"/>
                      @endif
                    </label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><strong>صورة مميزة<span style="color:red;">*</span></strong></label>
                  <div class="controls">
                    <input name="image" id="image" type="file"/>
                    <input type="hidden" name="current_image" value="{{ $product_trans->image }}">
                    @if(!empty( $product_trans->image ))
                    <img style="width: 50px; height: 50px;" src="{{ asset('/images/backend_images/products/ar/small/'.$product_trans->image) }}"> | <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $product_trans->id }}" param-route="delete-product-image" param-user="vendor" href="javascript:">Delete</a>
                    @endif
                  </div>
                </div>

                <?php $count = 0; ?>
                @foreach($ar_product_details as $galleryimage)
                  <?php $count = $count+1; ?>
                  <div class="control-group">
                    <label class="control-label"><strong>معرض الصور  {{ $count }}:</strong></label>
                    <div class="controls">
                      <input name="galeryimage<?php echo $count;?>" id="galeryimage<?php echo $count;?>" type="file" />
                      <input type="hidden" name="current_image<?php echo $count;?>" value="{{ $galleryimage->image }}">
                      <input type="hidden" name="current_id<?php echo $count;?>" value="{{ $galleryimage->id }}">
                      @if(!empty( $galleryimage->image ))
                      <img style="width: 50px; height: 50px;" src="{{ asset('/images/backend_images/products/ar/small/'.$galleryimage->image) }}"> | <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $galleryimage->id }}" param-route="delete-product-galaryimage" param-user="vendor" href="javascript:">Delete</a>
                      @endif
                    </div>
                  </div>
                @endforeach

                @if($count < 5)
                  @for($i = $count+1; $i <= 4; $i++)
                    <div class="control-group">
                      <label class="control-label"><strong>معرض الصور  {{ $i }}:</strong></label>
                      <div class="controls">
                        <input name="galeryimage<?php echo $i;?>" id="galeryimage<?php echo $i;?>" type="file" />
                      </div>
                    </div>
                    @endfor
                @endif

                <div class="control-group">
                    <label class="control-label"><strong>نشيط</strong></label>
                    <div class="controls">
                        <select id="isActive" name="isActive" class="Active">
                            <option value="0"> رقم </option>
                            <option value="1" selected="true"> نعم </option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="تحرير المنتج" class="btn btn-success">
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function en_caldiscount() {
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    discount = parseFloat(discount).toFixed(2);
    document.getElementById('discount').value = discount;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('saleprice').value = finalsaleprice;
  }
  
  function en_precaldiscount(){
    var price = document.getElementById('price').value;
    price = parseFloat(price).toFixed(2);
    document.getElementById('price').value = price;
    if (document.getElementById('discount').value!=0 || document.getElementById('discount').value!='')
    {
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('saleprice').value = finalsaleprice;
    }
  }

  function ar_caldiscount() {
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    discount = parseFloat(discount).toFixed(2);
    document.getElementById('discount').value = discount;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('saleprice').value = finalsaleprice;
  }
  
  function ar_precaldiscount(){
    var price = document.getElementById('price').value;
    price = parseFloat(price).toFixed(2);
    document.getElementById('price').value = price;
    if (document.getElementById('discount').value!=0 || document.getElementById('discount').value!='')
    {
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    onepercent = (price/100);
    var discountrate = 100-discount;
    discountamount = onepercent*discountrate;
    finalsaleprice = Math.round(discountamount);
    document.getElementById('saleprice').value = finalsaleprice;
    }
  }
</script>

@endsection
