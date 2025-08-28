<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductDetail;
use App\Brand;
use Session;
use Illuminate\Support\Facades\Input;
use Image;
use App\ProductUnit;
use App\Productrating;
use App\Productreview;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function getProductDetails($id)
    {
    	$productDetails = Product::where(['id'=> $id])->get();

			foreach ($productDetails as $key => $value) 
			{
				$categoryRow = Category::where(['id'=>$value->category_id])->first();
       			$relatedProducts = Product::where(['category_id' => $categoryRow->id])->get();
            }            
            $productunit = ProductUnit::where(['id'=>$value->product_unit_id])->first();
            $brands = Brand::where(['id'=>$value->brand_id])->first();
    		$galleryImages = ProductDetail::where(['product_id'=>$id])->get();
            $hotDeals = Product::where(['id'=> $id])->first();
            $user = Auth::user();
            if(!empty($user))
            {
            $canrateonproduct = Productrating::where(['product_id' => $id])->where(['user_id' => $user->id])->first();
            $cancommentonproduct = Productreview::where(['product_id' => $id])->where(['user_id' => $user->id])->first();

            $purchasedproduct = DB::table('order_details as od')
            ->join('orders as o','od.order_id','=','o.id')
            ->where('od.product_id','=',$id)
            ->where('o.user_id','=',$user->id)
            ->where('od.deleted_at','=',null)->first();
            return view('frontend.product_details')->with(compact('productDetails', 'relatedProducts','galleryImages','brands', 'hotDeals','productunit','canrateonproduct','purchasedproduct','cancommentonproduct'));
    	}
	return view('frontend.product_details')->with(compact('productDetails', 'relatedProducts','galleryImages','brands', 'hotDeals','productunit'));
	}

    public function postRateproduct(Request $request)
    {
        // $data = $request->all();
        if($request->isMethod('post')){
            $data = $request->all();
            $isRated = Productrating::where(['product_id' => $data['p_id']])->where(['user_id' => $data['user_id']])->first();
            if(empty($isRated)){
            $productrating = new Productrating();
            $productrating->product_id = $data['p_id'];
            $productrating->user_id = $data['user_id'];
            $productrating->star = $data['star'];
//            dd($order);
            $addedid = $productrating->save();
            // $addedstar = Productrating::where(['id' => $addedid])->first();
            return $data;
            }
            else{
                return 'false';
            }
            // return $data;
       }
    }
    public function postRivewproduct(Request $request)
    {
        //$data = $request->all();
        
        if($request->isMethod('post')){
            $data = $request->all();
            $isRated = Productreview::where(['product_id' => $data['p_id']])->where(['user_id' => $data['user_id']])->first();
            if(empty($isRated)){
            $productreview = new Productreview();
            $productreview->product_id = $data['p_id'];
            $productreview->user_id = $data['user_id'];
            $productreview->comments = $data['comment'];
//            dd($order);
            $addedid = $productreview->save();
            // $addedstar = Productrating::where(['id' => $addedid])->first();
            return $data;
            }
            else{
                return 'false';
            }
            // return $data;
       }
    }
}
