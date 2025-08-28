@extends('layouts.frontLayout.front-design')
@section('content')

<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">
                            @if(session()->get('lang') == 'en')
                                Shop
                            @elseif(session()->get('lang') == 'ar')
                                محل
                            @endif
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item">
                                <a href="{{ url(session()->get('lang').'/home') }}">
                                    @if(session()->get('lang') == 'en')
                                        Home
                                    @elseif(session()->get('lang') == 'ar')
                                        بيت
                                    @endif
                                </a>
                            </li>
                            <li class="gi-breadcrumb-item active">
                                @if(session()->get('lang') == 'en')
                                    Shop
                                @elseif(session()->get('lang') == 'ar')
                                    محل
                                @endif
                                
                            </li>
                        </ul>
                        <!-- gi-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<!-- Category section -->
<section class="gi-category body-bg padding-tb-40">
    <div class="container">
        <div class="row m-b-minus-15px">
            <div class="col-xl-12 border-content-color">
                <div class="gi-category-block owl-carousel">
                    @foreach($all_categoriesss as $category)
                        <div class="gi-cat-box gi-cat-box-2">
                            <div class="gi-cat-icon" style="height: 150px;">
                                @if($category->promotion_id > 0)
                                    @foreach($all_promo as $promo)
                                        @if($category->promotion_id == $promo->id)
                                        <span class="gi-lbl">{{ $promo->amount }}%</span>
                                        @endif
                                    @endforeach
                                @endif
                                <!-- <i class="fi fi-tr-peach"></i> -->
                                <img src=" {{ asset('/images/backend_images/category/'.session()->get('lang').'/'.$category->image ) }}" width="50">
                                <div class="gi-cat-detail">
                                    <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}">
                                        <h4 class="gi-cat-title">{{strtoupper($category->name)}}</h4>
                                    </a>
                                    <!-- <p class="items">{{ $category->product_count }} Items</p> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section End -->

<!-- Shop section -->
<section class="gi-shop padding-tb-40">
    <div class="container">
        <div class="row">
            <div class="gi-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                <!-- Shop Top Start -->
                <div class="gi-pro-list-top d-flex">
                    <div class="col-md-6 gi-grid-list">
                        <div class="gi-gl-btn">
                            <button class="grid-btn btn-grid-50 active">
                                <i class="fi fi-rr-list"></i>
                            </button>
                            <button class="grid-btn btn-list-50">
                                <i class="fi fi-rr-apps"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 gi-sort-select">
                        <div class="gi-select-inner">
                            <select name="gi-select" id="gi-select">
                                <option selected disabled>Sort by</option>
                                <option value="1">Position</option>
                                <option value="2">Relevance</option>
                                <option value="3">Name, A to Z</option>
                                <option value="4">Name, Z to A</option>
                                <option value="5">Price, low to high</option>
                                <option value="6">Price, high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Shop Top End -->

                <!-- Select Bar Start -->
                <!-- <div class="gi-select-bar d-flex">
                    <span class="gi-select-btn">Clothes<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn">Fruits<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn">Snacks<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn">Dairy<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn">perfume<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn">jewelry<a class="gi-select-cancel"
                            href="javascript:void(0)">×</a></span>
                    <span class="gi-select-btn gi-select-btn-clear"><a class="gi-select-clear"
                            href="javascript:void(0)">Clear All</a></span>
                </div> -->
                <!-- Select Bar End -->

                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner list-view">
                        <div class="row">
                            @foreach($products as $product)
                                @if($minn != 0 && $maxx != 0)
                                    @if($product->price >= $minn && $product->price <= $maxx)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content width-100">
                                            <div class="gi-product-content">
                                                <div class="gi-product-inner">
                                                    <div class="gi-pro-image-outer">
                                                        <div class="gi-pro-image">
                                                            <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}" class="image">
                                                                <span class="label veg">
                                                                    <span class="dot"></span>
                                                                </span>
                                                                <img class="main-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                    alt="Product">
                                                                <img class="hover-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                    alt="Product">
                                                            </a>
                                                            @if($product->saleprice != null && $product->promotion_id == 0)
                                                                <span class="flags">
                                                                    <span class="sale">Sale</span>
                                                                </span>
                                                            @elseif($product->promotion_id > 0)
                                                                @foreach($all_promo as $promo)
                                                                    @if($product->promotion_id == $promo->id)
                                                                    <span class="flags">
                                                                        <span class="sale">{{ $promo->amount }}% OFF</span>
                                                                    </span>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            <div class="gi-pro-actions">
                                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                                        class="fi-rr-heart"></i></a>
                                                                <a href="#" class="gi-btn-group quickview"
                                                                    data-link-action="quickview" title="Quick view"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#gi_quickview_modal"><i
                                                                        class="fi-rr-eye"></i></a>
                                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                                <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart">
                                                                    <button id="{{$product->product_id}}" class="addtocartBtn" role="button">
                                                                        <i class="fi-rr-shopping-basket"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gi-pro-content">
                                                        <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">
                                                            <h6 class="gi-pro-stitle">{{ $product->brand_name }}</h6>
                                                        </a>
                                                        <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">{{ $product->name }}</a></h5>
                                                        <div class="gi-pro-rat-price">
                                                            <span class="gi-pro-rating">
                                                                @if($roundoffrating == '0')
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                @elseif($roundoffrating <= '1')
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                @elseif($roundoffrating <= '2')
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                @elseif($roundoffrating <= '3')
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                @elseif($roundoffrating <= '4')
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star"></i>
                                                                @elseif($roundoffrating >= '5')
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                @endif
                                                                    
                                                            </span>
                                                            @if($product->saleprice != null && $product->promotion_id == 0)
                                                                <span class="gi-price">
                                                                    <span class="new-price">{{ $product->price_unit}} {{ $product->saleprice }}</span>
                                                                    <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                                </span>
                                                            @elseif($product->promotion_id > 0)
                                                                @foreach($all_promo as $promo)
                                                                    @if($product->promotion_id == $promo->id)
                                                                        @php
                                                                            $p_amount =  $promo->amount;
                                                                            $pp = $product->price/100*$p_amount;
                                                                            $promo_price = $product->price - $pp;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                <span class="gi-price">
                                                                    <span class="new-price">{{ $product->price_unit}} {{ $promo_price }}</span>
                                                                    <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                                </span>
                                                            @else
                                                                <span class="gi-price">
                                                                    <span class="new-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content width-100">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                alt="Product">
                                                            <img class="hover-image" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$product->image ) }}"
                                                                alt="Product">
                                                        </a>
                                                        @if($product->saleprice != null && $product->promotion_id == 0)
                                                            <span class="flags">
                                                                <span class="sale">Sale</span>
                                                            </span>
                                                        @elseif($product->promotion_id > 0)
                                                            @foreach($all_promo as $promo)
                                                                @if($product->promotion_id == $promo->id)
                                                                <span class="flags">
                                                                    <span class="sale">{{ $promo->amount }}% OFF</span>
                                                                </span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        <div class="gi-pro-actions">
                                                            <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                                    class="fi-rr-heart"></i></a>
                                                            <a href="#" class="gi-btn-group quickview"
                                                                data-link-action="quickview" title="Quick view"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#gi_quickview_modal"><i
                                                                    class="fi-rr-eye"></i></a>
                                                            <a href="javascript:void(0)" class="gi-btn-group compare"
                                                                title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                            <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart">
                                                                <button id="{{$product->product_id}}" class="addtocartBtn" role="button">
                                                                    <i class="fi-rr-shopping-basket"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gi-pro-content">
                                                    <a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">
                                                        <h6 class="gi-pro-stitle">{{ $product->brand_name }}</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product->product_idd.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">{{ $product->name }}</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            @if($roundoffrating == '0')
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($roundoffrating <= '1')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($roundoffrating <= '2')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($roundoffrating <= '3')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($roundoffrating <= '4')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($roundoffrating >= '5')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                            @endif
                                                                
                                                        </span>
                                                        @if($product->saleprice != null && $product->promotion_id == 0)
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $product->saleprice }}</span>
                                                                <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @elseif($product->promotion_id > 0)
                                                            @foreach($all_promo as $promo)
                                                                @if($product->promotion_id == $promo->id)
                                                                    @php
                                                                        $p_amount =  $promo->amount;
                                                                        $pp = $product->price/100*$p_amount;
                                                                        $promo_price = $product->price - $pp;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $promo_price }}</span>
                                                                <span class="old-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @else
                                                            <span class="gi-price">
                                                                <span class="new-price">{{ $product->price_unit}} {{ $product->price }}</span>
                                                            </span>
                                                        @endif
                                                    </div>
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
                    </div>
                    <!-- Pagination Start -->
                    <div class="gi-pro-pagination">
                        <!-- <span>Showing 1-12 of 21 item(s)</span>
                        <ul class="gi-pro-pagination-inner">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><span>...</span></li>
                            <li><a href="#">8</a></li>
                            <li><a class="next" href="#">Next <i class="gicon gi-angle-right"></i></a></li>
                        </ul> -->
                        @if ($paginator->lastPage() > 1)
                            <ul class="gi-pro-pagination-inner">    
                                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a href="{{ $paginator->url(1) }}">
                                        <i class="gicon gi-angle-left "></i>
                                    </a>
                                </li>                 
                                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >
                                        <i class="gicon gi-angle-right "></i>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        
                    </div>
                    <!-- Pagination End -->
                </div>
                <!--Shop content End -->

            </div>
            <!-- Sidebar Area Start -->
            <div class="gi-shop-sidebar col-lg-3 order-lg-first col-md-12 order-md-last m-t-991">
                <div id="shop_sidebar">
                    <div class="gi-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">
                                    @if(session()->get('lang') == 'en')
                                        Category
                                    @elseif(session()->get('lang') == 'ar')
                                       فئة
                                    @endif
                                </h3>
                            </div>
                            <div class="gi-sb-block-content">
                                <ul>
                                    @foreach($all_categoriesss as $category)
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" @if(Request::segment(3) == $category->category_id) checked @endif>
                                                <a href="{{ url(session()->get('lang').'/shop/'.$category->category_id.'/0/0' ) }}">
                                                    <span><img src=" {{ asset('/images/backend_images/category/'.session()->get('lang').'/'.$category->image ) }}" width="20" style="margin-right: 5px;"> {{ $category->name }}</span>
                                                </a>
                                                <span class="@if(Request::segment(3) == $category->category_id) checked @endif"></span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Weight Block -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">
                                    @if(session()->get('lang') == 'en')
                                        Weight
                                    @elseif(session()->get('lang') == 'ar')
                                       وزن
                                    @endif
                                </h3>
                            </div>
                            <div class="gi-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="" checked>
                                            <a href="#">500gm Pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <a href="#">1kg Pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <a href="#">2kg Pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <a href="#">5kg Pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <a href="#">10kg Pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Color item -->
                        <div class="gi-sidebar-block color-block gi-sidebar-block-clr">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">
                                    @if(session()->get('lang') == 'en')
                                        Color
                                    @elseif(session()->get('lang') == 'ar')
                                       لون
                                    @endif
                                </h3>
                            </div>
                            <div class="gi-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#c4d6f9;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#ff748b;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#000000;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li class="active">
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#2bff4a;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#ff7c5e;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#f155ff;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#ffef00;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#c89fff;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#7bfffa;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#56ffc1;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#ffdb9f;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#9f9f9f;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gi-sidebar-block-item">
                                            <input type="checkbox" value="">
                                            <span class="gi-clr-block" style="background-color:#6556ff;"></span>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">
                                    @if(session()->get('lang') == 'en')
                                        Price
                                    @elseif(session()->get('lang') == 'ar')
                                       سعر
                                    @endif
                                </h3>
                            </div>
                            <div class="gi-sb-block-content gi-price-range-slider es-price-slider">
                                <div class="gi-price-filter">
                                    <div class="gi-price-input">
                                        <label class="filter__label">
                                            @if(session()->get('lang') == 'en')
                                                From
                                            @elseif(session()->get('lang') == 'ar')
                                               من
                                            @endif
                                            <input type="text" class="filter__input">
                                        </label>
                                        <span class="gi-price-divider"></span>
                                        <label class="filter__label">
                                            @if(session()->get('lang') == 'en')
                                                To
                                            @elseif(session()->get('lang') == 'ar')
                                               ل
                                            @endif
                                            <input type="text" class="filter__input">
                                        </label>
                                    </div>
                                    <div id="gi-sliderPrice" class="filter__slider-price" data-min="{{ $minPrice }}"
                                        data-max="{{ $maxPrice }}" data-step="10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar tags -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">
                                    @if(session()->get('lang') == 'en')
                                        Tags
                                    @elseif(session()->get('lang') == 'ar')
                                       العلامات
                                    @endif
                                </h3>
                            </div>
                            <div class="gi-tag-block gi-sb-block-content">
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Clothes</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Fruits</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Snacks</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Dairy</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Seafood</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Fastfood</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Toys</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">perfume</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">jewelry</a>
                                <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Bags</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop section End -->

@endsection

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
 <script type="text/javascript">

  $(document).ready(function(){
    console.log({{$maxPrice}});
    filter({{$minPrice}}, {{$maxPrice}}, {{$minn}}, {{$maxx}});
  })
  

  // var callTime;

  function filter(minPrice, maxPrice, minn, maxx)
  {
    if(minn != 0 && maxx != 0){
      $("#gi-sliderPrice").slider({
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
      $("#gi-sliderPrice").slider({
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
