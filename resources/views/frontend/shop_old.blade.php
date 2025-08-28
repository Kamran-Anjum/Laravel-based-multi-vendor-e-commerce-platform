@extends('layouts.frontLayout.front_design')
@section('content')
    <ol class="breadcrumb text-center d-flex justify-content-xl-center" style="color: rgb(238,162,222);background-color: rgba(159,53,143,0.14);border-radius: 0;">
      <div style="width: 100%">
        <form class="form-inline" method="get" action="#">
          <div style="color: #bf449e; font-size: 14px;" class="col-12 col-lg-1 ship-to-label">Country :</div>
          <div class="form-group col-12 col-lg-2"><select style="width: 100%; font-size: 14px;" class="form-control shop_country_class" id="country_id" name="sl_country"><option value="0">All Countries</option>{!! $countriesss_dropdown !!}</select></div>
          <div style="color: #bf449e; font-size: 14px;" class="col-12 col-lg-1 ship-to-label">City :</div>
          <div class="form-group col-12 col-lg-2"><select style="width: 100%; font-size: 14px;" class="form-control shop_city_class" id="ccity_id" name="sl_city"><option value="0">All Cities</option>{!! $citiesss_dropdown !!}</select></div>
          <div class="col-12 col-lg-3"></div>
          <div class="input-group col-12 col-lg-3">
              <input style="height: 35px;" class="form-control form-control-sm" type="search" id="search_product" name="search_field" placeholder="Looking for?" @if(Request::segment(6)) value="{{Request::segment(6)}}" @endif>
              <div style="margin-left: -2px" class="input-group-append">
                <button id="search-button" class="btn btn-primary btn-sm lilac-top-btn search_product_class" style="color: rgb(191,68,158);" type="button"><i style="color:#ffffff;"class="icon ion-android-search"></i></button>
              </div>
          </div>
        </form>
      </div>
    </ol>
    <style>
      .category_btn{
        border: none;
        color: #444;
        text-decoration: none;
      }

      .category_btn:hover{
        color: #b84691;
        text-decoration: underline;
      }

      .subcategory_btn{
        border: none;
        color: #444;
        text-decoration: none;
        font-size: 14px;
      }

      .subcategory_btn:hover{
        color: #b84691;
        text-decoration: underline;
      }

      .brand_btn{
        border: none;
        color: #444;
        text-decoration: none;
        padding: 1px 0;
      }

      .brand_btn:hover{
        color: #b84691;
        text-decoration: underline;
      }
    </style>
    <div>
        <div class="container-fluid" style="padding:0 45px;">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" style="padding-right:2.5rem">
                  <div style="margin-bottom: 10px;">
                    <h6 class="text-uppercase" style="color: rgb(191,68,158);">
                      @if(session()->get('lang') == 'en')
                        Categories
                      @elseif(session()->get('lang') == 'ar')
                       نفئات
                      @endif
                    </h6>

                    <a style="font-size:0.9rem; background:transparent !important; border:none !important; padding-bottom: 5px; padding-left: 3px" href="{{ url(session()->get('lang').'/shop/'.'0'.'/'.'0'.'/'.Request::segment(5) ) }}" type="button" class="category_btn">
                      @if(session()->get('lang') == 'en')
                        All Categories
                      @elseif(session()->get('lang') == 'ar')
                      جميع الفئات
                      @endif
                    </a>

                    @foreach($categories as $category)
                      <div>
                          <div class="ps-accordion @if(Request::segment(3) == $category->category_id) ps-active @endif">
                            <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/'.'0'.'/'.Request::segment(5) ) }}" type="button" class="category_btn">{{$category->name}}</a>
                          </div>

                          <div class="ps-panel" @if(Request::segment(3) == $category->category_id) @endif>
                              @foreach($subCategories as $subCategory)
                                  @foreach($subCategory as $subCat)

                                      @if($subCat['parent_id'] == $category->category_id)
                                          <div class="subcategory_div">
                                            <a @if(Request::segment(4) == $subCat['category_id']) style="color: #b84691;" @endif href="{{ url(session()->get('lang').'/shop/'.Request::segment(3).'/'.$subCat->category_id.'/'.Request::segment(5) ) }}" type="button" class="subcategory_btn">{{$subCat['name']}}</a>
                                          </div>
                                      @endif

                                  @endforeach
                              @endforeach
                          </div>
                      </div>
                    @endforeach
                  </div>
                  <br/>
                  <div id="brandDiv">
                    <h6 class="text-uppercase" style="color: rgb(191,68,158);">
                      @if(session()->get('lang') == 'en')
                        BRANDS
                      @elseif(session()->get('lang') == 'ar')
                       نالعلامات التجارية
                      @endif
                    </h6>
                    <form>
                      <div>
                        <a style="font-size:0.9rem; background:transparent !important; border:none !important; padding-bottom: 5px" href="{{ url(session()->get('lang').'/shop/'.Request::segment(3).'/'.Request::segment(4).'/'.'0' ) }}" type="button" class="brand_btn">
                          @if(session()->get('lang') == 'en')
                            All Brands
                          @elseif(session()->get('lang') == 'ar')
                         جميع العلامات التجارية
                          @endif
                        </a>

                        @foreach($brands as $brand)
                          <div style="font-size:0.9rem; @if(Request::segment(5) == $brand->brand_id) background: #b846913d; @endif">

                            <a href="{{ url(session()->get('lang').'/shop/'.Request::segment(3).'/'.Request::segment(4).'/'.$brand->brand_id ) }}" type="button" class="brand_btn">{{$brand->name}}</a>
                          </div>
                        @endforeach
                      </div>
                    </form>
                  </div>
                  <br/>
                  <div id="slider">
                    <h6 class="text-uppercase" style="color: rgb(191,68,158);">
                      @if(session()->get('lang') == 'en')
                        PRICE Range
                      @elseif(session()->get('lang') == 'ar')
                       نطاق السعر
                      @endif
                    </h6>
                    <p>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; font-size:0.9rem;" class="product_check pricerange_btn" value= "Rs: {{ $minPrice }} - Rs: {{ $maxPrice }}">
                    </p>
                    <div id="slider-range" style="margin-bottom:60px; width:95%;"></div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-9 col-xl-9" style="padding-left:3rem;" id="productsPartial">
                  <div class="row" id="filter-text-title">
                    @foreach($products as $product)
                      @if($minn != 0 && $maxx != 0)
                        @if($product->price >= $minn && $product->price <= $maxx)
                          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3" style="padding:0.4rem;">
                            <div class="card">
                              <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}"><img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width: 100%;height:226px; display:block; margin:auto;"></a>
                              <div style="text-align:left; padding:0.6rem !important;">
                                <a style="color:#fff; font-size:0.7rem; background:#f7941d; padding:0 2px;" href="#" >{{ $product->brand_name }}</a>
                                <a style="color:#b84691;" href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}"><h6>{{ $product->name }} </h6></a>
                                <p style="font-size: 0.8rem; margin-bottom:0;  overflow : hidden; text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;">{{ $product->description }} </p>

                                @if($product->saleprice != null)
                                  <p style="margin-bottom:0.2rem;"><span class="actual-price" style="font-size:0.8rem;color:#f7941d;"><span>{{ $product->price_unit}}</span>&nbsp;<del>{{ $product->price }}</del></span><span class="discount-label" style="background-color: #b8469159; margin: 5px; font-size: 0.6rem; padding: 2px 4px;">{{$product->discount}}% OFF</span></p>
                                  <p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;"><strong><span class="actual-price"><span>{{ $product->price_unit}}</span>&nbsp;{{$product->saleprice}}</span></strong></p>

                                  <div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
                                      @if($roundoffrating == '0')
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '0.5')
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1.5')
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                    @elseif($roundoffrating >= '5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                    @endif
                                    <!-- <span class="rating-average">&nbsp;&nbsp;@if($roundoffrating > 5) 5 @else {{$roundoffrating}} @endif / 5</span> -->
                                  </div>

                                  <div style="display:block; width:100%;">
                                    <button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
                                      @if(session()->get('lang') == 'en')
                                        Buy Now
                                      @elseif(session()->get('lang') == 'ar')
                                        اشتري الآن
                                      @endif
                                    </button>

                                    <button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
                                      @if(session()->get('lang') == 'en')
                                        Cart
                                      @elseif(session()->get('lang') == 'ar')
                                       عربة التسوق
                                      @endif
                                    </button>
                                  </div>
                                @else
                                  <p style="margin-bottom:0.2rem;"><span class="actual-price" style="font-size:0.8rem;color:#f7941d;"><span></span>&nbsp;</span><span class="discount-label" style="background-color: #b8469159;margin: 5px;font-size: 10px;/* padding: 2px 4px; */"></span></p>
                                  <p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;"><strong><span class="actual-price"><span>{{ $product->price_unit}}</span>&nbsp;{{$product->price}}</strong></span></p>
                                  <div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
                                      @if($roundoffrating == '0')
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '0.5')
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1.5')
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                    @elseif($roundoffrating >= '5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                    @endif
                                    <!-- <span class="rating-average">&nbsp;&nbsp;@if($roundoffrating > 5) 5 @else {{$roundoffrating}} @endif / 5</span> -->
                                  </div>
                                  <div style="display:block;">
                                    <button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
                                      @if(session()->get('lang') == 'en')
                                        Buy Now
                                      @elseif(session()->get('lang') == 'ar')
                                        اشتري الآن
                                      @endif
                                    </button>

                                    <button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
                                      @if(session()->get('lang') == 'en')
                                        Cart
                                      @elseif(session()->get('lang') == 'ar')
                                       عربة التسوق
                                      @endif
                                    </button>
                                  </div>
                                @endif
                              </div>
                            </div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="cart-modal{{ $product->product_idd }}">
                              <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h6 class="modal-title">1 new item(s) have been added in your cart</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-row">
                                      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width:150px; height:150px;">
                                      </div>
                                      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <p style="color: #212529;"><strong>{{ $product->name }}</strong></p>
                                        <p style="color: #212529;">{{ $product->description }}</p>

                                        @if($product->saleprice != null)
                                          <p><span style="font-size: 20px;"><strong>{{ $product->price_unit}} {{ $product->saleprice }}</strong></span>&nbsp;</p>
                                        @else
                                          <p><span style="font-size: 20px;"><strong>{{ $product->price_unit}} {{ $product->price }}</strong></span>&nbsp;</p>
                                        @endif
                                      </div>
                                      <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <h6>My Shopping Cart<span style="font-size: 10px;">&nbsp;(1 Item)</span></h6>

                                        @if($product->saleprice != null)
                                          <div class="table-responsive table-borderless">
                                            <table class="table table-bordered">
                                              <tbody>
                                                <tr>
                                                  <td style="font-size: 16px;">Subtotal</td>
                                                  <td style="font-size: 16px;">{{ $product->saleprice }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 18px;"><strong>Total</strong></td>
                                                    <td style="font-size: 18px;"><strong>{{ $product->saleprice }}</strong></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        @else
                                          <div class="table-responsive table-borderless">
                                            <table class="table table-bordered">
                                              <tbody>
                                                <tr>
                                                    <td style="font-size: 16px;">Subtotal</td>
                                                    <td style="font-size: 16px;">{{ $product->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 18px;"><strong>Total</strong></td>
                                                    <td style="font-size: 18px;"><strong>{{ $product->price }}</strong></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        @endif

                                        <button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;"><a style="color:#ffffff;" href="{{ url(session()->get('lang').'/checkout/') }}">Check Out</a></button>
                                        <button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;"><a style="color:#ffffff;" href="{{ url(session()->get('lang').'/cart/') }}">Go to Cart </a></button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer d-none"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @else
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3" style="padding:0.4rem;">
                          <div class="card">
                            <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}"><img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width: 100%;height:226px; display:block; margin:auto;"></a>
                            <div style="text-align:left; padding:0.6rem !important;">
                              <a style="color:#fff; font-size:0.7rem; background:#f7941d; padding:0 2px;" href="#" >{{ $product->brand_name }}</a>
                              <a style="color:#b84691;" href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}"><h6>{{ $product->name }} </h6></a>
                              <p style="font-size: 0.8rem; margin-bottom:0;  overflow : hidden; text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;">{{ $product->description }} </p>

                              @if($product->saleprice != null)
                                <p style="margin-bottom:0.2rem;"><span class="actual-price" style="font-size:0.8rem;color:#f7941d;"><span>{{ $product->price_unit}}</span>&nbsp;<del>{{ $product->price }}</del></span><span class="discount-label" style="background-color: #b8469159; margin: 5px; font-size: 0.6rem; padding: 2px 4px;">{{$product->discount}}% OFF</span></p>
                                <p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;"><strong><span class="actual-price"><span>{{ $product->price_unit}}</span>&nbsp;{{$product->saleprice}}</span></strong></p>

                                <div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
                                    @if($roundoffrating == '0')
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '0.5')
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1.5')
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                    @elseif($roundoffrating >= '5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                    @endif
                                    <!-- <span class="rating-average">&nbsp;&nbsp;@if($roundoffrating > 5) 5 @else {{$roundoffrating}} @endif / 5</span> -->
                                </div>

                                <div style="display:block; width:100%;">
                                  <button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
                                    @if(session()->get('lang') == 'en')
                                      Buy Now
                                    @elseif(session()->get('lang') == 'ar')
                                      اشتري الآن
                                    @endif
                                  </button>

                                  <button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
                                    @if(session()->get('lang') == 'en')
                                      Cart
                                    @elseif(session()->get('lang') == 'ar')
                                     عربة التسوق
                                    @endif
                                  </button>
                                </div>
                              @else
                                <p style="margin-bottom:0.2rem;"><span class="actual-price" style="font-size:0.8rem;color:#f7941d;"><span></span>&nbsp;</span><span class="discount-label" style="background-color: #b8469159;margin: 5px;font-size: 10px;/* padding: 2px 4px; */"></span></p>
                                <p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;"><strong><span class="actual-price"><span>{{ $product->price_unit}}</span>&nbsp;{{$product->price}}</strong></span></p>
                                <div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
                                    @if($roundoffrating == '0')
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '0.5')
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '1.5')
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '2.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '3.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star-o"></span>
                                    @elseif($roundoffrating <= '4.5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                    @elseif($roundoffrating >= '5')
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                    @endif
                                    <!-- <span class="rating-average">&nbsp;&nbsp;@if($roundoffrating > 5) 5 @else {{$roundoffrating}} @endif / 5</span> -->
                                </div>
                                <div style="display:block;">
                                  <button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
                                    @if(session()->get('lang') == 'en')
                                      Buy Now
                                    @elseif(session()->get('lang') == 'ar')
                                      اشتري الآن
                                    @endif
                                  </button>

                                  <button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
                                    @if(session()->get('lang') == 'en')
                                      Cart
                                    @elseif(session()->get('lang') == 'ar')
                                     عربة التسوق
                                    @endif
                                  </button>
                                </div>
                              @endif
                            </div>
                          </div>
                          <div class="modal fade" role="dialog" tabindex="-1" id="cart-modal{{ $product->product_idd }}">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h6 class="modal-title">1 new item(s) have been added in your cart</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                      <img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width:150px; height:150px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                      <p style="color: #212529;"><strong>{{ $product->name }}</strong></p>
                                      <p style="color: #212529;">{{ $product->description }}</p>

                                      @if($product->saleprice != null)
                                        <p><span style="font-size: 20px;"><strong>{{ $product->price_unit}} {{ $product->saleprice }}</strong></span>&nbsp;</p>
                                      @else
                                        <p><span style="font-size: 20px;"><strong>{{ $product->price_unit}} {{ $product->price }}</strong></span>&nbsp;</p>
                                      @endif
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                      <h6>My Shopping Cart<span style="font-size: 10px;">&nbsp;(1 Item)</span></h6>

                                      @if($product->saleprice != null)
                                        <div class="table-responsive table-borderless">
                                          <table class="table table-bordered">
                                            <tbody>
                                              <tr>
                                                <td style="font-size: 16px;">Subtotal</td>
                                                <td style="font-size: 16px;">{{ $product->saleprice }}</td>
                                              </tr>
                                              <tr>
                                                  <td style="font-size: 18px;"><strong>Total</strong></td>
                                                  <td style="font-size: 18px;"><strong>{{ $product->saleprice }}</strong></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      @else
                                        <div class="table-responsive table-borderless">
                                          <table class="table table-bordered">
                                            <tbody>
                                              <tr>
                                                  <td style="font-size: 16px;">Subtotal</td>
                                                  <td style="font-size: 16px;">{{ $product->price }}</td>
                                              </tr>
                                              <tr>
                                                  <td style="font-size: 18px;"><strong>Total</strong></td>
                                                  <td style="font-size: 18px;"><strong>{{ $product->price }}</strong></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      @endif

                                      <button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;"><a style="color:#ffffff;" href="{{ url(session()->get('lang').'/checkout/') }}">Check Out</a></button>
                                      <button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;"><a style="color:#ffffff;" href="{{ url(session()->get('lang').'/cart/') }}">Go to Cart </a></button>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer d-none"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                    @endforeach
                    @if ($products->isEmpty())
                      <div>
                        <h5 class="card-title" style="margin-top: 6px;">No items found.</h5>
                      </div>  
                    @endif
                  </div>
                  <style type="text/css">
                    .w-5{
                      width: 41px;
                    }

                    .paginate-nav-span{
                      text-align: right;
                    }

                    .paginate-nav-span p {
                      margin-top: 8px;
                      margin-right: 20px; 
                    }
                  </style>
                  <div class="row">
                    <div class="col-sm-12">
                      <span id="paginate_nav_span" class="paginate-nav-span">{{ $products->links() }}</span>
                    </div>
                  </div>
                </div>
            </div>
        <div>
        <div class="container"></div>
    </div>

    <script>
        $(function() {
         var Accordion = function(el, multiple) {
          this.el = el || {};
          this.multiple = multiple || false;

          // Variables
          var links = this.el.find(".link");
          // Event
          links.on("click", {el: this.el, multiple: this.multiple}, this.dropdown)
         }

         Accordion.prototype.dropdown = function(e) {
          var $el = e.data.el;
           $this = $(this),
           $next = $this.next();

          $next.slideToggle();
          $this.parent().toggleClass("open");

          if (!e.data.multiple) {
           $el.find(".submenu").not($next).slideUp().parent().removeClass("open");
          };
         } 

         var accordion = new Accordion($("#accordion"), false);
        });

        $(document).on('change',".shop_country_class",function () {
            var country_id = $(this).val();

            $('#ccity_id').html("");
            if(country_id == 0 || country_id == '0'){
              $('#ccity_id').html("<option value='0'>All Cities</option>");
            }else{
              $.ajax({
                  url: '/frontend/cityname/'+country_id,
                  success: data => {
                      for(var option =0; option<data.length; option++)
                      {
                        var newOption = document.createElement("option");
                        newOption.value = data[option]['id'];
                        newOption.innerHTML = data[option]['name'];
                        $("#ccity_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
                      }
                  }
              });
          }
        });

        $(document).on('change',".shop_city_class",function () {
            var country_id = $("#country_id").val();
            var city_id = $(this).val();

            $.ajax({
                url: '/frontend/addCountryCitySession2/'+country_id+'/'+city_id,
                success: data => {
                    location.reload();
                }
            });
        });

    </script>

 @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script type="text/javascript">

  $(document).ready(function(){
    filter({{$minPrice}}, {{$maxPrice}}, {{$minn}}, {{$maxx}});
  })
  

  // var callTime;

  function filter(minPrice, maxPrice, minn, maxx)
  {
    if(minn != 0 && maxx != 0){
      $("#slider-range").slider({
        range: true,
        min: Number(minPrice),
        max: Number(maxPrice),
        values: [minn, maxx],
        stop: function(event, ui){
          FilteredProductsSlider(minn,maxx);
        },
        slide: function (event, ui) {
            minn = ui.values[0];
            maxx = ui.values[1];
            $("#amount").val("Rs: " + minn + ".00" + " - " + "Rs: " + maxx + ".00");
        }
      });
    }else{
      $("#slider-range").slider({
        range: true,
        min: Number(minPrice),
        max: Number(maxPrice),
        values: [minPrice, maxPrice],
        stop: function(event, ui){
          FilteredProductsSlider(minPrice,maxPrice);
        },
        slide: function (event, ui) {
            minPrice = ui.values[0];
            maxPrice = ui.values[1];
            $("#amount").val("Rs: " + minPrice + ".00" + " - " + "Rs: " + maxPrice + ".00");
        }
      });
    }
  }
        
  function FilteredProductsSlider(min,max)
  {
    var drived_url = "";
    var url = window.location.href;

    if(url.indexOf("?") != -1){
      url = url.split("?");
      drived_url = url[0];
    }else{
      drived_url = url;
    }

    var query_string = "?minPrice="+min+"&maxPrice="+max;
    if(min != max){
      window.location.href = drived_url+query_string;
    }
  }

  function search_product(search){
    var hostname = window.location.origin;

    var drived_url = "";
    var url = window.location.href;

    if(search != "" || search != null || search != undefined){
      if(url.indexOf("/en/") != -1){
        drived_url = hostname+"/en/shop/0/0/0/"+search;
      }
      else
      if(url.indexOf("/ar/") != -1){
        drived_url = hostname+"/ar/shop/0/0/0/"+search;
      }

      window.location.href = drived_url;
    }
  }

  $(document).on('click',".search_product_class",function () {
    var search = $("#search_product").val();
    search_product(search);
  });

  $(document).on('keyup',"#search_product",function (e) {
    var search = $(this).val();
    if(e.which == 13) {
        search_product(search);
    }
  });

 </script>
