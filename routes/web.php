<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

// Language session route
Route::get('/getLanguageCode/{lang_code}', [App\Http\Controllers\Frontend\FrontendController::class,'updateLangSession']);

// get sub-category for navbar
Route::get('/get-sub-category/{category_id}', [App\Http\Controllers\Frontend\FrontendController::class,'getSubCategoryNav']);

// country city session routes
Route::get('/frontend/checkCountryCitySession', [App\Http\Controllers\Frontend\FrontendController::class,'CheckCountryCitySession']);

Route::get('/frontend/addCountryCitySession/{countryId}/{cityId}', [App\Http\Controllers\Frontend\FrontendController::class,'AddUpdateCountryCitySession']);

Route::get('/frontend/addCountryCitySession2/{countryId}/{cityId}', [App\Http\Controllers\Frontend\ProductController::class,'AddUpdateCountryCitySession2']);

// cart item routes
Route::get('/frontend/addtocartAjax/{id}', [App\Http\Controllers\Frontend\CartController::class,'AddToCartAjax']);
Route::get('/frontend/sidecartshow', [App\Http\Controllers\Frontend\CartController::class,'sideCartShowOnAddToCart']);

Route::get('/frontend/butnowAddtocartAjax/{id}/{qty}', [App\Http\Controllers\Frontend\CartController::class,'BuyNowAddToCartAjax']);

Route::get('/frontend/quantitycartAjax/{id}/{qty}/{type}', [App\Http\Controllers\Frontend\CartController::class,'QuantityCartAjax']);
Route::get('/frontend/quantitycartweightAjax/{id}/{qty}/{type}', [App\Http\Controllers\Frontend\CartController::class,'QuantityCartWeightAjax']);

// country state city name route
Route::get('/frontend/statename/{country_id}',[App\Http\Controllers\Frontend\FrontendController::class,'getStateName']);
Route::get('/frontend/cityname/{country_id}',[App\Http\Controllers\Frontend\FrontendController::class,'getCityName']);
Route::get('/frontend/statecityname/{state_id}',[App\Http\Controllers\Frontend\FrontendController::class,'getStateCityName']);

// frontend customer country state city name routes
Route::get('/frontend/customer/statename/{country_id}',[App\Http\Controllers\Frontend\CustomerController::class,'getStateName']);
Route::get('/frontend/customer/cityname/{country_id}',[App\Http\Controllers\Frontend\CustomerController::class,'getCityName']);
Route::get('/frontend/customer/statecityname/{state_id}',[App\Http\Controllers\Frontend\CustomerController::class,'getStateCityName']);
// get city area
Route::get('/frontend/customer/getcityareas/{city_id}',[App\Http\Controllers\CityAreaController::class,'getcityareaname']);

// zone/area shipping cost
Route::get('/frontend/customer/getcityareasshippingcost/{city_id}/{total_weight}',[App\Http\Controllers\Frontend\CustomerController::class,'getcityareasshippingcost']);

Route::get('/', function () { return redirect("en/home"); });

// Support Chat For FRONT User
Route::get('/get/support-chat/msgs', [App\Http\Controllers\SupportChatController::class, 'frontuser_get_msgs']);
Route::post('/send/support-chat/msgs', [App\Http\Controllers\SupportChatController::class, 'frontuser_send_msgs']);

Route::group([
    'prefix' => '{lang}',
    'middleware' => 'setlocale'
], function () {
    Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class,'index']);

    Route::get('/about-us', [App\Http\Controllers\Frontend\FrontendController::class,'aboutus']);
    Route::get('/contact-us', [App\Http\Controllers\Frontend\FrontendController::class,'contactus']);

    // support chat page route
    Route::get('/support-chat', [App\Http\Controllers\Frontend\FrontendController::class, 'supportchat']);

    // vendor-shop Register
    Route::match(['get','post'],'/sell-with-us', [App\Http\Controllers\Frontend\VendorController::class,'register']);

    //User Login
    Route::match(['get','post'],'/login', [App\Http\Controllers\Frontend\FrontendController::class,'login']);
    Route::match(['get','post'],'/forgot-password', [App\Http\Controllers\Frontend\FrontendController::class,'chk_email']);
    Route::post('/forgot-password/updated', [App\Http\Controllers\Frontend\FrontendController::class,'lostPasswordUpdated']);

    Route::get('/shop/{categoryId}/{subcategoryId}/{brandId}/{searchProduct?}', [App\Http\Controllers\Frontend\ProductController::class,'viewProducts']);
   
    Route::get('/vendor/{vendor_name}&{id}', [App\Http\Controllers\Frontend\VendorShopController::class,'getVendorProducts']);

    Route::get('/product/{id}/{slug_url}', [App\Http\Controllers\Frontend\ProductDetailController::class,'getProductDetails']);

    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class,'getCartProducts']);

    Route::get('/wishlist', [App\Http\Controllers\Frontend\FrontendController::class,'getwishlist']);

    Route::get('/order/{id}', [App\Http\Controllers\Frontend\CheckoutController::class,'getOrderConfirmation']);

    Route::match(['get','post'],'/checkout/place-order', [App\Http\Controllers\Frontend\CheckoutController::class,'placeOrder']);

    Route::match(['get','post'],'/checkout/place-cart-order', [App\Http\Controllers\Frontend\CheckoutController::class,'placeCartOrder']);

    Route::get('/checkout/{id}', [App\Http\Controllers\Frontend\CheckoutController::class,'getProductDetails']);
    
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class,'getCartProducts']);

    // cart item delete route
    Route::get('/frontend/deletecartAjax/{id}', [App\Http\Controllers\Frontend\CartController::class,'DeleteCartAjax']);

    // active rider route
    Route::get('/rider/account/activate/{id}', [App\Http\Controllers\Rider\RiderController::class, 'activeRiderAccount']);

    // Customer routes
    Route::match(['get','post'],'/register', [App\Http\Controllers\Frontend\CustomerController::class,'register']);

    Route::group(['middleware' => ['role: |customer']], function () {
        Route::match(['get','post'],'/postproductratings/{productId}', [App\Http\Controllers\Frontend\ProductDetailController::class,'postRateProduct']);

        Route::get('/my-account', [App\Http\Controllers\Frontend\CustomerController::class,'myAccount']);
        Route::match(['get','post'],'/edit-profile', [App\Http\Controllers\Frontend\CustomerController::class,'customerEditProfile']);
        Route::get('/my-orders', [App\Http\Controllers\Frontend\CustomerController::class,'customerOrders']);
        Route::get('/order-details/{id}', [App\Http\Controllers\Frontend\CustomerController::class,'customerOrderDetail']);

        Route::match(['get','post'],'/change-password', [App\Http\Controllers\Frontend\CustomerController::class,'updateCustomerPassword']);

        Route::get('/user-logout', [App\Http\Controllers\Frontend\CustomerController::class,'logout']);
    });

});


//my account 10-06-2019
Route::match(['get','post'],'/vendorregister', [App\Http\Controllers\VendorAuthController::class,'showVendorRegistrationForm']);


// Admin Login
Route::match(['get','post'],'/admin', [App\Http\Controllers\AdminController::class,'login']);
Route::match(['get','post'],'/admin/lost-password', [App\Http\Controllers\AdminController::class,'chk_email']);
Route::post('/admin/lost-password/updated', [App\Http\Controllers\AdminController::class,'lostPasswordUpdated']);

Route::group(['middleware' => ['role: |admin']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class,'dashboard']);
    Route::get('/admin/logout', [App\Http\Controllers\AdminController::class,'logout']);

    Route::get('/admin/settings', [App\Http\Controllers\AdminController::class,'settings']);
    Route::match(['get','post'],'/admin/update-pwd', [App\Http\Controllers\AdminController::class,'updatePassword']);

    // Slider Route(Admin)
    Route::match(['get','post'],'/admin/add-slider', [App\Http\Controllers\SliderController::class,'addSlider']);
    Route::get('/admin/view-sliders', [App\Http\Controllers\SliderController::class,'viewSlider']);
    Route::match(['get','post'],'/admin/edit-slider/{id}', [App\Http\Controllers\SliderController::class,'editSlider']);
    Route::match(['get','post'],'/admin/delete-slider/{id}', [App\Http\Controllers\SliderController::class,'deleteSlider']);

    // Home Banner Route(Admin)
    Route::match(['get','post'],'/admin/add-home-banner', [App\Http\Controllers\HomeBannerController::class,'addHomeBanner']);
    Route::get('/admin/view-home-banners', [App\Http\Controllers\HomeBannerController::class,'viewHomeBanner']);
    Route::match(['get','post'],'/admin/edit-home-banner/{id}', [App\Http\Controllers\HomeBannerController::class,'editHomeBanner']);
    Route::match(['get','post'],'/admin/delete-home-banner/{id}', [App\Http\Controllers\HomeBannerController::class,'deleteHomeBanner']);

    // We Serve/Provide Card Route(Admin)
    Route::match(['get','post'],'/admin/add-we-serve-card', [App\Http\Controllers\WeServeProvideController::class,'addWeServeProvide']);
    Route::get('/admin/view-we-serve-cards', [App\Http\Controllers\WeServeProvideController::class,'viewWeServeProvide']);
    Route::match(['get','post'],'/admin/edit-we-serve-card/{id}', [App\Http\Controllers\WeServeProvideController::class,'editWeServeProvide']);
    Route::match(['get','post'],'/admin/delete-we-serve-card/{id}', [App\Http\Controllers\WeServeProvideController::class,'deleteWeServeProvide']);

    // About Route(Admin)
    Route::match(['get','post'],'/admin/add-about', [App\Http\Controllers\AboutController::class,'addAbout']);
    Route::get('/admin/view-about', [App\Http\Controllers\AboutController::class,'viewAbout']);
    Route::get('/admin/view-about-detail/{id}', [App\Http\Controllers\AboutController::class,'viewAboutDetail']);
    Route::match(['get','post'],'/admin/edit-about/{id}', [App\Http\Controllers\AboutController::class,'editAbout']);
    Route::match(['get','post'],'/admin/delete-about/{id}', [App\Http\Controllers\AboutController::class,'deleteAbout']);

    // Customer Review Route(Admin)
    Route::match(['get','post'],'/admin/add-customer-review', [App\Http\Controllers\CustomerReviewController::class,'addCustomerReview']);
    Route::get('/admin/view-customer-reviews', [App\Http\Controllers\CustomerReviewController::class,'viewCustomerReview']);
    Route::match(['get','post'],'/admin/edit-customer-review/{id}', [App\Http\Controllers\CustomerReviewController::class,'editCustomerReview']);
    Route::match(['get','post'],'/admin/delete-customer-review/{id}', [App\Http\Controllers\CustomerReviewController::class,'deleteCustomerReview']);

    // Our Team Route(Admin)
    Route::match(['get','post'],'/admin/add-our-team', [App\Http\Controllers\OurTeamController::class,'addOurTeam']);
    Route::get('/admin/view-our-team', [App\Http\Controllers\OurTeamController::class,'viewOurTeam']);
    Route::match(['get','post'],'/admin/edit-our-team/{id}', [App\Http\Controllers\OurTeamController::class,'editOurTeam']);
    Route::match(['get','post'],'/admin/delete-our-team/{id}', [App\Http\Controllers\OurTeamController::class,'deleteOurTeam']);

    //Footer route
    Route::get('/admin/view-footer-item', [App\Http\Controllers\FooterController::class,'viewFooter']);
    Route::match(['get', 'post'], '/admin/add-footer-item', [App\Http\Controllers\FooterController::class,'addFooter']);
    Route::match(['get', 'post'], '/admin/add-footer-item/{column_name}/{id}', [App\Http\Controllers\FooterController::class,'editFooter']);
    Route::match(['get', 'post'], '/admin/edit-footer-item/{column_name}/{id}', [App\Http\Controllers\FooterController::class,'editFooter']);
    Route::get('/admin/delete-footer-item/{column_name}/{id}', [App\Http\Controllers\FooterController::class,'deleteFooter']);

    //Analytics Route(Admin)
    Route::get('/admin/view-analytics', [App\Http\Controllers\AnalyticsController::class,'viewAnalytics']);

    //meta tags route for SEO
    Route::get('/admin/view-meta-tags', [App\Http\Controllers\MetaTagController::class, 'viewMetaTag']);
    Route::match(['get', 'post'], '/admin/add-meta-tags', [App\Http\Controllers\MetaTagController::class, 'addMetaTag']);
    Route::match(['get', 'post'], '/admin/edit-meta-tag/{id}', [App\Http\Controllers\MetaTagController::class, 'editMetaTag']);
    Route::get('/admin/delete-meta-tag/{id}', [App\Http\Controllers\MetaTagController::class, 'deleteMetaTag']);

    //VAT route
    Route::match(['get', 'post'], '/admin/edit-vat', [App\Http\Controllers\VATController::class, 'editVAT']);

    // Brands Route(Admin)
    Route::match(['get','post'],'/admin/add-brand', [App\Http\Controllers\BrandController::class,'addBrand']);
    Route::get('/admin/view-brands', [App\Http\Controllers\BrandController::class,'viewBrands']);
    Route::get('/admin/view-en-brands', [App\Http\Controllers\BrandController::class,'viewENBrands']);
    Route::get('/admin/view-ar-brands', [App\Http\Controllers\BrandController::class,'viewARBrands']);
    Route::match(['get','post'],'/admin/edit-brand/{id}', [App\Http\Controllers\BrandController::class,'editBrand']);
    Route::match(['get','post'],'/admin/delete-brand/{id}', [App\Http\Controllers\BrandController::class,'deleteBrand']);

    // Categories Route(Admin)
    Route::match(['get','post'],'/admin/add-category', [App\Http\Controllers\CategoryController::class,'addCategory']);
    Route::get('/admin/view-categories', [App\Http\Controllers\CategoryController::class,'viewCategories']);
    Route::get('/admin/view-en-categories', [App\Http\Controllers\CategoryController::class,'viewENCategories']);
    Route::get('/admin/view-ar-categories', [App\Http\Controllers\CategoryController::class,'viewARCategories']);
    Route::match(['get','post'],'/admin/edit-category/{id}', [App\Http\Controllers\CategoryController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-category/{id}', [App\Http\Controllers\CategoryController::class,'deleteCategory']);

    // Products Route(Admin)
    Route::match(['get','post'],'/admin/add-product', [App\Http\Controllers\ProductController::class,'addProduct']);
    Route::match(['get','post'],'/admin/edit-product/{id}', [App\Http\Controllers\ProductController::class,'editProduct']);
    Route::get('/admin/view-products', [App\Http\Controllers\ProductController::class,'viewProducts']);
    Route::get('/admin/view-en-products', [App\Http\Controllers\ProductController::class,'viewEnProducts']);
    Route::get('/admin/view-ar-products', [App\Http\Controllers\ProductController::class,'viewArProducts']);
    Route::get('/admin/delete-product/{id}', [App\Http\Controllers\ProductController::class,'deleteProducts']);
    Route::get('/admin/delete-product-image/{id}', [App\Http\Controllers\ProductController::class,'deleteProductImage']);
    Route::get('/admin/delete-product-galaryimage/{id}', [App\Http\Controllers\ProductController::class,'deleteProductGalleryImage']);

    Route::get('/admin/getproductcountryname',[App\Http\Controllers\ProductController::class,'getProductCountryName']);

    Route::get('/admin/getproductcityname/{country_id}',[App\Http\Controllers\ProductController::class,'getProductCityName']);

    // Product City Route(Admin)
    Route::get('/admin/view-product-cities/{productId}', [App\Http\Controllers\ProductCityController::class,'viewProductCities']);
    Route::match(['get','post'],'/admin/add-product-city/{productId}', [App\Http\Controllers\ProductCityController::class,'addProductCity']);
    Route::get('/admin/delete-product-city/{id}', [App\Http\Controllers\ProductCityController::class,'deleteProductCity']);

    //promotion route 
    Route::get('/admin/view-promotions', [App\Http\Controllers\PromotionController::class, 'viewPromotion']);
    Route::get('/admin/assign-promotion/{id}/{category_id}', [App\Http\Controllers\PromotionController::class, 'viewProductForPromotion']);
    Route::match(['get', 'post'], '/admin/add-promotion', [App\Http\Controllers\PromotionController::class, 'addPromotion']);
    Route::match(['get', 'post'], '/admin/edit-promotion/{id}', [App\Http\Controllers\PromotionController::class, 'editPromotion']);
    Route::get('/admin/delete-promotion/{id}', [App\Http\Controllers\PromotionController::class, 'deletePromotion']);

    // assing to all products
    Route::get('/admin/assign-promotion-to-all-products/{id}', [App\Http\Controllers\PromotionController::class, 'assignPromotionToAllProducts']);
    // un-assing to all products
    Route::get('/admin/unassign-promotion-to-all-products/{id}', [App\Http\Controllers\PromotionController::class, 'unassignPromotionToAllProducts']);
    // assing to all category products
    Route::get('/admin/assign-promotion-to-all-category-products/{category_id}/{promotion_id}', [App\Http\Controllers\PromotionController::class, 'assignPromotionToAllCategoryProducts']);
    // un-assing to all category products
    Route::get('/admin/unassign-promotion-to-all-category-products/{category_id}/{promotion_id}', [App\Http\Controllers\PromotionController::class, 'unassignPromotionToAllCategoryProducts']);
    // assing to one product
    Route::get('/admin/assign-promotion-to-product/{prodcut_id}/{promotion_id}', [App\Http\Controllers\PromotionController::class, 'assignPromotionToProduct']);
    // un-assing to one product
    Route::get('/admin/unassign-promotion-to-product/{prodcut_id}/{promotion_id}', [App\Http\Controllers\PromotionController::class, 'unassignPromotionToProduct']);

    // Product Units Route(Admin)
    Route::match(['get','post'],'/admin/add-prod-unit', [App\Http\Controllers\ProductUnitController::class,'addProductUnit']);
    Route::get('/admin/view-prod-units', [App\Http\Controllers\ProductUnitController::class,'viewProductUnits']);
    Route::get('/admin/view-en-prod-units', [App\Http\Controllers\ProductUnitController::class,'viewENProductUnits']);
    Route::get('/admin/view-ar-prod-units', [App\Http\Controllers\ProductUnitController::class,'viewARProductUnits']);
    Route::match(['get','post'],'/admin/edit-prod-unit/{id}', [App\Http\Controllers\ProductUnitController::class,'editProductUnit']);
    Route::match(['get','post'],'/admin/delete-prod-unit/{id}', [App\Http\Controllers\ProductUnitController::class,'deleteProductUnit']);

    // Price Units Route(Admin)
    Route::match(['get','post'],'/admin/add-price-unit', [App\Http\Controllers\PriceUnitController::class,'addPriceUnit']);
    Route::get('/admin/view-price-units', [App\Http\Controllers\PriceUnitController::class,'viewPriceUnits']);
    Route::get('/admin/view-en-price-units', [App\Http\Controllers\PriceUnitController::class,'viewENPriceUnits']);
    Route::get('/admin/view-ar-price-units', [App\Http\Controllers\PriceUnitController::class,'viewARPriceUnits']);
    Route::match(['get','post'],'/admin/edit-price-unit/{id}', [App\Http\Controllers\PriceUnitController::class,'editPriceUnit']);
    Route::match(['get','post'],'/admin/delete-price-unit/{id}', [App\Http\Controllers\PriceUnitController::class,'deletePriceUnit']);

    //country
    Route::match(['get','post'],'/admin/add-country', [App\Http\Controllers\CountryController::class,'addCountry']);
    Route::match(['get','post'],'/admin/edit-country/{id}', [App\Http\Controllers\CountryController::class,'editCountry']);
    Route::get('/admin/view-country', [App\Http\Controllers\CountryController::class,'viewCountry']);
    Route::get('/admin/delete-country/{id}', [App\Http\Controllers\CountryController::class,'deleteCountry']);

    //state
    Route::match(['get','post'],'/admin/add-state', [App\Http\Controllers\StateController::class,'addState']);
    Route::match(['get','post'],'/admin/edit-state/{id}', [App\Http\Controllers\StateController::class,'editState']);
    Route::get('/admin/view-state', [App\Http\Controllers\StateController::class,'viewState']);
    Route::get('/admin/delete-state/{id}', [App\Http\Controllers\StateController::class,'deleteState']);

    //city
    Route::match(['get','post'],'/admin/add-city', [App\Http\Controllers\CityController::class,'addCity']);
    Route::match(['get','post'],'/admin/edit-city/{id}', [App\Http\Controllers\CityController::class,'editCity']);
    Route::get('/admin/view-city', [App\Http\Controllers\CityController::class,'viewCity']);
    Route::get('/admin/delete-city/{id}', [App\Http\Controllers\CityController::class,'deleteCity']);

    //city area
    Route::match(['get','post'],'/admin/add-city-area', [App\Http\Controllers\CityAreaController::class,'addCityArea']);
    Route::match(['get','post'],'/admin/edit-city-area/{id}', [App\Http\Controllers\CityAreaController::class,'editCityArea']);
    Route::get('/admin/view-city-area', [App\Http\Controllers\CityAreaController::class,'viewCityArea']);
    Route::get('/admin/delete-city-area/{id}', [App\Http\Controllers\CityAreaController::class,'deleteCityArea']);

    // order Routes
    Route::match(['get','post'],'/admin/add-order', [App\Http\Controllers\OrderController::class,'addOrder']);
    Route::match(['get','post'],'/admin/edit-order/{id}', [App\Http\Controllers\OrderController::class,'editOrder']);
    Route::get('/admin/view-order', [App\Http\Controllers\OrderController::class,'viewOrder']);
    Route::get('/admin/delete-order/{id}', [App\Http\Controllers\OrderController::class,'deleteOrder']);

    // order detail routes
    Route::get('/admin/order-detail/{id}', [App\Http\Controllers\OrderDetailsController::class,'viewOrderDetail']);
    Route::get('/admin/delete-order-detail/{id}', [App\Http\Controllers\OrderDetailsController::class,'deleteOrderDetail']);
    Route::match(['get','post'],'/admin/edit-order-detail/{id}', [App\Http\Controllers\OrderDetailsController::class,'editOrderDetail']);

    // customer
    Route::get('/admin/view-customer', [App\Http\Controllers\CustomerController::class,'viewCustomer']);
    Route::match(['get','post'],'/admin/edit-customer/{id}', [App\Http\Controllers\CustomerController::class,'editCustomer']);
    Route::get('/admin/delete-customer/{id}', [App\Http\Controllers\CustomerController::class,'deleteCustomer']);

    // Sell wit us (Vendor Route)
    Route::get('/admin/view-vendors', [App\Http\Controllers\VendorController::class,'viewVendors']);
    Route::get('/admin/vendor-details/{id}', [App\Http\Controllers\VendorController::class,'viewVendorDetails']);
    Route::get('/admin/delete-vendor/{id}', [App\Http\Controllers\VendorController::class,'deleteVendor']);
    Route::get('/admin/active-vendor/{id}', [App\Http\Controllers\VendorController::class,'activeVendor']);
    Route::get('/admin/deactive-vendor/{id}', [App\Http\Controllers\VendorController::class,'deactiveVendor']);
    Route::get('/admin/update_vendorApprovalRequest', [App\Http\Controllers\VendorController::class,'updateVendorApprovalRequest']);
    Route::get('/admin/update_vendorCityRequest', [App\Http\Controllers\VendorController::class,'updateVendorCityRequest']);

    // shipping/delivery zone charges 
    Route::get('/admin/view-zone', [App\Http\Controllers\ShippingcostController::class,'viewShippingcosts']);
    Route::get('/admin/view-zone-detail/{id}', [App\Http\Controllers\ShippingcostController::class,'viewShippingcostsdetails']);
    Route::match(['get','post'],'/admin/add-zone', [App\Http\Controllers\ShippingcostController::class,'addShippingcost']);
    Route::match(['get','post'],'/admin/edit-zone/{id}', [App\Http\Controllers\ShippingcostController::class,'editShippingcost']);
    Route::match(['get','post'],'/admin/add-zone-areas/{zone_id}', [App\Http\Controllers\ShippingcostController::class,'addShippingcostcities']);
    Route::match(['get','post'],'/admin/add-zone-charges/{zone_id}', [App\Http\Controllers\ShippingcostController::class,'addShippingcostzonecharges']);
    Route::match(['get','post'],'/admin/edit-zone-charges/{id}', [App\Http\Controllers\ShippingcostController::class,'editShippingcostzonecharges']);
    Route::get('/admin/delete-zone/{id}', [App\Http\Controllers\ShippingcostController::class,'deleteShippingCost']);
    Route::get('/admin/delete-zone-area/{id}', [App\Http\Controllers\ShippingcostController::class,'deleteShippingCostArea']);
    Route::get('/admin/delete-zone-charges/{id}', [App\Http\Controllers\ShippingcostController::class,'deleteShippingCostAreaCharges']);

    //Sub Admin Routes
    Route::get('/admin/view-sub-admin', [App\Http\Controllers\SubAdminController::class,'viewSubAdmin']);
    Route::match(['get','post'],'/admin/create-sub-admin', [App\Http\Controllers\SubAdminController::class,'addSubAdmin']);
    Route::match(['get','post'],'/admin/edit-sub-admin/{id}', [App\Http\Controllers\SubAdminController::class,'editSubAdmin']);
    Route::get('/admin/delete-sub-admin/{id}',[App\Http\Controllers\SubAdminController::class,'deleteSubAdmin']);

    //Sub Admin Privileges Routes
    Route::get('/admin/view-sub-admin-privileges/{userid}', [App\Http\Controllers\SubAdminPrivilegeController::class,'viewPrivileges']);
    Route::match(['get','post'],'/admin/create-sub-admin-privilege/{userid}', [App\Http\Controllers\SubAdminPrivilegeController::class,'addPrivilege']);
    Route::match(['get','post'],'/admin/edit-sub-admin-privilege/{id}', [App\Http\Controllers\SubAdminPrivilegeController::class,'editPrivilege']);
    Route::get('/admin/delete-sub-admin-privilege/{id}',[App\Http\Controllers\SubAdminPrivilegeController::class,'deletePrivilege']);

    Route::get('/admin/getprivilegecityname/{country_id}',[App\Http\Controllers\SubAdminPrivilegeController::class,'getPrivilegeCityName']);
    Route::get('/admin/getprivilegestatename/{country_id}',[App\Http\Controllers\SubAdminPrivilegeController::class,'getPrivilegeStateName']);

    //Rider Routes
    Route::get('/admin/view-rider', [App\Http\Controllers\RiderController::class,'viewRider']);
    Route::get('/admin/view-rider/orders/{id}', [App\Http\Controllers\RiderController::class,'viewRiderOrder']);
    Route::get('/admin/view-rider-detail/{id}', [App\Http\Controllers\RiderController::class,'viewRiderDetail']);
    Route::match(['get','post'],'/admin/create-rider', [App\Http\Controllers\RiderController::class,'addRider']);
    Route::match(['get','post'],'/admin/edit-rider/{id}', [App\Http\Controllers\RiderController::class,'editRider']);
    Route::get('/admin/delete-rider/{id}',[App\Http\Controllers\RiderController::class,'deleteRider']);

    // Support Chat
    Route::get('/admin/view-support-chat',[App\Http\Controllers\SupportChatController::class,'viewchatlisttoadmin']);
    Route::get('/admin/view-support-chat/{id}', [App\Http\Controllers\SupportChatController::class, 'box_msgs']);
    Route::get('/admin/delete-chat/{id}', [App\Http\Controllers\SupportChatController::class, 'deleteChat']);

    Route::get('/admin/support-chat/msgs/get/{id}', [App\Http\Controllers\SupportChatController::class, 'get_msgs']);
    Route::post('/admin/support-chat/msgs/send', [App\Http\Controllers\SupportChatController::class, 'send_msgs']);

    // get state
    Route::get('/admin/getstates/{country_id}',[App\Http\Controllers\CityAreaController::class,'getstatename']);
    // get city
    Route::get('/admin/getcities/{state_id}',[App\Http\Controllers\CityAreaController::class,'getcityname']);
    // get city area
    Route::get('/admin/getcityareas/{city_id}',[App\Http\Controllers\CityAreaController::class,'getcityareaname']);

});

Route::group(['middleware' => ['role: |sub-admin']], function () {
    Route::get('/subadmin/dashboard', [App\Http\Controllers\Subadmin\SubadminController::class,'dashboard']);
    Route::get('/subadmin/logout', [App\Http\Controllers\Subadmin\SubadminController::class,'logout']);

    Route::get('/subadmin/settings', [App\Http\Controllers\Subadmin\SubadminController::class,'settings']);
    Route::match(['get','post'],'/subadmin/update-pwd', [App\Http\Controllers\Subadmin\SubadminController::class,'updatePassword']);

    Route::get('/subadmin/getPrivilegeItems/{cityid}', [App\Http\Controllers\Subadmin\SubadminController::class,'getPrivilegeItems']);

    // Products Route(Sub Admin)
    Route::match(['get','post'],'/subadmin/add-product', [App\Http\Controllers\Subadmin\ProductController::class,'addProduct']);
    Route::match(['get','post'],'/subadmin/edit-product/{id}', [App\Http\Controllers\Subadmin\ProductController::class,'editProduct']);
    Route::get('/subadmin/view-products', [App\Http\Controllers\Subadmin\ProductController::class,'viewProducts']);
    Route::get('/subadmin/view-en-products', [App\Http\Controllers\Subadmin\ProductController::class,'viewEnProducts']);
    Route::get('/subadmin/view-ar-products', [App\Http\Controllers\Subadmin\ProductController::class,'viewArProducts']);
    Route::get('/subadmin/delete-product/{id}', [App\Http\Controllers\Subadmin\ProductController::class,'deleteProduct']);
    Route::get('/subadmin/delete-product-image/{id}', [App\Http\Controllers\Subadmin\ProductController::class,'deleteProductImage']);
    Route::get('/subadmin/delete-product-galaryimage/{id}', [App\Http\Controllers\Subadmin\ProductController::class,'deleteProductGalleryImage']);


    Route::get('/subadmin/getproductcountryname',[App\Http\Controllers\Subadmin\ProductController::class,'getProductCountryName']);

    Route::get('/subadmin/getproductcityname/{country_id}',[App\Http\Controllers\Subadmin\ProductController::class,'getProductCityName']);


    // Product City Route(Admin)
    Route::get('/subadmin/view-product-cities/{productId}', [App\Http\Controllers\Subadmin\ProductCityController::class,'viewProductCities']);
    Route::match(['get','post'],'/subadmin/add-product-city/{productId}', [App\Http\Controllers\Subadmin\ProductCityController::class,'addProductCity']);
    Route::get('/subadmin/delete-product-city/{id}', [App\Http\Controllers\Subadmin\ProductCityController::class,'deleteProductCity']);

    Route::get('/subadmin/subprivilegecityname/{country_id}',[App\Http\Controllers\Subadmin\ProductsController::class,'getCityName']);

    // order Routes
    Route::match(['get','post'],'/subadmin/add-order', [App\Http\Controllers\Subadmin\OrderController::class,'addOrder']);
    Route::match(['get','post'],'/subadmin/edit-order/{id}', [App\Http\Controllers\Subadmin\OrderController::class,'editOrder']);
    Route::get('/subadmin/view-order', [App\Http\Controllers\Subadmin\OrderController::class,'viewOrder']);
    Route::get('/subadmin/delete-order/{id}', [App\Http\Controllers\Subadmin\OrderController::class,'deleteOrder']);

    // order detail routes
    Route::get('/subadmin/order-detail/{id}', [App\Http\Controllers\Subadmin\OrderDetailsController::class,'viewOrderDetail']);
    Route::get('/subadmin/delete-order-detail/{id}', [App\Http\Controllers\Subadmin\OrderDetailsController::class,'deleteOrderDetail']);
    Route::match(['get','post'],'/subadmin/edit-order-detail/{id}', [App\Http\Controllers\Subadmin\OrderDetailsController::class,'editOrderDetail']);

    // Sell wit us (Vendor Route)
    Route::get('/subadmin/view-vendors', [App\Http\Controllers\Subadmin\VendorController::class,'viewVendors']);
    Route::get('/subadmin/vendor-details/{id}', [App\Http\Controllers\Subadmin\VendorController::class,'viewVendorDetails']);
    Route::get('/subadmin/delete-vendor/{id}', [App\Http\Controllers\Subadmin\VendorController::class,'deleteVendor']);
    Route::get('/subadmin/active-vendor/{id}', [App\Http\Controllers\Subadmin\VendorController::class,'activeVendor']);
    Route::get('/subadmin/deactive-vendor/{id}', [App\Http\Controllers\Subadmin\VendorController::class,'deactiveVendor']);

    Route::get('/subadmin/update_vendorApprovalRequest', [App\Http\Controllers\Subadmin\VendorController::class,'updateVendorApprovalRequest']);

    Route::get('/subadmin/update_vendorCityRequest', [App\Http\Controllers\Subadmin\VendorController::class,'updateVendorCityRequest']);

    //Vendor Privileges Routes
    Route::get('/subadmin/view-vendor-privileges/{userid}', [App\Http\Controllers\Subadmin\VendorPrivilegeController::class,'viewPrivileges']);
    Route::match(['get','post'],'/subadmin/create-vendor-privilege/{userid}', [App\Http\Controllers\Subadmin\VendorPrivilegeController::class,'addPrivilege']);
    Route::match(['get','post'],'/subadmin/edit-vendor-privilege/{id}', [App\Http\Controllers\Subadmin\VendorPrivilegeController::class,'editPrivilege']);
    Route::get('/subadmin/delete-vendor-privilege/{id}',[App\Http\Controllers\Subadmin\VendorPrivilegeController::class,'deletePrivilege']);

    //Rider Routes
    Route::get('/subadmin/view-rider', [App\Http\Controllers\Subadmin\RiderController::class,'viewRider']);
    Route::get('/subadmin/view-rider/orders/{id}', [App\Http\Controllers\Subadmin\RiderController::class,'viewRiderOrder']);
    Route::get('/subadmin/view-rider-detail/{id}', [App\Http\Controllers\Subadmin\RiderController::class,'viewRiderDetail']);
    Route::match(['get','post'],'/subadmin/create-rider', [App\Http\Controllers\Subadmin\RiderController::class,'addRider']);
    Route::match(['get','post'],'/subadmin/edit-rider/{id}', [App\Http\Controllers\Subadmin\RiderController::class,'editRider']);
    Route::get('/subadmin/delete-rider/{id}',[App\Http\Controllers\Subadmin\RiderController::class,'deleteRider']);


});

Route::group(['middleware' => ['role: |vendor']], function () {

    Route::get('/vendor/dashboard', [App\Http\Controllers\Vendor\VendorController::class,'dashboard']);
    Route::get('/vendor/logout', [App\Http\Controllers\Vendor\VendorController::class,'logout']);

    Route::get('/vendor/settings', [App\Http\Controllers\Vendor\VendorController::class,'settings']);
    Route::match(['get','post'],'/vendor/update-pwd', [App\Http\Controllers\Vendor\VendorController::class,'updatePassword']);

    Route::get('/vendor/getVendorPrivilegeItems/{cityid}', [App\Http\Controllers\Vendor\VendorController::class,'getVendorPrivilegeItems']);

    // Products Route(Vendor)
    Route::match(['get','post'],'/vendor/add-product', [App\Http\Controllers\Vendor\ProductController::class,'addProduct']);
    Route::match(['get','post'],'/vendor/edit-product/{id}', [App\Http\Controllers\Vendor\ProductController::class,'editProduct']);
    Route::get('/vendor/view-products', [App\Http\Controllers\Vendor\ProductController::class,'viewProducts']);
    Route::get('/vendor/view-en-products', [App\Http\Controllers\Vendor\ProductController::class,'viewEnProducts']);
    Route::get('/vendor/view-ar-products', [App\Http\Controllers\Vendor\ProductController::class,'viewArProducts']);
    Route::get('/vendor/delete-product/{id}', [App\Http\Controllers\Vendor\ProductController::class,'deleteProduct']);
    Route::get('/vendor/delete-product-image/{id}', [App\Http\Controllers\Vendor\ProductController::class,'deleteProductImage']);
    Route::get('/vendor/delete-product-galaryimage/{id}', [App\Http\Controllers\Vendor\ProductController::class,'deleteProductGalleryImage']);


    Route::get('/vendor/getproductcountryname',[App\Http\Controllers\Vendor\ProductController::class,'getProductCountryName']);

    Route::get('/vendor/getproductcityname/{country_id}',[App\Http\Controllers\Vendor\ProductController::class,'getProductCityName']);


    // Product City Route(Admin)
    Route::get('/vendor/view-product-cities/{productId}', [App\Http\Controllers\Vendor\ProductCityController::class,'viewProductCities']);
    Route::match(['get','post'],'/vendor/add-product-city/{productId}', [App\Http\Controllers\Vendor\ProductCityController::class,'addProductCity']);
    Route::get('/vendor/delete-product-city/{id}', [App\Http\Controllers\Vendor\ProductCityController::class,'deleteProductCity']);


    Route::get('/vendor/venprivilegecityname/{country_id}',[App\Http\Controllers\Vendor\ProductsController::class,'getCityName']);

    // order Routes
    Route::match(['get','post'],'/vendor/add-order', [App\Http\Controllers\Vendor\OrderController::class,'addOrder']);
    Route::match(['get','post'],'/vendor/edit-order/{id}', [App\Http\Controllers\Vendor\OrderController::class,'editOrder']);
    Route::get('/vendor/view-order', [App\Http\Controllers\Vendor\OrderController::class,'viewOrder']);
    Route::get('/vendor/delete-order/{id}', [App\Http\Controllers\Vendor\OrderController::class,'deleteOrder']);

    // order detail routes
    Route::get('/vendor/order-detail/{id}', [App\Http\Controllers\Vendor\OrderDetailsController::class,'viewOrderDetail']);
    Route::get('/vendor/delete-order-detail/{id}', [App\Http\Controllers\Vendor\OrderDetailsController::class,'deleteOrderDetail']);
    Route::match(['get','post'],'/vendor/edit-order-detail/{id}', [App\Http\Controllers\Vendor\OrderDetailsController::class,'editOrderDetail']);

    // vendor city request routes
    Route::get('/vendor/view-city-requests', [App\Http\Controllers\Vendor\CityRequestController::class,'viewVendorCityRequests']);
    Route::match(['get','post'],'/vendor/add-city-request', [App\Http\Controllers\Vendor\CityRequestController::class,'addVendorCityRequest']);
    Route::get('/vendor/delete-city-request/{id}', [App\Http\Controllers\Vendor\CityRequestController::class,'deleteVendorCityRequest']);

    // (Vendor User Route)
    Route::get('/vendor/view-vendor-users', [App\Http\Controllers\Vendor\VendorUserController::class,'viewVendorUsers']);
    Route::match(['get','post'],'/vendor/create-vendor-user', [App\Http\Controllers\Vendor\VendorUserController::class,'addVendorUser']);
    Route::match(['get','post'],'/vendor/edit-vendor-user/{id}', [App\Http\Controllers\Vendor\VendorUserController::class,'editVendorUser']);
    Route::get('/vendor/delete-vendor-user/{id}', [App\Http\Controllers\Vendor\VendorUserController::class,'deleteVendorUser']);

    //Vendor User Privileges Routes
    Route::get('/vendor/view-vendor-user-privileges/{userid}', [App\Http\Controllers\Vendor\VendorUserPrivilegeController::class,'viewPrivileges']);
    Route::match(['get','post'],'/vendor/create-vendor-user-privilege/{userid}', [App\Http\Controllers\Vendor\VendorUserPrivilegeController::class,'addPrivilege']);
    Route::match(['get','post'],'/vendor/edit-vendor-user-privilege/{id}', [App\Http\Controllers\Vendor\VendorUserPrivilegeController::class,'editPrivilege']);
    Route::get('/vendor/delete-vendor-user-privilege/{id}',[App\Http\Controllers\Vendor\VendorUserPrivilegeController::class,'deletePrivilege']);

    Route::get('/vendor/venuserprivilegecityname/{country_id}',[App\Http\Controllers\Vendor\VendorUserPrivilegeController::class,'getCityName']);
});


Route::group(['middleware' => ['role: |vendor-user']], function () {

    Route::get('/vendoruser/dashboard', [App\Http\Controllers\Vendoruser\VendorUserController::class,'dashboard']);
    Route::get('/vendoruser/logout', [App\Http\Controllers\Vendoruser\VendorUserController::class,'logout']);

    Route::get('/vendoruser/settings', [App\Http\Controllers\Vendoruser\VendorUserController::class,'settings']);
    Route::match(['get','post'],'/vendoruser/update-pwd', [App\Http\Controllers\Vendoruser\VendorUserController::class,'updatePassword']);

    Route::get('/vendoruser/getVendorUserPrivilegeItems/{cityid}', [App\Http\Controllers\Vendoruser\VendorUserController::class,'getVendorUserPrivilegeItems']);

    // Products Route(Vendor User)
    Route::match(['get','post'],'/vendoruser/add-product', [App\Http\Controllers\Vendoruser\ProductController::class,'addProduct']);
    Route::match(['get','post'],'/vendoruser/edit-product/{id}', [App\Http\Controllers\Vendoruser\ProductController::class,'editProduct']);
    Route::get('/vendoruser/view-products', [App\Http\Controllers\Vendoruser\ProductController::class,'viewProducts']);
    Route::get('/vendoruser/view-en-products', [App\Http\Controllers\Vendoruser\ProductController::class,'viewEnProducts']);
    Route::get('/vendoruser/view-ar-products', [App\Http\Controllers\Vendoruser\ProductController::class,'viewArProducts']);
    Route::get('/vendoruser/delete-product/{id}', [App\Http\Controllers\Vendoruser\ProductController::class,'deleteProduct']);
    Route::get('/vendoruser/delete-product-image/{id}', [App\Http\Controllers\Vendoruser\ProductController::class,'deleteProductImage']);
    Route::get('/vendoruser/delete-product-galaryimage/{id}', [App\Http\Controllers\Vendoruser\ProductController::class,'deleteProductGalleryImage']);


    Route::get('/vendoruser/getproductcountryname',[App\Http\Controllers\Vendoruser\ProductController::class,'getProductCountryName']);

    Route::get('/vendoruser/getproductcityname/{country_id}',[App\Http\Controllers\Vendoruser\ProductController::class,'getProductCityName']);


    // Product City Route(Admin)
    Route::get('/vendoruser/view-product-cities/{productId}', [App\Http\Controllers\Vendoruser\ProductCityController::class,'viewProductCities']);
    Route::match(['get','post'],'/vendoruser/add-product-city/{productId}', [App\Http\Controllers\Vendoruser\ProductCityController::class,'addProductCity']);
    Route::get('/vendoruser/delete-product-city/{id}', [App\Http\Controllers\Vendoruser\ProductCityController::class,'deleteProductCity']);

    Route::get('/vendoruser/venprivilegecityname/{country_id}',[App\Http\Controllers\Vendoruser\ProductController::class,'getCityName']);

    // order Routes
    Route::match(['get','post'],'/vendoruser/add-order', [App\Http\Controllers\Vendoruser\OrderController::class,'addOrder']);
    Route::match(['get','post'],'/vendoruser/edit-order/{id}', [App\Http\Controllers\Vendoruser\OrderController::class,'editOrder']);
    Route::get('/vendoruser/view-order', [App\Http\Controllers\Vendoruser\OrderController::class,'viewOrder']);
    Route::get('/vendoruser/delete-order/{id}', [App\Http\Controllers\Vendoruser\OrderController::class,'deleteOrder']);

    // order detail routes
    Route::get('/vendoruser/order-detail/{id}', [App\Http\Controllers\Vendoruser\OrderDetailsController::class,'viewOrderDetail']);
    Route::get('/vendoruser/delete-order-detail/{id}', [App\Http\Controllers\Vendoruser\OrderDetailsController::class,'deleteOrderDetail']);
    Route::match(['get','post'],'/vendoruser/edit-order-detail/{id}', [App\Http\Controllers\Vendoruser\OrderDetailsController::class,'editOrderDetail']);
});


Route::group(['middleware' => ['role: |rider']], function () {

    Route::get('/rider/dashboard', [App\Http\Controllers\Rider\RiderController::class,'dashboard']);
    Route::get('/rider/logout', [App\Http\Controllers\Rider\RiderController::class,'logout']);

    Route::get('/rider/settings', [App\Http\Controllers\Rider\RiderController::class,'settings']);
    Route::match(['get','post'],'/rider/update-password', [App\Http\Controllers\Rider\RiderController::class,'updatePassword']);
    Route::match(['get','post'],'/rider/update-profile', [App\Http\Controllers\Rider\RiderController::class,'updateProfile']);

    Route::get('/rider/view-order', [App\Http\Controllers\Rider\OrderController::class,'viewOrder']); 
    Route::get('/rider/view-order-location/{id}', [App\Http\Controllers\Rider\OrderController::class,'viewOrderLocation']);    
    Route::get('/rider/view-delivered-order', [App\Http\Controllers\Rider\OrderController::class,'viewDeliveredOrder']);
    Route::get('/rider/order-accepted/{id}', [App\Http\Controllers\Rider\OrderController::class,'acceptOrder']);
    Route::get('/rider/order-delivered/{id}', [App\Http\Controllers\Rider\OrderController::class,'deliverOrder']);
    Route::get('/rider/order-cancel/{id}', [App\Http\Controllers\Rider\OrderController::class,'cancelOrder']);

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
