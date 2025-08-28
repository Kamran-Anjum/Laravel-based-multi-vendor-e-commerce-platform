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
use App\Models\ProductUnitTranslate;
use App\Models\ProductRating;
use App\Models\ProductReview;
use App\Models\Vendor;
use App\Models\SubAdmin;
use App\Models\User;
use App\Models\PageVisit;
use Carbon\Carbon;
use Image;
use File;

class ProductDetailController extends Controller
{
    public function getProductDetails($id, $url_slug)
    {
        $lang = Session::get('lang');

    	$productDetails = ProductTranslate::where(['product_id'=> $id])->where(['lang'=>$lang])->first();

		// foreach ($productDetails as $key => $value)
		// {
			$categoryRow = CategoryTranslate::where(['category_id'=>$productDetails->category_id])->where(['lang'=>$lang])->first();
   			// $relatedProducts = ProductTranslate::where(['category_id' => $categoryRow->category_id])->where(['lang'=>$lang])->get();
            $relatedProducts = DB::table('product_translates as pt')
                                ->where(['pt.category_id'=>$categoryRow->category_id])
                                ->where(['pt.lang'=>$lang])
                                ->where(['bt.lang'=>$lang])
                                ->where(['put.lang'=>$lang])
                                ->join('brand_translates as bt', 'pt.brand_id', '=', 'bt.brand_id')
                                ->join('price_unit_translates as put', 'pt.price_unit_id', '=', 'put.price_unit_id')
                                ->select('pt.*', 'bt.name as brand_name', 'put.code as price_unit')
                                ->orderBy('pt.updated_at', 'desc')
                                ->get();

            if ($productDetails->created_for == 1) {

                $admin = User::where(['id'=>1])->first(); 

                $uservendorurl = "Lilac2express";
                $uservendorname = "Lilac2express";        
            
                # code...
            } else if (SubAdmin::where(['user_id'=>$productDetails->created_for])->first()) {

                $subadminRow = SubAdmin::where(['user_id'=>$productDetails->created_for])->first();

                $uservendorurl = "Lilac2express";
                $uservendorname = "Lilac2express";
                # code...
            } else {

                $vendorRow = Vendor::where(['user_id'=>$productDetails->created_for])->first();

                $uservendorname = $vendorRow->store_name;
                $uservendorurl=str_replace(' ', '', $uservendorname);
                # code...
            }
            
            // dd($uservendorname, $uservendorurl, $productDetails->created_for);

            $productunit = ProductUnitTranslate::where(['product_unit_id'=>$productDetails->product_unit_id])->where(['lang'=>$lang])->first();
            $priceunit = PriceUnitTranslate::where(['price_unit_id'=>$productDetails->price_unit_id])->where(['lang'=>$lang])->first();
            $brands = BrandTranslate::where(['brand_id'=>$productDetails->brand_id])->where(['lang'=>$lang])->first();
        // }

        
		$galleryImages = ProductDetail::where(['product_id'=>$id])->where(['lang'=>$lang])->get();
        $hotDeals = ProductTranslate::where(['product_id'=> $id])->where(['lang'=>$lang])->first();

        $productRatingg = DB::table('product_ratings as pr')
        ->where('pr.product_id','=',$id)
        ->join('customers as c','pr.user_id','=','c.user_id')
        ->select('pr.*','c.first_name as firstName','c.last_name as lastName','c.image as profileImage')
        ->orderBy('pr.id','DESC')
        ->get();

        $ratingSum = ProductRating::where(['product_id'=>$id])->sum('star');
        $ratingcount = ProductRating::where(['product_id'=>$id])->count();

        if ($ratingcount > 0) {
            $roundoffrating = round($ratingSum/$ratingcount,1);
        } else {
            $roundoffrating = 0;
        }
        
        // dd($ratingSum, $ratingcount, $roundoffrating);

        if(Auth::user())
        {
            if(Auth::user()->hasRole('customer')){
                $canrateonproduct = ProductRating::where(['product_id' => $id])->where(['user_id' => Auth::user()->id])->first();

                $purchasedproduct = DB::table('order_details as od')
                ->join('orders as o','od.order_id','=','o.id')
                ->where('od.product_id','=',$id)
                ->where('o.user_id','=',Auth::user()->id)
                ->first();

                // data analytics
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                $date_time = date('Y-m-d h:i A');

                $page_visit = new PageVisit();
                $page_visit->user_ip = $user_ip;
                $page_visit->page = 'Product Detail';
                $page_visit->product_id = $id;
                $page_visit->date_time = $date_time;
                $page_visit->save();    
                // data analytics end here

                return view('frontend.product_details')->with(compact('productDetails', 'relatedProducts','galleryImages','brands', 'hotDeals','productunit','priceunit','canrateonproduct','purchasedproduct','productRatingg', 'uservendorname', 'uservendorurl', 'ratingSum', 'ratingcount', 'roundoffrating'));
            }else{

                // data analytics
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                $date_time = date('Y-m-d h:i A');

                $page_visit = new PageVisit();
                $page_visit->user_ip = $user_ip;
                $page_visit->page = 'Product Detail';
                $page_visit->product_id = $id;
                $page_visit->date_time = $date_time;
                $page_visit->save();    
                // data analytics end here

                return view('frontend.product_details')->with(compact('productDetails', 'relatedProducts','galleryImages','brands', 'hotDeals','productunit','priceunit','productRatingg', 'uservendorname', 'uservendorurl', 'ratingSum', 'ratingcount', 'roundoffrating'));
            }
    	}

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Product Detail';
        $page_visit->product_id = $id;
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

	    return view('frontend.product_details')->with(compact('productDetails', 'relatedProducts','galleryImages','brands', 'hotDeals','productunit','priceunit','productRatingg', 'uservendorname', 'uservendorurl', 'ratingSum', 'ratingcount', 'roundoffrating'));
	}

    public function postRateProduct(Request $request, $productId = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            
            $productrating = new ProductRating();
            $productrating->product_id = $productId;
            $productrating->user_id = Auth::user()->id;
            $productrating->star = $data['get_rating'];
            $productrating->review = $data['txtcomment'];
            $productrating->save();

            return redirect()->back();
       }
    }

    
}
