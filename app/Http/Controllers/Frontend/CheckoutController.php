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

use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\User;

use App\Models\ProductDetail;
use App\Models\Shippingcost;

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

use App\Models\CartAction;
use App\Models\PageVisit;

use Image;

class CheckoutController extends Controller
{
	public function getCartProducts()
    {
        $lang = Session::get('lang');

    	$productDetails = [];
        if(session()->has('session_cart')){
            foreach(session()->get('session_cart') as $cart_item){
                $product = DB::table('product_translates')
                ->where(['product_id' => $cart_item['id']])
                ->where(['lang' => $lang])
                ->first();

                if($product){
                    $productDetails[] = [
                        'id' => $cart_item['id'],
                        'name' => $product->name,
                        'price' => $cart_item['price'],
                        'quantity' => $cart_item['quantity'],
                        'description' => $product->description,
                        'image' => $product->image,
                        'weight' => $product->weight,
                    ];
                }
            }
        }

        $country = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $shippingCost = Shippingcost::where('isActive', '=', 1)->get(); 

        if(session()->has('city_session')){
            $newArrivalProducts = DB::table('product_translates as pt')
            ->where(['pt.isTopOffer'=>'1'])
            ->where(['pt.lang'=>$lang])
            ->where('pc.country_id','=', Session::get('country_session'))
            ->where('pc.city_id','=', Session::get('city_session'))
            ->join('product_cities as pc', 'pt.product_id', '=', 'pc.product_id')
            ->select('pt.*')
            ->orderBy('pt.updated_at', 'desc')
            ->get();
        }else{
            $newArrivalProducts = DB::table('product_translates')
            ->where(['isTopOffer'=>'1'])
            ->where(['lang'=>$lang])
            ->orderBy('updated_at', 'desc')
            ->get();
        }
        
        foreach ($newArrivalProducts as $key => $value) {
            $category_name = CategoryTranslate::where(['category_id'=>$value->category_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->category_name = $category_name->name;
            $price_unit = PriceUnitTranslate::where(['price_unit_id'=>$value->price_unit_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->price_unit = $price_unit->code;

            $brand_name = BrandTranslate::where(['brand_id'=>$value->brand_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->brand_name = $brand_name->name;
            /* Rating star show*/
            $ratingSum = ProductRating::where(['product_id'=>$value->product_id])->sum('star');
            $ratingcount = ProductRating::where(['product_id'=>$value->product_id])->count();

            if ($ratingcount > 0) {
                $newArrivalProducts[$key]->productrating = round($ratingSum/$ratingcount,1);
            } else {
                $newArrivalProducts[$key]->productrating = 0;
            }
            /* Rating star show*/
            
        }     

        if(Auth::user())
    	{
            if(Auth::user()->hasRole('customer')){
                $customer = DB::table('users as u')
                ->where(['mhr.role_id'=> 5])
                ->where(['u.id' => Auth::user()->id])
                ->where(['u.isActive' => 1])
                ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
                ->join('customers as c','c.user_id', '=', 'u.id')
                ->join('countries as co','c.country_id', '=', 'co.id')
                ->join('cities as ci','c.city_id', '=', 'ci.id')
                ->select('c.*','u.id as userId','u.email as email','u.isActive as isActive','co.name as countryName','ci.name as cityName')
                ->first();

                $customerState = State::where(['country_id' => $customer->country_id])->get();

                // data analytics
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                $date_time = date('Y-m-d h:i A');

                $page_visit = new PageVisit();
                $page_visit->user_ip = $user_ip;
                $page_visit->page = 'Checkout';
                $page_visit->date_time = $date_time;
                $page_visit->save();    
                // data analytics end here

                return view('frontend.cart_checkout')->with(compact('productDetails', 'country', 'customer', 'shippingCost','customerState', 'newArrivalProducts'));
            }else{

                $customer = 0;
                $customerState = 0;

                // data analytics
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                $date_time = date('Y-m-d h:i A');

                $page_visit = new PageVisit();
                $page_visit->user_ip = $user_ip;
                $page_visit->page = 'Checkout';
                $page_visit->date_time = $date_time;
                $page_visit->save();    
                // data analytics end here

                return view('frontend.cart_checkout')->with(compact('productDetails', 'country', 'customer', 'shippingCost', 'customerState', 'newArrivalProducts'));
            }    
		}
		else
		{	
            $customer = 0;
            $customerState = 0;

            // data analytics
            $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
            $date_time = date('Y-m-d h:i A');

            $page_visit = new PageVisit();
            $page_visit->user_ip = $user_ip;
            $page_visit->page = 'Checkout';
            $page_visit->date_time = $date_time;
            $page_visit->save();    
            // data analytics end here

	    	return view('frontend.cart_checkout')->with(compact('productDetails', 'country','customer', 'shippingCost','customerState', 'newArrivalProducts'));
	    }
	}

	 public function getProductDetails(Request $request, $id)
    {
        $lang = Session::get('lang');

        $qtyyy = 0;
        if($request->query('qty')){
            $qtyyy = $request->query('qty');
        }

    	$byNowProductDetails = ProductTranslate::where(['product_id'=> $id])->where(['lang'=>$lang])->get();

        $country = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $shippingCost = Shippingcost::where('isActive', '=', 1)->get();

    	if(Auth::user())
    	{	
            if(Auth::user()->hasRole('customer')){
                $customers = DB::table('users as u')
                ->where(['mhr.role_id'=> 5])
                ->where(['u.id' => Auth::user()->id])
                ->where(['u.isActive' => 1])
                ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
                ->join('customers as c','c.user_id', '=', 'u.id')
                ->join('countries as co','c.country_id', '=', 'co.id')
                ->join('cities as ci','c.city_id', '=', 'ci.id')
                ->select('c.*','u.id as userId','u.email as email','u.isActive as isActive','co.name as countryName','ci.name as cityName')
                ->first();

                $customerState = State::where(['country_id' => $customers->country_id])->get();
                
    		    return view('frontend.buynow_checkout')->with(compact('byNowProductDetails', 'country', 'customers', 'customerState', 'shippingCost', 'qtyyy'));
            }else{
                return view('frontend.guest_buy_checkout')->with(compact('byNowProductDetails', 'country', 'shippingCost', 'qtyyy'));
            }	    	
		}
		else
		{
    	    return view('frontend.guest_buy_checkout')->with(compact('byNowProductDetails', 'country', 'shippingCost', 'qtyyy'));
	    }
	}

	public function placeOrder(Request $request)
    {
	
    	if($request->isMethod('post'))
		{
    		$data = $request->all();

            // dd($data);

            if(isset($data['total'])){
                $total = $data['total'];
            }else{
                $total = 0;
            }

            $total_amount = $total + $data['shippingCost'] + $data['vat_amount'];   

    		$orders = new Order();
    		$orders->firstName = $data['fname'];
    		$orders->lastName = $data['lname'];
    		$orders->contact = $data['cell-no'];
    		$orders->email = $data['email'];
    		$orders->total = $total;
            $orders->shippingFee = $data['shippingCost'];   
            $orders->vat_value = $data['vat'];   
            $orders->vat_amount = $data['vat_amount'];   
            $orders->total_amount = $total_amount;
            $orders->total_weight = $data['total_weight'];
            // $orders->state_id = "";
            $orders->status_id = 1;
            $orders->area_id = $data['area'];
            $orders->city_id = $data['city'];
            $orders->state_id = $data['state'];
    		$orders->country_id = $data['country'];
            // $orders->streetAddress = $data['street-address'];
            // $orders->buildingAddress = $data['building-address'];
    		$orders->shipToAddress = $data['address'];
            // $orders->deliverySchedualDate = $data['schedule-date'];
            // $orders->longitude = $data['longitude'];
            // $orders->latitude = $data['latitude'];
            $orders->payment_method = 'COD';

            if(Auth::user())
            {
                if(Auth::user()->hasRole('customer')){
                    $orders->user_id = Auth::user()->id;
                }else{
                    $orders->user_id = 0;
                }
            }
            else
            {
                $orders->user_id = 0;
            }

    		$orders->save();

    		$orderid = $orders->id;

            if(isset($data['items'])){
        		$total_items = $data['items'];

        		if (!empty($data['productid1']))
        		{
    	    		for ($i=1; $i <= $total_items ; $i++) 
       	 			{ 
            			$orderDetails = new OrderDetail();
            			$orderDetails->order_id = $orderid;
            			$orderDetails->product_id = $data['productid'.$i];
            			$orderDetails->unit_price = $data['price'.$i];
            			$orderDetails->qty = $data['quantity'.$i];
            			$orderDetails->total_price = $data['subtotal'.$i];
                        $orderDetails->unit_weight = $data['unit_weight'.$i];
                        $orderDetails->total_weight = $data['pro_total_weight'.$i];
            			$orderDetails->save();

                        // data analytics
                        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                        $action_time = date('Y-m-d h:i A');

                        $cart_action = new CartAction();
                        $cart_action->user_ip = $user_ip;
                        $cart_action->product_id = $data['productid'.$i];
                        $cart_action->action_type = 'Order';
                        $cart_action->action_time = $action_time;
                        $cart_action->save();    
                        // data analytics end here
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
                    $orderDetails->unit_weight = $data['unit_weight'];
                    $orderDetails->total_weight = $data['pro_total_weight'];
            		$orderDetails->save();

                    // data analytics
                    $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                    $action_time = date('Y-m-d h:i A');

                    $cart_action = new CartAction();
                    $cart_action->user_ip = $user_ip;
                    $cart_action->product_id = $data['productid'];
                    $cart_action->action_type = 'Order';
                    $cart_action->action_time = $action_time;
                    $cart_action->save();    
                    // data analytics end here
        		}             
                
                // emptyCart();
                session()->forget('session_cart');
        		return redirect(Session::get('lang').'/order/'.$orderid);
            }else{
                $orderDetails = "";

                session()->forget('session_cart');

                // data analytics
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                $date_time = date('Y-m-d h:i A');

                $page_visit = new PageVisit();
                $page_visit->user_ip = $user_ip;
                $page_visit->page = 'Order Placed';
                $page_visit->date_time = $date_time;
                $page_visit->save();    
                // data analytics end here

                return view('frontend.order_confirm')->with(compact('orderDetails'));
            }

		}    		
    }


    public function getOrderConfirmation($id)
    { 
    	$orderDetails = Order::where(['id'=> $id])->first();

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Order Placed';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

		return view('frontend.order_confirm')->with(compact('orderDetails'));
	}
}
