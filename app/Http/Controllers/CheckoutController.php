<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Country;
use App\City;
use App\State;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Session;
use App\Shippingcost;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;

class CheckoutController extends Controller
{
	public function getStateName($id){
			$states = State::where(['country_id'=>$id, 'isActive'=>1, 'deleted_at' => NULL])->get();
			return $states;
		}
	public function getCityName($cid, $id){
		$cities = City::where(['country_id'=>$cid, 'state_id'=>$id, 'isActive'=>1, 'deleted_at' => NULL])->get();
		return $cities;
	}

    public function getCartProducts()
    {
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

        $country = Country::where(['isActive' => '1'])->where(['deleted_at' => NULL])->get();
        $shippingCost = Shippingcost::where('isActive', '=', 1)->get(); 

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

            // dd($productDetails);

			return view('frontend.cart_checkout')->with(compact('productDetails', 'country', 'customer', 'customerCountry', 'customerState', 'customerCity', 'shippingCost'));		    
		}
		else
		{			
//            echo "asdsfsa"; die;
	    	return view('frontend.guest_cart_checkout')->with(compact('productDetails', 'country', 'shippingCost'));
	    }
	}

	 public function getProductDetails($id)
    {
    	// $id = Auth::id();
    	// print_r($id);
    	// die;
    	$byNowProductDetails = Product::where(['id'=> $id])->get();

    	$country = Country::where(['isActive' => '1'])->where(['deleted_at' => NULL])->get();
        $shippingCost = Shippingcost::where('isActive', '=', 1)->get();

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

            // return view('frontend.cart_checkout')->with(compact('productDetails', 'country', 'customer', 'customerCountry', 'customerState', 'customerCity'));

            
		return view('frontend.buynow_checkout')->with(compact('byNowProductDetails', 'country', 'customer', 'customerCountry', 'customerState', 'customerCity', 'shippingCost'));		    	
		}
		else
		{
//            echo "abcd"; die;
    	return view('frontend.guest_buy_checkout')->with(compact('byNowProductDetails', 'country', 'shippingCost'));
	    }
	}

	 public function placeOrder(Request $request)
    {
        $shippingCost = Shippingcost::where('isActive', '=', 1)->first();
	
    	if($request->isMethod('post'))
		{
    		$data = $request->all();
//    		echo print_r($data); die;

    		$orders = new Order();
    		$orders->firstName = $data['fname'];
    		$orders->lastName = $data['lname'];
    		$orders->contact = $data['cell-no'];
    		$orders->email = $data['email'];
    		$orders->total = $data['total'];

            if ($data['total'] < $shippingCost->amountLimit) {
                # code...
                $orders->shippingFee = $shippingCost->shippingCost;
            }

            else
            {
                $orders->shippingFee = 'Free';
            }
    	
    		$orders->state_id = $data['state'];
            $orders->status_id = 1;
    		$orders->city_id = $data['city'];
    		$orders->country_id = $data['country'];
            $orders->streetAddress = $data['street-address'];
            $orders->buildingAddress = $data['building-address'];
    		$orders->shipToAddress = $data['address'];
            $orders->deliverySchedualDate = $data['schedule-date'];

            $user = Auth::user();
            if(!empty($user))
            {
                $orders->user_id = $user->id;
            }
            else
            {
                $orders->user_id = 2;
            }

    		$orders->save();

    		$orderid = $orders->id;

    		$total_items = $data['items'];
//    		$check = $data['productid0'];
    		if (!empty($data['productid0']))
 //   		if ($check != NULL) 
    		{
	    		for ($i=0; $i < $total_items ; $i++) 
   	 			{ 
    			$orderDetails = new OrderDetail();
    			$orderDetails->order_id = $orderid;
    			$orderDetails->product_id = $data['productid'.$i];
    			$orderDetails->unit_price = $data['price'.$i];
    			$orderDetails->qty = $data['quantity'.$i];
    			$orderDetails->total_price = $data['subtotal'.$i];

    			$orderDetails->save();
    			}
    		}
    		else
    		{
    		$orderDetails = new OrderDetail();
    		$orderDetails->order_id = $orderid;
    		$orderDetails->product_id = $data['productid'];
    		$orderDetails->unit_price = $data['price'];
    		$orderDetails->qty = $data['quantity'];
    		$orderDetails->total_price = $data['total'];

    		$orderDetails->save();
    		}
            
            emptyCart();
    		return redirect('/order/'.$orderid);

		}    		
    }


    public function getOrderConfirmation($id)
    { 
    	$orderDetails = Order::where(['id'=> $id])->get();
		return view('frontend.order_confirm')->with(compact('orderDetails'));
	}
}


     function emptyCart()
        {

            if (isset($_COOKIE['CartProduct'])) 
            {
                unset($_COOKIE['CartProduct']);
                setcookie('CartProduct', null, -1, '/');

                return true;

            } 
            else 
            {
                return false;
            }
        }

 //            debugger;
 //            var cart;

 //            var existingCookie = $.cookie('CartProduct');

 //            if (existingCookie != undefined && existingCookie != "" && existingCookie != null) {
 //                cart = existingCookie.split('-');
 //            }
 //            else {
 //                cart = [];
 //            }

 //            for (var i = cart.length - 1; i >= 0; i--) {
 //                //alert(cart[i]);
 // //               if (cart[i] == productId) {
 //                    cart.splice(i, 1);
 //                }

 //            $.cookie('CartProduct', cart.join('-'), { path: '/' });
