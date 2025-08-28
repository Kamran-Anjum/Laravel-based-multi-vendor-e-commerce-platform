<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Shippingcost;
use Session;
use Illuminate\Support\Facades\Input;
use Image;

class CartController extends Controller
{
    public function getCartProducts()
    {
    	if (!empty($_COOKIE['CartProduct'])) {
    		# code...
    	
    	$cookies = $_COOKIE['CartProduct'];
    	$cart_arr = explode ("-", $cookies);
		$unique = array_unique($cart_arr);
		$result = array_values($unique);
		// print_r($result);
		// die;
 
		for ($i=0; $i < count($result); $i++) 
		{ 
			$productDetails[] = Product::where(['id'=> $result[$i]])->get();
		}

		}

		$shippingCost = Shippingcost::where('isActive', '=', 1)->get(); 

    	return view('frontend.cart')->with(compact('productDetails', 'shippingCost'));

		// else
		// 	return redirect('/');
	}
}
