<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Session;

use App\Models\ProductTranslate;
use App\Models\ProductDetail;
use App\Models\CategoryTranslate;
use App\Models\Country;
use App\Models\City;
use App\Models\Customer;
use App\Models\State;
use App\Models\BrandTranslate;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PriceUnitTranslate;
use App\Models\ProductRating;
use App\Models\PageVisit;
use Image;
use File;

class ProductController extends Controller
{
    public function viewProducts(Request $request,$categoryId,$subcategoryId,$brandId,$searchProduct = null){
        $lang = Session::get('lang');

        $productSubCategories = CategoryTranslate::where(['parent_id' => $categoryId])->where('lang','=', $lang)->get();
        $i=0;
        foreach ($productSubCategories as $key => $value) {
            if($i==0)
            {
                $muzi[] = $categoryId;
                $i = $i+1;
            }
            $muzi[] = $value->category_id;
        }

        $products = DB::table('product_translates as p')->where('p.lang','=', $lang);

        if(isset($searchProduct)){
            $search_field = '%'.$searchProduct.'%';
            $products = $products->where(function($q) use ($search_field) {
                $q->where('p.name','like', $search_field)->orWhere('p.description','like', $search_field); });
        }

        if(isset($muzi))
        {
            $products = $products->whereIn('p.category_id',$muzi);
        }
        else{
            $products = $products->where('p.category_id','=',$categoryId);
        }

        $products = $products->select('p.*', 'p.id as product_id','p.product_id as product_idd');

        if($categoryId != 0 && $subcategoryId != 0 && $brandId != 0){
            $products = $products->where('p.category_id','=', $subcategoryId)
            ->where('p.brand_id','=', $brandId);
        }
        else
        if($categoryId != 0 && $subcategoryId != 0 && $brandId == 0){
            $products = $products->where('p.category_id','=', $subcategoryId);
        }
        else
        if($categoryId != 0 && $subcategoryId == 0 && $brandId == 0){
            $products = $products->where('p.category_id','=', $categoryId);
        }
        else
        if($categoryId != 0 && $subcategoryId == 0 && $brandId != 0){
            $products = $products->where('p.category_id','=', $categoryId)
            ->where('p.brand_id','=', $brandId);
        }
        else
        if($categoryId == 0 && $subcategoryId == 0 && $brandId != 0){
            $products = $products->where('p.brand_id','=', $brandId);
        }

        if(session()->has('city_session')){
            $products = $products->where('pc.country_id','=', Session::get('country_session'));
            $products = $products->where('pc.city_id','=', Session::get('city_session'));
            $products = $products->join('product_cities as pc','p.product_id', '=', 'pc.product_id');
        }

        $products = $products->orderBy('p.updated_at', 'desc')->paginate(12);
        $paginator = $products;
        
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

                $iddd[] = $value->product_id;
                // dd($iddd);

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

           // dd($iddd);
           $minPrice = min($productamount);
           $maxPrice =  max($productamount);
           $brands = BrandTranslate::where('lang','=', $lang)->get();
        }
       else
       {
           $brands = BrandTranslate::where('lang','=', $lang)->get();
           $maxPrice = ProductTranslate::where('lang','=', $lang)->max('price');
           $minPrice = ProductTranslate::where('lang','=', $lang)->min('price');
           $roundoffrating = 0;
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

        $minn = 0;
        if($request->query('minPrice')){
            $minn = $request->query('minPrice');
        }

        $maxx = 0;
        if($request->query('maxPrice')){
            $maxx = $request->query('maxPrice');
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Product List';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.shop')->with(compact('products', 'paginator', 'categories', 'subCategories', 'maxPrice', 'minPrice', 'brands', 'countries_dropdown', 'cities_dropdown', 'minn', 'maxx', 'roundoffrating'));
    }

    public function AddUpdateCountryCitySession2($countryId, $cityId){
        if($countryId == 0 || $countryId == '0'){
            if(session()->has('country_session')){
                session()->forget('country_session');
            }
            if(session()->has('city_session')){
                session()->forget('city_session');
            }
        }else{
            session()->put('country_session', $countryId);
        }

        if($cityId == 0 || $cityId == '0'){
            if(session()->has('city_session')){
                session()->forget('city_session');
            }
        }else{
            session()->put('city_session', $cityId);
        }

        return 1;
    }
}
