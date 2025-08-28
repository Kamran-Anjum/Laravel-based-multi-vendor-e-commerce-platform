<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Country;
use App\City;
use App\Customer;
use App\State;
use App\Brand;
use App\Order;
use App\OrderDetail;
use Session;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Priceunit;
use App\Productrating;
class HomePageController extends Controller
{

		public function getCountryName(){
			$countries = Country::where(['isActive'=>1])->get();
			return $countries;
		}
		public function getCityName($id){
			$cities = City::where(['country_id'=>$id, 'isActive'=>1])->get();
			// print_r($cities);
			// die;
			return $cities;
		}

		public function categoryShop($id)
		{
			$products = Product::where(['category_id'=>$id])->get();
			$categories = Category::where(['parent_id' => 0])->get();
   			foreach ($categories as $key => $value) 
			{
				$subCategories[] = Category::where(['parent_id' => $value->id])->get();
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

					$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    			$products[$key]->price_unit = $price_unit->code;

					$brand_name = Brand::where(['id'=>$value->brand_id])->first();
	    			$products[$key]->brand_name = $brand_name->name;	    			
    			}

    			$minPrice = min($productamount);
    			$maxPrice =  max($productamount);
    			$brands = Brand::get();
   	    		}
    		else
    		{
    			$brands = Brand::get();
    			$maxPrice = Product::max('price');
    			$minPrice = Product::min('price');
    		}

			return view('frontend.shop')->with(compact('products', 'categories', 'subCategories', 'maxPrice', 'minPrice', 'brands'));
		}


		public function BrandFiltering($category_id)
		{
			$productSubCategories = Category::where(['parent_id' => $category_id])->get();
			$i=0;
			foreach ($productSubCategories as $key => $value) {
				if($i==0)
				{
					$muzi[] = $category_id;
					$i = $i+1;
				}
				$muzi[] = $value->id;
			}

			if ($category_id==0)
			{
				$brands = Brand::all();
				return json_encode($brands);
			}
			else
			{
				if(!isset($muzi))
				// if ($subCategoryId[0] == 0) 
				{
					$brandids = Product::where(['category_id' => $category_id])
					->select('brand_id')
					->get();
					$brands = Brand::whereIn('id',$brandids)->get();
					return json_encode($brands);
				}
				else
				{
					$brandids = Product::whereIn('category_id', $muzi)
					->select('brand_id')
					->get();
					$brands = Brand::whereIn('id',$brandids)->get();
					return json_encode($brands);
				}
			}
			
		}
		public function PriceRange($category_id)
		{
			$productSubCategories = Category::where(['parent_id' => $category_id])->get();
			$i=0;
			foreach ($productSubCategories as $key => $value) {
				if($i==0)
				{
					$muzi[] = $category_id;
					$i = $i+1;
				}
				$muzi[] = $value->id;
			}

			if ($category_id == 0)
			{
				$minRange = Product::min('price');
				$maxRange = Product::max('price');
				$priceRange = [$minRange, $maxRange];
				return json_encode($priceRange);
			}
			else
			{

				// if ($subCategoryId[0] == 0)
				if(!isset($muzi)) 
				{
					$minRange = Product::where(['category_id' => $category_id])
				->min('price');
				$maxRange = Product::where(['category_id' => $category_id])
				->max('price');

				if ($minRange == null) 
				{
					$minRange = 0;
				}

				if ($maxRange == null) 
				{
					$maxRange = 0;
				}

				$priceRange = [$minRange, $maxRange];
				return json_encode($priceRange);
				}
				else
				{
					$minRange = Product::whereIn('category_id', $muzi)
				->min('price');
				$maxRange = Product::whereIn('category_id', $muzi)
				->max('price');

				if ($minRange == null) 
				{
					$minRange = 0;
				}

				if ($maxRange == null) 
				{
					$maxRange = 0;
				}
				$priceRange = [$minRange, $maxRange];
				return json_encode($priceRange);
				}
			}
		}

		public function newFiltering($min, $max, $search_field, $category_id, $brand_id)
		{
			$productSubCategories = Category::where(['parent_id' => $category_id])->get();
			$i=0;
			foreach ($productSubCategories as $key => $value) {
				if($i==0)
				{
					$muzi[] = $category_id;
					$i = $i+1;
				}
				$muzi[] = $value->id;
			}

			$city_id = $_COOKIE['citycookie'];
			$country_id = $_COOKIE['countrycookie'];
			$category_ids = explode(',', $category_id);
			$brand_ids = explode(',', $brand_id);
			$search_field = '%'.$search_field.'%';

			$filteredProducts = Product::all();

			if ($category_ids[0] == 0) 
			{
				$filteredProducts = DB::table('products as p')->where('v.city_id','=', $city_id)->join('vendors as v','p.vendor_id','=','v.id')->select('p.*', 'p.id as product_id')->get();
			}
			else
			{
				if(!isset($muzi))
				// if ($subCategoryId[0] == 0) 
				{
					$filteredProducts = DB::table('products as p')->where('v.city_id','=', $city_id)->whereIn('category_id', $category_ids)->join('vendors as v','p.vendor_id','=','v.id')->select('p.*', 'p.id as product_id')->get();
				}
				else
				{



					$filteredProducts = DB::table('products as p')->where('v.city_id','=', $city_id)->whereIn('category_id', $muzi)->join('vendors as v','p.vendor_id','=','v.id')->select('p.*', 'p.id as product_id')->get();


				}
			}


			if ($brand_ids[0] == 0) 
			{
				$filteredProducts = $filteredProducts;
			}
			else
			{
				$filteredProducts = $filteredProducts->whereIn('brand_id', $brand_ids);				
			}

			if ($min != null) 
			{
				$filteredProducts = $filteredProducts->where('price', '>=', $min);
			}

			if ($max != null) 
			{
				$filteredProducts = $filteredProducts->where('price', '<=', $max);
			}

			if (count($filteredProducts) > 0)
    		{
    			foreach ($filteredProducts as $key => $value) 
				{	
					$categoryid = $value->category_id;
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

					$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    			$filteredProducts[$key]->price_unit = $price_unit->code;

	    			$brand_name = Brand::where(['id'=>$value->brand_id])->first();
	    			$filteredProducts[$key]->brand_name = $brand_name->name;
    			}
   	    		}
    		else
    		{
    			$brandids[] = 0;		
    		}

    		if($category_ids[0] == 0){
    			$maxPrice = Product::max('price');
    			$minPrice = Product::min('price');
    			//$brandids = Brand::get();
    			$brands = Brand::whereIn('id', $brandids)->get();
    		}
    		else
    		{    			
    			$maxPrice = Product::where(['category_id'=>$category_id])->max('price');
    			$minPrice = Product::where(['category_id'=>$category_id])->min('price');
    			$brands = Brand::whereIn('id', $brandids)->get();
    		}
    		if($maxPrice==$max)
    		{
    			$originalmax = $maxPrice;
    		}
    		else
    		{
    			$originalmax = $max;
    		}
    		if($minPrice==$min)
    		{
    			$originalmin = $minPrice;
    		}
    		else
    		{
    			$originalmin = $min;
    		}
			if($category_id!=0)
			{
				$arr = [$filteredProducts, $brands, $minPrice, $maxPrice,$originalmin,$originalmax];
				return json_encode($arr);
			}
			else
			{
				$arr = [$filteredProducts, $brands, $minPrice, $maxPrice,$originalmin,$originalmax];
				return json_encode($arr);
			} 
		}

		public function searchProduct(Request $request){
			$country_id = $request->sl_country;
			$city_id = $request->sl_city;
			$search_field = $request->search_field;
			session_start();
			$_SESSION["search_field"] = $search_field;

			if ($search_field == null && $city_id == null && $country_id == null)
			{
				$products = Product::where(['category_id'=>$request->category_id])->get();
			}
			else
			{
				$search_field = '%'.$search_field.'%';
				$products=DB::table('products as p')

				->where(function($q) use ($search_field) {
          		$q->where('p.name','like', $search_field)->orWhere('p.description','like', $search_field); })
	            ->where('v.city_id','=',$city_id)
	            ->join('vendors as v','p.vendor_id','=','v.id')
	            ->join('categories as pc','p.category_id','=','pc.id')
	            ->select('p.*')
    	        ->get();
        	}
            
            $categories = Category::where(['parent_id' => 0])->get();
   			foreach ($categories as $key => $value) 
			{
				$subCategories[] = Category::where(['parent_id' => $value->id])->get();
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

					$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    			$products[$key]->price_unit = $price_unit->code;

	    			$brand_name = Brand::where(['id'=>$value->brand_id])->first();
	    			$products[$key]->brand_name = $brand_name->name;
    			}

    			$minPrice = min($productamount);
    			$maxPrice =  max($productamount);
    			$brands = DB::table('brands')
    			->whereIn('brands.id',$brandids)
    			->get();
    		}
    		else
    		{
    			$brands = Brand::get();
    			$maxPrice = Product::max('price');
    			$minPrice = Product::min('price');
    		}
    			
			return view('frontend.shop')->with(compact('products', 'categories', 'subCategories', 'maxPrice', 'minPrice', 'brands'));
		}

		public function getProducts(){
	    	$newArrivalProducts = Product::where(['isTopOffer'=>'1'])->orderBy('updated_at', 'desc')->get();
	    	foreach ($newArrivalProducts as $key => $value) {
	    		$category_name = Category::where(['id'=>$value->category_id])->first();
	    		$newArrivalProducts[$key]->category_name = $category_name->name;
	    		$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    		$newArrivalProducts[$key]->price_unit = $price_unit->code;

				$brand_name = Brand::where(['id'=>$value->brand_id])->first();
    			$newArrivalProducts[$key]->brand_name = $brand_name->name;
    			/* Rating star show*/
    			$ratings = Productrating::where(['product_id'=>$value->id])->get();
    			$totalstar = 0;
    			if(count($ratings)){
    				foreach ($ratings as $key1 => $value1) {
    					$totalstar = $value1->star+$totalstar;
    				}
    				$totalstar = $totalstar/count($ratings);
    				$newArrivalProducts[$key]->productrating = $totalstar;
    			}else{
    			$newArrivalProducts[$key]->productrating = $totalstar;	
    			}
    			/* Rating star show*/
    			
	    	}
// 	    	echo count($newArrivalProducts);
// print_r($newArrivalProducts);
// die;
	    	$featuredProducts = Product::where(['isFeatured'=>'1'])->orderBy('updated_at', 'desc')->get();
	    	foreach ($featuredProducts as $key => $value) {
	    		$category_name = Category::where(['id'=>$value->category_id])->first();
	    		$featuredProducts[$key]->category_name = $category_name->name;
	    		$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    		$featuredProducts[$key]->price_unit = $price_unit->code;

	    		$brand_name = Brand::where(['id'=>$value->brand_id])->first();
    			$featuredProducts[$key]->brand_name = $brand_name->name;
    			/* Rating star show*/
    			$ratings = Productrating::where(['product_id'=>$value->id])->get();
    			$totalstar = 0;
    			if(count($ratings)){
    				foreach ($ratings as $key1 => $value1) {
    					$totalstar = $value1->star+$totalstar;
    				}
    				$totalstar = $totalstar/count($ratings);
    				$featuredProducts[$key]->productrating = $totalstar;
    			}else{
    			$featuredProducts[$key]->productrating = $totalstar;	
    			}
    			/* Rating star show*/
	    	}

	    	$bestSellerProducts = Product::orderBy('id', 'desc')->get();
	    	foreach ($bestSellerProducts as $key => $value) {
	    		$category_name = Category::where(['id'=>$value->category_id])->first();
	    		$bestSellerProducts[$key]->category_name = $category_name->name;
	    		$price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    		$bestSellerProducts[$key]->price_unit = $price_unit->code;

	    		$brand_name = Brand::where(['id'=>$value->brand_id])->first();
    			$bestSellerProducts[$key]->brand_name = $brand_name->name;
    			/* Rating star show */
    			$ratings = Productrating::where(['product_id'=>$value->id])->get();
    			$totalstar = 0;
    			if(count($ratings)){
    				foreach ($ratings as $key1 => $value1) {
    					$totalstar = $value1->star+$totalstar;
    				}
    				$totalstar = $totalstar/count($ratings);
    				$bestSellerProducts[$key]->productrating = $totalstar;
    			}else{
    			$bestSellerProducts[$key]->productrating = $totalstar;	
    			}
    			/* Rating star show */
	    	}
	    	$countries = DB::table('countries')->get();
        	$cites = DB::table('cities')->get();
	    	return view('frontend.index')->with(compact('featuredProducts','newArrivalProducts', 'bestSellerProducts','countries'));
		}
		public function aboutus(){
			return view('frontend.about_us');
		}
		public function contactus(){
			return view('frontend.contact_us');
		}
		public function myAccount()
		{
			$user = Auth::user();
    		if(!empty($user))
    		{	
           		$customer = Customer::where(['user_id' => $user->id])->get();

	            foreach ($customer as $key => $value) 
    	        {

                $customerCountry = Country::where(['id' => $value->country_id])->get();
                $customerState = State::where(['id' => $value->state_id])->get();
                $customerCity = City::where(['id' => $value->city_id])->get();
        	    }

				return view('customers.myAccount')->with(compact('customer', 'customerCountry', 'customerState', 'customerCity'));		    	
			}
		}
		public function customerOrders(){
		$user = Auth::user();
		if($user)
		{
		$orders=DB::table('orders as o')
		->where('o.user_id','=',$user->id)
        ->where('o.deleted_at','=',null)
        ->join('users as u','o.user_id','=','u.id')
        ->join('customers as cust','o.user_id','=','cust.user_id')
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn', 'o.created_at as ordercreatedat',
            'o.deliverdDate','s.name as s_name','o.total','o.id as orderid','u.name as u_name','o.email','o.contact_no','cust.*')
        ->get();
			return view('customers.customer_order')->with(compact('orders'));
		}else{
			return redirect()->action('HomePageController@getProducts');
		}
		}
		public function customerChangePassword(){
			return view('customers.change_password');
		}
		public function customerEditProfile(Request $request){
		{
			$user = Auth::user();
	        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $user_profile_path = 'images/frontend_images/userprofile/'.$filename;
                    Image::make($image_tmp)->resize(499,498)->save($user_profile_path);
                }

            }else{
                $filename = $data['current_image'];
                if( empty($filename)){
                    $filename ='';
                }
            }

			Customer::where(['user_id'=>$user->id])
			->update(['firstname'=>$data['fname'],
				'image'=>$filename,
				'lastname'=>$data['lname'],
				'cell'=>$data['cell'],
				'country_id'=>$data['country'],
				'state_id'=>$data['state'],
				'city_id'=>$data['city'],
				'shipToAddress'=>$data['shippingAddress'],
				'billToAddress'=>$data['billingAddress'],
			]);

			    return redirect('/my-account');

		}else{
			$country = Country::where(['isActive' => '1'])->where(['deleted_at' => NULL])->get();
		
			
    		if(!empty($user))
    		{	
           		$customer = Customer::where(['user_id' => $user->id])->get();

	            foreach ($customer as $key => $value) 
    	        {
                	$customerCountry = Country::where(['id' => $value->country_id])->get();
                	$customerState = State::where(['id' => $value->state_id])->get();
                	$customerCity = City::where(['id' => $value->city_id])->get();
        	    }

				return view('customers.edit_myAccount')->with(compact('country', 'customer', 'customerCountry', 'customerState', 'customerCity'));		    	
			}
		}
}
			return view('customers.edit_myAccount');
		}
		public function customerOrderDetail($id =null){
		$user = Auth::user();
		if($user){
		$orders=DB::table('orders as o')
		->where('o.id','=',$id)
        ->where('o.deleted_at','=',null)
        ->join('users as u','o.user_id','=','u.id')
        ->join('customers as cust','o.user_id','=','cust.user_id')
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('states as st','o.state_id','=','st.id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn', 'o.created_at as ordercreatedat',
            'o.deliverdDate','s.name as s_name','o.total','o.id as orderid','u.name as u_name','o.email','o.contact_no','cust.firstname as custfname','cust.lastname as custlname','cust.cell as custcell','cust.billToAddress as custbillto','cust.shipToAddress as custshipto','st.name as stname')
        ->first();
        $customers=DB::table('customers as cust')
		->where('cust.user_id','=',$user->id)
        ->where('cust.deleted_at','=',null)
        ->join('countries as co','cust.country_id','=','co.id')
        ->join('cities as c','cust.city_id','=','c.id')
        ->join('states as st','cust.state_id','=','st.id')
        ->select('c.name as c_name','co.name as co_name','cust.billToAddress','cust.shipToAddress','st.name as stname','cust.cell as custcell')
        ->first();

		$orderdetails=DB::table('order_details as od')
		->where('od.order_id','=',$id)
        ->join('orders as o','od.order_id','=','o.id')
        ->join('products as p','od.product_id','=','p.id')
        ->select('p.id as productid','p.name as p_name','p.image as productimage','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price')
        ->get();
			return view('customers.order_details')->with(compact('orderdetails','orders','customers'));
		}
		else
		{
			return redirect()->action('HomePageController@getProducts');
		}
	}
		public function categoryShopProduct($categoryId){

		if (!isset($_COOKIE['citycookie']) || !isset($_COOKIE['countrycookie']))
		{
			return redirect()->action('HomePageController@getProducts');
		}
		else{
        	$city_id = $_COOKIE['citycookie'];
			$country_id = $_COOKIE['countrycookie'];
			$productSubCategories = Category::where(['parent_id' => $categoryId])->get();
			$i=0;
			foreach ($productSubCategories as $key => $value) {
				if($i==0)
				{
					$muzi[] = $categoryId;
					$i = $i+1;
				}
				$muzi[] = $value->id;
			}
			if(isset($muzi))
			{
			$products = DB::table('products as p')
				->where('v.city_id','=', $city_id)
				->where('v.country_id','=',$country_id)
				->whereIn('category_id',$muzi)
				->join('vendors as v','p.vendor_id','=','v.id')
				->select('p.*', 'p.id as product_id')
				->get();
			}
			else{
				$products = DB::table('products as p')
				->where('v.city_id','=', $city_id)
				->where('v.country_id','=',$country_id)
				->where('category_id','=',$categoryId)
				->join('vendors as v','p.vendor_id','=','v.id')
				->select('p.*', 'p.id as product_id')
				->get();
			}
            // $products = Product::where(['category_id'=>$id])->get();
            $categories = Category::where(['parent_id' => 0])->get();
              foreach ($categories as $key => $value)
            {
                $subCategories[] = Category::where(['parent_id' => $value->id])->get();
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

                    $price_unit = Priceunit::where(['id'=>$value->priceunit_id])->first();
	    			$products[$key]->price_unit = $price_unit->code;

					$brand_name = Brand::where(['id'=>$value->brand_id])->first();
	    			$products[$key]->brand_name = $brand_name->name;
               }

               $minPrice = min($productamount);
               $maxPrice =  max($productamount);
               $brands = Brand::get();
                  }
           else
           {
               $brands = Brand::get();
               $maxPrice = Product::max('price');
               $minPrice = Product::min('price');
           }
            return view('frontend.shop')->with(compact('products', 'categories', 'subCategories', 'maxPrice', 'minPrice', 'brands'));
		}

	}
}
