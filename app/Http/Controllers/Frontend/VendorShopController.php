<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Session;

use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Customer;
use App\Models\ProductRating;
use App\Models\Product;
use App\Models\ProductTranslate;
use App\Models\Category;
use App\Models\CategoryTranslate;
use App\Models\Brand;
use App\Models\BrandTranslate;
use App\Models\ProductUnit;
use App\Models\ProductUnitTranslate;
use App\Models\PriceUnit;
use App\Models\PriceUnitTranslate;
use App\Models\ProductDetail;
use App\Models\State;
use App\Models\ProductReview;
use App\Models\Vendor;
use App\Models\SubAdmin;
use App\Models\PageVisit;
use Carbon\Carbon;
use Image;
use File;

class VendorShopController extends Controller
{
    public function getVendorProducts($vendor_name, $id){

    	$country = Session::get('country_session');
    	$city = Session::get('city_session');

		$lang = Session::get('lang');

        if ($id == 1) {

            $vendorRow = User::where(['id'=>1])->first(); 

            $uservendorname = "Lilac2express";        
        
        } else if (SubAdmin::where(['user_id'=>$id])->first()) {

            $vendorRow = SubAdmin::where(['user_id'=>$id])->first();

            $uservendorname = "Lilac2express";
            
        } else {

            $vendorRow = Vendor::where(['user_id'=>$id])->first();

            $uservendorname = $vendorRow->store_name;
            
        }

        // get vendor products
        $products = DB::table('product_translates as p')->where(['p.lang'=> $lang, 'p.created_for'=>$id]);

        $products = $products->select('p.*', 'p.id as product_id','p.product_id as product_idd');

        if(session()->has('city_session')){
            $products = $products->where('pc.country_id','=', Session::get('country_session'));
            $products = $products->where('pc.city_id','=', Session::get('city_session'));
            $products = $products->join('product_cities as pc','p.product_id', '=', 'pc.product_id');
        }

        $products = $products->paginate(12);

        
        $categories = CategoryTranslate::where(['parent_id' => 0])->where('lang','=', $lang)->get();
        foreach ($categories as $key => $value)
        {
            $subCategories[] = CategoryTranslate::where(['parent_id' => $value->category_id])->where('lang','=', $lang)->get();
        }


        if (count($products) > 0)
        {
           foreach ($products as $key => $value)
            {    
                $productamount[] = $value->price;

                if(!isset($brandids))
                {
                    $brandids[] = $value->brand_id;
                }
                else
                {
                    if (!in_array($value->brand_id, $brandids))
                    {
                        $brandids[] = $value->brand_id;
                    }
                }

                $price_unit = PriceUnitTranslate::where(['price_unit_id'=>$value->price_unit_id])->where('lang','=', $lang)->first();
                $products[$key]->price_unit = $price_unit->code;

                $brand_name = BrandTranslate::where(['brand_id'=>$value->brand_id])->where('lang','=', $lang)->first();
                $products[$key]->brand_name = $brand_name->name;

                $ratingSum = ProductRating::where(['product_id'=>$value->product_idd])->sum('star');
                $ratingcount = ProductRating::where(['product_id'=>$value->product_idd])->count();

                if ($ratingcount > 0) {
                    $roundoffrating = round($ratingSum/$ratingcount,1);
                } else {
                    $roundoffrating = 0;
                }
                
           }

           $minPrice = min($productamount);
           $maxPrice =  max($productamount);
           $brands = BrandTranslate::where('lang','=', $lang)->get();
              }
       else
       {
           $brands = BrandTranslate::where('lang','=', $lang)->get();
           $maxPrice = ProductTranslate::where('lang','=', $lang)->max('price');
           $minPrice = ProductTranslate::where('lang','=', $lang)->min('price');
       }

        $countries = DB::table('countries')
            ->where(['isActive' => 1])
            ->get();

        $countries_dropdown = "";
        if(session()->has('country_session')){
            foreach($countries as $counts)
            {
                if($counts->id == Session::get('country_session')){
                    $countries_dropdown .= "<option selected value='".$counts->id."'>".$counts->name . "</option>";
                }else{
                    $countries_dropdown .= "<option value='".$counts->id."'>".$counts->name . "</option>";
                }
            }
        }else{
            foreach($countries as $counts)
            {
                $countries_dropdown .= "<option value='".$counts->id."'>".$counts->name . "</option>";
            }
        }

        $cities_dropdown = "";
        if(session()->has('city_session')){
            $cities = DB::table('cities')
            ->where(['country_id' => Session::get('country_session')])
            ->where(['isActive' => 1])
            ->get();

            foreach($cities as $cits)
            {
                if($cits->id == Session::get('city_session')){
                    $cities_dropdown .= "<option selected value='".$cits->id."'>".$cits->name . "</option>";
                }else{
                    $cities_dropdown .= "<option value='".$cits->id."'>".$cits->name . "</option>";
                }
            }
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Vendor Shop';
        $page_visit->vendor_id = $id;
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here


        return view('frontend.vendor_shop')->with(compact('vendorRow', 'uservendorname', 'products', 'categories', 'subCategories', 'maxPrice', 'minPrice', 'brands', 'countries_dropdown', 'cities_dropdown', 'ratingSum', 'ratingcount', 'roundoffrating'));

    }
}
