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
                                Product Details
                            @elseif(session()->get('lang') == 'ar')
                                تفاصيل المنتج
                            @endif
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
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
                                    Product Details
                                @elseif(session()->get('lang') == 'ar')
                                    تفاصيل المنتج
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

<!-- Sart Single Product -->
<section class="gi-single-product padding-tb-40">
    <div class="container">
        <div class="row">
            <div class="gi-pro-rightside gi-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img">
                                <div class="single-product-scroll">
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$productDetails->image ) }}"
                                                alt="Product">
                                        </div>
                                        @foreach($galleryImages as $image)
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$image->image ) }}"
                                                    alt="Product">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="single-nav-thumb">
                                        <div class="single-slide">
                                            <img class="img-responsive" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$productDetails->image ) }}"
                                                alt="Product">
                                        </div>
                                        @foreach($galleryImages as $image)
                                            <div class="single-slide">
                                                <img class="img-responsive" src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/medium/'.$image->image ) }}"
                                                    alt="Product">
                                            </div>
                                        @endforeach
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc m-t-991">
                                <div class="single-pro-content">
                                    <h5 class="gi-single-title">{{ $productDetails->name }}</h5>
                                    <div class="gi-single-rating-wrap">
                                        <div class="gi-single-rating">
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
                                        </div>

                                        <span class="gi-read-review">
                                            |&nbsp;&nbsp;<a href="#gi-spt-nav-review">992 Ratings</a>
                                        </span>
                                    </div>

                                    <div class="gi-single-price-stoke">
                                        @if($productDetails->saleprice != null  && $productDetails->promotion_id == 0)
                                            <div class="gi-single-price">
                                                <div class="final-price">{{ $priceunit->code }} {{ $productDetails->saleprice }}<span class="price-des">-{{ $productDetails->discount }}%</span>
                                                </div>
                                                <div class="mrp">M.R.P. : <span>{{ $priceunit->code }} {{ $productDetails->price }}</span></div>
                                            </div>
                                        @elseif($productDetails->promotion_id > 0)
                                            @foreach($all_promo as $promo)
                                                @if($productDetails->promotion_id == $promo->id)
                                                    @php
                                                        $p_amount =  $promo->amount;
                                                        $pp = $productDetails->price/100*$p_amount;
                                                        $promo_price = $productDetails->price - $pp;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <div class="gi-single-price">
                                                <div class="final-price">{{ $priceunit->code }} {{ $promo_price }}<span class="price-des">-{{ $p_amount }}%</span>
                                                </div>
                                                <div class="mrp">M.R.P. : <span>{{ $priceunit->code }} {{ $productDetails->price }}</span></div>
                                            </div>
                                        @else
                                            <div class="gi-single-price">
                                                <div class="final-price">{{ $priceunit->code }} {{ $productDetails->price }}
                                                </div>
                                            </div>
                                        @endif
                                            
                                        <div class="gi-single-stoke">
                                            <span class="gi-single-sku">SKU#: WH12</span>
                                            <span class="gi-single-ps-title">IN STOCK</span>
                                        </div>
                                    </div>
                                    <div class="gi-single-desc">{{ $productDetails->description }}</div>

                                    <div class="gi-single-list">
                                        <ul>
                                            <li>
                                                <strong>
                                                    @if(session()->get('lang') == 'en')
                                                        BRAND
                                                    @elseif(session()->get('lang') == 'ar')
                                                        ماركة
                                                    @endif :
                                                </strong>
                                                @if($brands)
                                                    {{ $brands->name }}
                                                @else
                                                    @if(session()->get('lang') == 'en')
                                                        No Brands
                                                    @elseif(session()->get('lang') == 'ar')
                                                        لا ماركات
                                                    @endif
                                                @endif
                                            </li>
                                            <li>
                                                <strong>
                                                    @if(session()->get('lang') == 'en')
                                                        SELLER
                                                    @elseif(session()->get('lang') == 'ar')
                                                        متاجر
                                                    @endif :
                                                </strong> 
                                                {{ $uservendorname }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="gi-pro-variation">
                                        <div class="gi-pro-variation-inner gi-pro-variation-size">
                                            <span>Weight</span>
                                            <div class="gi-pro-variation-content">
                                                <ul>
                                                    <li class="active"><span>250g</span></li>
                                                    <li><span>500g</span></li>
                                                    <li><span>1kg</span></li>
                                                    <li><span>2kg</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-single-qty">
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" id="product-Quantity" type="text" name="ms_qtybtn" min="1" max="5" value="1">
                                        </div>
                                        <div class="gi-single-cart">
                                            <button class="btn btn-primary gi-btn-1" onclick="addToCart_btn({{ $productDetails->product_id }})">Add To Cart</button>
                                        </div>
                                        <div class="gi-single-wishlist">
                                            <a class="gi-btn-group wishlist" title="Wishlist">
                                                <i class="fi-rr-heart"></i>
                                            </a>
                                        </div>
                                        <div class="gi-single-quickview">
                                            <a href="#" class="gi-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#gi_quickview_modal">
                                                <i class="fi-rr-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single product content End -->
                <!-- Add More and get discount content Start -->
                <div class="single-add-more m-tb-40">
                    <div class="gi-add-more-slider owl-carousel">
                        <div class="add-more-item">
                            <a href="javascript:void(0)" class="gi-btn-2">+</a>
                            <div class="add-more-img">
                                <img src="{{ asset('images/frontend-images/product-images/8_1.jpg') }}" alt="product">
                            </div>
                            <div class="add-more-info">
                                <h5>Honey Spiced Nuts</h5>
                                <span class="gi-pro-rating">
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star"></i>
                                    <i class="gicon gi-star"></i>
                                </span>
                                <span class="gi-price">
                                    <span class="new-price">$32.00</span>
                                    <span class="old-price">$45.00</span>
                                </span>
                            </div>
                        </div>
                        <div class="add-more-item">
                            <a href="javascript:void(0)" class="gi-btn-2">+</a>
                            <div class="add-more-img">
                                <img src="{{ asset('images/frontend-images/product-images/2_1.jpg') }}" alt="product">
                            </div>
                            <div class="add-more-info">
                                <h5>Dates Value Pouch</h5>
                                <span class="gi-pro-rating">
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                </span>
                                <span class="gi-price">
                                    <span class="new-price">$56.00</span>
                                    <span class="old-price">$60.00</span>
                                </span>
                            </div>
                        </div>
                        <div class="add-more-item">
                            <a href="javascript:void(0)" class="gi-btn-2">+</a>
                            <div class="add-more-img">
                                <img src="{{ asset('images/frontend-images/product-images/5_1.jpg') }}" alt="product">
                            </div>
                            <div class="add-more-info">
                                <h5>Graps Mix Snack</h5>
                                <span class="gi-pro-rating">
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star"></i>
                                    <i class="gicon gi-star"></i>
                                    <i class="gicon gi-star"></i>
                                </span>
                                <span class="gi-price">
                                    <span class="new-price">$28.00</span>
                                    <span class="old-price">$35.00</span>
                                </span>
                            </div>
                        </div>
                        <div class="add-more-item">
                            <a href="javascript:void(0)" class="gi-btn-2">+</a>
                            <div class="add-more-img">
                                <img src="{{ asset('images/frontend-images/product-images/9_1.jpg') }}" alt="product">
                            </div>
                            <div class="add-more-info">
                                <h5>Roasted Almonds Pack</h5>
                                <span class="gi-pro-rating">
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                    <i class="gicon gi-star fill"></i>
                                </span>
                                <span class="gi-price">
                                    <span class="new-price">$16.00</span>
                                    <span class="old-price">$23.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single product tab start -->
                <div class="gi-single-pro-tab">
                    <div class="gi-single-pro-tab-wrapper">
                        <div class="gi-single-pro-tab-nav">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab"
                                        data-bs-target="#gi-spt-nav-details" type="button" role="tab"
                                        aria-controls="gi-spt-nav-details" aria-selected="true">
                                        @if(session()->get('lang') == 'en')
                                            Detail
                                        @elseif(session()->get('lang') == 'ar')
                                            التفاصيل
                                        @endif
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                        data-bs-target="#gi-spt-nav-info" type="button" role="tab"
                                        aria-controls="gi-spt-nav-info"
                                        aria-selected="false">
                                        @if(session()->get('lang') == 'en')
                                            Specifications
                                        @elseif(session()->get('lang') == 'ar')
                                            تحديد
                                        @endif
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vendor-tab" data-bs-toggle="tab"
                                        data-bs-target="#gi-spt-nav-vendor" type="button" role="tab"
                                        aria-controls="gi-spt-nav-vendor" aria-selected="false">
                                        @if(session()->get('lang') == 'en')
                                            Vendor
                                        @elseif(session()->get('lang') == 'ar')
                                            بائع
                                        @endif
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#gi-spt-nav-review" type="button" role="tab"
                                        aria-controls="gi-spt-nav-review" aria-selected="false">
                                        @if(session()->get('lang') == 'en')
                                            Reviews
                                        @elseif(session()->get('lang') == 'ar')
                                            التعليقات
                                        @endif
                                    </button>
                                </li>
                            </ul>

                        </div>
                        <div class="tab-content  gi-single-pro-tab-content">
                            <div id="gi-spt-nav-details" class="tab-pane fade show active">
                                <div class="gi-single-pro-tab-desc">
                                    <p>{{ $productDetails->long_description }}</p>
                                </div>
                            </div>
                            <div id="gi-spt-nav-info" class="tab-pane fade">
                                <div class="gi-single-pro-tab-moreinfo">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. It has survived not only five centuries.
                                    </p>
                                    <ul>
                                        <li><span>Model</span> SKU140</li>
                                        <li><span>Weight</span> 500 g</li>
                                        <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                        <li><span>Color</span> Black, Pink, Red, White</li>
                                        <li><span>Size</span> 10 X 20</li>
                                    </ul>
                                </div>
                            </div>
                            <div id="gi-spt-nav-vendor" class="tab-pane fade">
                                <div class="gi-single-pro-tab-moreinfo">
                                    <div class="gi-product-vendor">
                                        <div class="gi-vendor-info">
                                            <span>
                                                <img src="{{ asset('images/frontend-images/vendor/3.jpg') }}" alt="vendor">
                                            </span>
                                            <div>
                                                <h5>Ocean Crate</h5>
                                                <p>Products : 358</p>
                                                <p>Sales : 5587</p>
                                            </div>
                                        </div>
                                        <div class="gi-detail">
                                            <ul>
                                                <li><span>Phone No. :</span> +00 987654321</li>
                                                <li><span>Email. :</span> Example@gmail.com</li>
                                                <li><span>Address. :</span> 2548 Broaddus Maple Court, Madisonville
                                                    KY 4783, USA.</li>
                                            </ul>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since
                                                the
                                                1500s, when an unknown printer took a galley of type and scrambled
                                                it to
                                                make a type specimen book. It has survived not only five centuries,
                                                but also
                                                the leap into electronic typesetting, remaining essentially
                                                unchanged.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gi-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="gi-t-review-wrapper">
                                        @foreach($productRatingg as $ratee)
                                            <div class="gi-t-review-item">
                                                <div class="gi-t-review-avtar">
                                                    @if($ratee->profileImage != "" || $ratee->profileImage != null)
                                                        <img src="{{ asset('/images/frontend_images/customers/small/'.$ratee->profileImage ) }}" alt="user"/>
                                                    @else
                                                        <img src="{{ asset('/images/frontend_images/customers/large/no-img.png' ) }}" alt="user"/>
                                                    @endif
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top">
                                                        <div class="gi-t-review-name">{{$ratee->firstName}} {{$ratee->lastName}}</div>
                                                        <div class="gi-t-review-rating">
                                                            @if($ratee->star == '0')
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($ratee->star <= '1')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($ratee->star <= '2')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($ratee->star <= '3')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($ratee->star <= '4')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                            @elseif($ratee->star >= '5')
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p>{{$ratee->review}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if(Auth::check())
                                        @if(Auth::user()->hasRole('customer'))
                                            @if($canrateonproduct == "")
                                                <div class="gi-ratting-content">
                                                    <h3>
                                                        @if(session()->get('lang') == 'en')
                                                            Add a Review
                                                        @elseif(session()->get('lang') == 'ar')
                                                            إضافة إلى استعراض
                                                        @endif
                                                    </h3>
                                                    <div class="gi-ratting-form">
                                                        <form class="form-horizontal" method="post" action="{{ url(session()->get('lang').'/postproductratings/'.$product->product_id) }}">
                                                            {{ csrf_field() }}
                                                            <div class="gi-ratting-star">
                                                                <span>
                                                                    @if(session()->get('lang') == 'en')
                                                                        Your rating
                                                                    @elseif(session()->get('lang') == 'ar')
                                                                       تقييمك
                                                                    @endif :
                                                                </span>
                                                                <!-- <div class="gi-t-review-rating">
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star fill"></i>
                                                                    <i class="gicon gi-star-o"></i>
                                                                    <i class="gicon gi-star-o"></i>
                                                                    <i class="gicon gi-star-o"></i>
                                                                </div> -->
                                                                <input type="hidden" id="get_rating" name="get_rating" value="0" />
                                                                <fieldset class="rating" id="rating_div">
                                                                  <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome" onclick="ratingstar(5)"></label>
                                                                  <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good" onclick="ratingstar(4.5)"></label>
                                                                  <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good" onclick="ratingstar(4)"></label>
                                                                  <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh" onclick="ratingstar(3.5)"></label>
                                                                  <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh" onclick="ratingstar(3)"></label>
                                                                  <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad" onclick="ratingstar(2.5)"></label>
                                                                  <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda" onclick="ratingstar(2)"></label>
                                                                  <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh" onclick="ratingstar(1.5)"></label>
                                                                  <input type="radio" id="star1" name="rating" value="1" /><label class ="full" for="star1" title="Sucks" onclick="ratingstar(1)"></label>
                                                                  <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks" onclick="ratingstar(0.5)"></label>
                                                                </fieldset>
                                                            </div>
                                                            <!-- <div class="gi-ratting-input">
                                                                <input name="your-name" placeholder="Name" type="text">
                                                            </div>
                                                            <div class="gi-ratting-input">
                                                                <input name="your-email" placeholder="Email*" type="email"
                                                                    required>
                                                            </div> -->
                                                            <div class="gi-ratting-input form-submit">
                                                                <textarea name="txtcomment" id="txtcomment" placeholder="Enter Your Comment"></textarea>
                                                                <button class="gi-btn-2" type="submit"
                                                                    value="Submit" id="btncomment" name="btncomment">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
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
                                    <div id="gi-sliderPrice" class="filter__slider-price" data-min="0"
                                        data-max="250" data-step="10"></div>
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
<!-- End Single Product -->

<!-- Related product section -->
<section class="gi-related-product gi-new-product padding-tb-40">
    <div class="container">
        <div class="row overflow-hidden m-b-minus-24px">
            <div class="gi-new-prod-section col-lg-12">
                <div class="gi-products">
                    <div class="section-title-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        @if(session()->get('lang') == 'en')
                            <h2 class="gi-title">Related <span>Products</span></h2>
                            <p>Browse The Collection of Top Products</p>
                        @elseif(session()->get('lang') == 'ar')
                            <h2 class="gi-title"><span>منتجات</span> ذات صله</h2>
                            <p>تصفح مجموعة أفضل المنتجات</p>
                        @endif
                    </div>
                    <div class="gi-new-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="300">
                        <div class="new-product-carousel owl-carousel gi-product-slider">
                            @foreach($relatedProducts as $product)
                                <div class="gi-product-content">
                                    <div class="gi-product-inner">
                                        <div class="gi-pro-image-outer">
                                            <div class="gi-pro-image">
                                                <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}" class="image">
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
                                                        data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
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
                                            <a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">
                                                <h6 class="gi-pro-stitle">{{ $product->brand_name }}</h6>
                                            </a>
                                            <h5 class="gi-pro-title"><a href="{{ url(session()->get('lang').'/product/'.$product->product_id.'/'.str_replace(' ', '-', strtolower($product->name)) ) }}">{{ $product->name }}</a></h5>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related product section End -->

<script type="text/javascript">
      function buyNow_btn(id){
        var product_id = id;
        var qty = $("#product-Quantity").val();

        var hostname = window.location.origin;

        var drived_url = "";
        var url = window.location.href;

        if(url.indexOf("/en/") != -1){
          drived_url = hostname+"/en/checkout/"+product_id+"?qty="+qty;
        }
        else
        if(url.indexOf("/ar/") != -1){
          drived_url = hostname+"/ar/checkout/"+product_id+"?qty="+qty;
        }

        window.location.href = drived_url;
      }

      function addToCart_btn(id){
        var product_id = id;
        var qty = $("#product-Quantity").val();

        $.ajax({
            url: '/frontend/butnowAddtocartAjax/'+product_id+'/'+qty,
            success: data => {
              var hostname = window.location.origin;

              var drived_url = "";
              var url = window.location.href;

              if(url.indexOf("/en/") != -1){
                drived_url = hostname+"/en/cart";
              }
              else
              if(url.indexOf("/ar/") != -1){
                drived_url = hostname+"/ar/cart";
              }

              window.location.href = drived_url;
            }
        });
      }

      function ratingstar(rate){
        document.getElementById("get_rating").value = rate;
      }
    </script>

@endsection

<!-- <script type="text/javascript">
  function QuantityPlus(quantity, pid){
  document.getElementById(quantity).stepUp();
}

function QuantityMinus(quantity, pid){
  document.getElementById(quantity).stepDown();       
}
</script> -->
