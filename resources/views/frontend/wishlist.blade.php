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
                                Wishlist
                            @elseif(session()->get('lang') == 'ar')
                                قائمة الرغبات
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
                                    Wishlist
                                @elseif(session()->get('lang') == 'ar')
                                    قائمة الرغبات
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

<!-- Wishlist section -->
<section class="gi-faq padding-tb-40 gi-wishlist">
    <div class="container">
        <div class="section-title-2">
            <h2 class="gi-title">Product <span>Wishlist</span></h2>
            <p>Your product wish is our first priority.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="gi-vendor-dashboard-card">
                    <div class="gi-vendor-card-header">
                        <h5>Wishlist</h5>
                        <div class="gi-header-btn">
                            <a class="gi-btn-2" href="#">Shop Now</a>
                        </div>
                    </div>
                    <div class="gi-vendor-card-body">
                        <div class="gi-vendor-card-table">
                            <table class="table gi-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="wish-empt">
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>225</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/1_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Californian Almonds Value 250g + 50g Pack</span></td>
                                        <td><span>16 Jul 2021</span></td>
                                        <td><span>$65</span></td>
                                        <td><span class="avl">Available</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>548</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/10_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Healthy Nutmix, 200g Pack</span></td>
                                        <td><span>13 Aug 2016</span></td>
                                        <td><span>$68</span></td>
                                        <td><span class="out">Out Of Stock</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>684</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/15_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Capsicum - Red</span></td>
                                        <td><span>20 Jul 2015</span></td>
                                        <td><span>$360</span></td>
                                        <td><span class="avl">Available</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>987</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/17_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Ginger - Organic</span></td>
                                        <td><span>05 Feb 2014</span></td>
                                        <td><span>$584</span></td>
                                        <td><span class="out">Out Of Stock</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>225</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/18_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Lemon - Seedless</span></td>
                                        <td><span>23 Jul 2013</span></td>
                                        <td><span>$65</span></td>
                                        <td><span class="out">Out Of Stock</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>548</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/20_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Organic fresh Broccoli</span></td>
                                        <td><span>28 Mar 2011</span></td>
                                        <td><span>$68</span></td>
                                        <td><span class="dis">Disabled</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="pro-gl-content">
                                        <td scope="row"><span>684</span></td>
                                        <td><img class="prod-img" src="assets/img/product-images/25_1.jpg"
                                                alt="product image"></td>
                                        <td><span>Fresh Lichi</span></td>
                                        <td><span>16 Apr 2010</span></td>
                                        <td><span>$360</span></td>
                                        <td><span class="avl">Available</span></td>
                                        <td>
                                            <span class="tbl-btn">
                                                <a class="gi-btn-2 add-to-cart" href="javascript:void(0)"
                                                    title="Add To Cart">
                                                    <i class="fi-rr-shopping-basket"></i>
                                                </a>
                                                <a class="gi-btn-1 gi-remove-wish btn" href="javascript:void(0)"
                                                    title="Remove From List">
                                                    ×
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Wishlist section End -->

<!-- New product section -->
<section class="gi-new-product padding-tb-40">
    <div class="container">
        <div class="row overflow-hidden m-b-minus-24px">
            <div class="gi-new-prod-section col-lg-12">
                <div class="gi-products">
                    <div class="section-title-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        <h2 class="gi-title">New <span>Arrivals</span></h2>
                        <p>Browse The Collection of Top Products</p>
                    </div>
                    <div class="gi-new-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="300">
                        <div class="new-product-carousel owl-carousel gi-product-slider">
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <span class="label veg">
                                                    <span class="dot"></span>
                                                </span>
                                                <img class="main-image" src="assets/img/product-images/6_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/6_2.jpg"
                                                    alt="Product">
                                            </a>
                                            <span class="flags">
                                                <span class="sale">Sale</span>
                                            </span>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                        </a>
                                        <h5 class="gi-pro-title">
                                            <a href="product-left-sidebar.html">Mixed Nuts Seeds & Berries Pack</a>
                                        </h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$56.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="assets/img/product-images/3_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/3_1.jpg"
                                                    alt="Product">
                                            </a>
                                            <span class="flags">
                                                <span class="sale">Sale</span>
                                            </span>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Cookies</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Multi-Grain
                                                Jaggery Combo Cookies</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <span class="qty">10 kg</span>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$25.00</span>
                                                <span class="old-price">$30.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <span class="label nonveg">
                                                    <span class="dot"></span>
                                                </span>
                                                <img class="main-image" src="assets/img/product-images/9_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/9_2.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Foods</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Fresh Mango
                                                tasty juice 500ml pack</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$49.00</span>
                                                <span class="old-price">$65.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="assets/img/product-images/2_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/2_2.jpg"
                                                    alt="Product">
                                            </a>
                                            <span class="flags">
                                                <span class="sale">Sale</span>
                                            </span>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Dates Value
                                                Solimo Fresh Pouch</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$78.00</span>
                                                <span class="old-price">$85.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="assets/img/product-images/1_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/1_2.jpg"
                                                    alt="Product">
                                            </a>
                                            <span class="flags">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Foods</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Stick Fiber
                                                Gluten Free Masala-Magic</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <span class="qty">2 pack</span>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$45.00</span>
                                                <span class="old-price">$50.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="assets/img/product-images/24_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/24_1.jpg"
                                                    alt="Product">
                                            </a>
                                            <span class="flags">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Fresh Fruit</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Natural Hub Red
                                                Cherry Karonda</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <span class="qty">1 kg</span>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$20.00</span>
                                                <span class="old-price">$21.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gi-product-content">
                                <div class="gi-product-inner">
                                    <div class="gi-pro-image-outer">
                                        <div class="gi-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="assets/img/product-images/17_1.jpg"
                                                    alt="Product">
                                                <img class="hover-image" src="assets/img/product-images/17_1.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="gi-pro-actions">
                                                <a class="gi-btn-group wishlist" title="Wishlist"><i
                                                        class="fi-rr-heart"></i></a>
                                                <a href="#" class="gi-btn-group quickview"
                                                    data-link-action="quickview" title="Quick view"
                                                    data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                        class="fi-rr-eye"></i></a>
                                                <a href="javascript:void(0)" class="gi-btn-group compare"
                                                    title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                <a href="javascript:void(0)" title="Add To Cart"
                                                    class="gi-btn-group add-to-cart"><i
                                                        class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gi-pro-content">
                                        <a href="shop-left-sidebar-col-3.html">
                                            <h6 class="gi-pro-stitle">Tuber root</h6>
                                        </a>
                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Fresh Organic
                                                Ginger Product</a></h5>
                                        <div class="gi-pro-rat-price">
                                            <span class="gi-pro-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <i class="gicon gi-star"></i>
                                                <span class="qty">100 g</span>
                                            </span>
                                            <span class="gi-price">
                                                <span class="new-price">$2.00</span>
                                                <span class="old-price">$3.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New product section End -->

@endsection