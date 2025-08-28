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

class CartController extends Controller
{
	public function getCartProducts()
    {
    	$lang = session()->get('lang');

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
        // dd($productDetails, session()->get('session_cart'));
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

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Cart';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here
        
    	return view('frontend.cart')->with(compact('productDetails','shippingCost', 'newArrivalProducts'));
	}

	public function AddToCartAjax($id)
    {
        $lang = session()->get('lang');

        $product = DB::table('product_translates')
                    ->where(['product_id' => $id])
                    ->where(['lang' => $lang])
                    ->first();

        // dd($product, session()->get('session_cart'));

        if($product->saleprice == "" && $product->promotion_id == 0){
            $price = $product->price;
        }elseif ($product->promotion_id > 0) {
            $promo = DB::table('promotions')->where('to_date', '>=', date('Y-m-d'))->where(['id' => $product->promotion_id, 'isActive' => 1])->first();

            $p_amount =  $promo->amount;
            $pp = $product->price/100*$p_amount;
            
            $price = $product->price - $pp;
            // code...
        }else{
            $price = $product->saleprice;
        }

        $vendor_id = $product->created_for;
        
        // if(session()->has('session_cart')){
        //     $flag = false;
        //     foreach(session()->get('session_cart') as $vendor){
        //         if($vendor['vendor_id'] != $vendor_id){
        //             $flag = true;
        //         }
        //     }

            // if($flag == true){
            //     session()->put('session_cart', []);
            // }

            $cart = session()->get('session_cart');

            if(isset($cart[$id])){
                $cart[$id]["quantity"]++;
            }else{
                $cart[$id] = [
                    "id" => $product->product_id,
                    "quantity" => 1,
                    "price" => $price,
                    "vendor_id" => $vendor_id,
                    "weight" => $product->weight,
                ];
            }

            session()->put('session_cart', $cart);
        // }else{
        //     $cart = [
        //         $id => [
        //             "id" => $product->product_id,
        //             "quantity" => 1,
        //             "price" => $price,
        //             "vendor_id" => $vendor_id,
        //         ]
        //     ];

        //     session()->put('session_cart', $cart);
        // }

        $cart_sess = 0;
        if(session()->has('session_cart')){
            $cart_sess = count(Session::get('session_cart'));
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $action_time = date('Y-m-d h:i A');

        $cart_action = new CartAction();
        $cart_action->user_ip = $user_ip;
        $cart_action->product_id = $product->product_id;
        $cart_action->action_type = 'Add';
        $cart_action->action_time = $action_time;
        $cart_action->save();    
        // data analytics end here

        return $cart_sess;
        // return Session::get('session_cart');
    }

    public function sideCartShowOnAddToCart()
    {
        $lang = session()->get('lang');

        $cart_productDetails = [];
        if(session()->has('session_cart')){
            foreach(session()->get('session_cart') as $cart_item){
                $product = DB::table('product_translates')
                            ->where(['product_id' => $cart_item['id']])
                            ->where(['lang' => Session::get('lang')])
                            ->first();

                if($product){
                    $cart_productDetails[] = [
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
        
        $vat = DB::table('v_a_t_s')->where(['id'=>1])->first();

        $html = '';

        $html .= '<div class="gi-cart-top">';
            $html .= '<div class="gi-cart-title">';
                $html .= '<span class="cart_title">';
                    if(session()->get('lang') == 'en'){
                       $html .= ' My Cart ';
                    }
                    elseif(session()->get('lang') == 'ar'){
                    $html .= 'عربتي ';
                    }
                $html .= '</span>';
                $html .= '<a href="javascript:void(0)" class="gi-cart-close">';
                    $html .= '<i class="fi-rr-cross-small"></i>';
                $html .= '</a>';
            $html .= '</div>';
            $html .= '<ul class="gi-cart-pro-items">';
                $i =0; $total = 0; $weight = 0;
                if(session()->has('session_cart')){
                    foreach($cart_productDetails as $product){
                        $i++;
                        
                        $sub_total = $product['price'] * $product['quantity'];
                        $total = $total + $sub_total;

                        $sub_weight = $product['weight'] * $product['quantity'];
                        $weight = $weight + $sub_weight;
                        
                        $lang = session()->get('lang');
                        $html .= '<span style="display: none;" class="tot" id="subTotal'.$i.'">'.$sub_total.'</span>';
                        $html .= '<li>';
                            $html .= '<a href="http://localhost:8000/'.session()->get('lang').'/product/'.$product['id'].'/'.str_replace(' ', '-', strtolower($product['name'])).'" class="gi-pro-img">';
                                $html .= '<img src="/images/backend_images/products/'.session()->get('lang').'/medium/'.$product['image'].'" alt="product">';
                            $html .= '</a>';
                            $html .= '<div class="gi-pro-content">';
                                $html .= '<a href="http://localhost:8000/'.session()->get('lang').'/product/'.$product['id'].'/'.str_replace(' ', '-', strtolower($product['name'])).'" class="cart-pro-title">'.$product['name'].'</a>';
                                $html .= '<span class="cart-price"><span>'.$product['price'].'</span> x '.$product['quantity'].'</span>';
                            $html .= '</div>';
                        $html .= '</li>';
                    }
                }else{
                    if(session()->get('lang') == 'en'){
                        $html .= 'No Records found';
                    }
                    elseif(session()->get('lang') == 'ar'){
                        $html .= 'لا توجد سجلات. ';
                    }
                }
            $html .= '</ul>';
        $html .= '</div>';
        $html .= '<div class="gi-cart-bottom">';
            $html .= '<div class="cart-sub-total">';
                $html .= '<table class="table cart-table">';
                    $html .= '<tbody>';
                        $html .= '<tr>';
                            $html .= '<td class="text-left">';
                                if(session()->get('lang') == 'en'){
                                    $html .= 'Sub-Total';
                                }
                                elseif(session()->get('lang') == 'ar'){
                                   $html .= ' المجموع الفرعي ';
                                }
                            $html .= ' :</td>';
                            $html .= '<td id="id" class="text-right total">'.$total.'</td>';
                        $html .= '</tr>';

                        if($vat->isActive == 1){
                            $html .= '<input type="hidden" id="vat_value" value="'.$vat->vat.'">';
                            $html .= '<tr>';
                                $html .= '<td class="text-left">';
                                    if(session()->get('lang') == 'en'){
                                        $html .= 'VAT';
                                    }
                                    elseif(session()->get('lang') == 'ar'){
                                        $html .= 'ضريبة القيمة المضافة ';
                                    }
                                $sum_one = $total / 100;
                                $vat_amount = $sum_one * $vat->vat;  
                                $html .= '('.$vat->vat.'%) :</td>';
                                $html .= '<td class="text-right vat_amount" id="vat_amount">'.$vat_amount.'</td>';
                            $html .= '</tr>';
                        }else{
                            $html .= '<input type="hidden" id="vat_value" value="0">';
                        } 
                        $g_total = $total + $vat_amount;
                        $html .= '<tr>';
                            $html .= '<td class="text-left">';
                                if(session()->get('lang') == 'en'){
                                   $html .= ' Total';
                                }
                                elseif(session()->get('lang') == 'ar'){
                                   $html .= ' المجموع ';
                                }
                                 
                            $html .= ':</td>';
                            $html .= '<td class="text-right primary-color totalId" id="totalId">'.$g_total.'</td>';
                        $html .= '</tr>';
                    $html .= '</tbody>';
                $html .= '</table>';
            $html .= '</div>';
            $html .= '<div class="cart_btn">';
                $html .= '<a href="http://localhost:8000/'.session()->get('lang').'/cart" class="gi-btn-1">';
                    if(session()->get('lang') == 'en'){
                        $html .= 'View Cart';
                    }
                    elseif(session()->get('lang') == 'ar'){
                        $html .= 'عرض العربة ';
                    }
                    
                $html .= '</a>';
                $html .= '<a href="http://localhost:8000/'.session()->get('lang').'/checkout" class="gi-btn-2">';
                    if(session()->get('lang') == 'en'){
                        $html .= 'Checkout';
                    }
                    elseif(session()->get('lang') == 'ar'){
                       $html .= ' الدفع ';
                    }
                $html .= '</a>';
            $html .= '</div>';
        $html .= '</div>';

        return $html;

    }

    public function DeleteCartAjax($id)
    {
        if(session()->has('session_cart')){
            session()->pull('session_cart.'.$id);
        }

        $count = count(Session::get('session_cart'));
        if($count == 0){
        	session()->forget('session_cart');
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $action_time = date('Y-m-d h:i A');

        $cart_action = new CartAction();
        $cart_action->user_ip = $user_ip;
        $cart_action->product_id = $id;
        $cart_action->action_type = 'Delete';
        $cart_action->action_time = $action_time;
        $cart_action->save();    
        // data analytics end here

        return redirect()->back();
    }

    // show price according to quantity
    public function QuantityCartAjax($id,$qty,$type)
    {
        if(session()->has('session_cart')){
            $cart = session()->get('session_cart');

            if(isset($cart[$id])){
            	if($type == "inc"){
                	$cart[$id]["quantity"]++;
            	}else if($type == "dec"){
            		$cart[$id]["quantity"]--;
            	}

            	if($qty <= 1){
            		$cart[$id]["quantity"] = 1;
            	}

                session()->put('session_cart', $cart);
            }

            $price = session()->get('session_cart')[$id]['price'];

            $subtotal = $qty*$price;
        }

        return $subtotal;
    }

    // show weight according to quantity
    public function QuantityCartWeightAjax($id,$qty,$type)
    {
        if(session()->has('session_cart')){
            $cart = session()->get('session_cart');

            if(isset($cart[$id])){
                if($type == "inc"){
                    $cart[$id]["quantity"]++;
                }else if($type == "dec"){
                    $cart[$id]["quantity"]--;
                }

                if($qty <= 1){
                    $cart[$id]["quantity"] = 1;
                }

                session()->put('session_cart', $cart);
            }

            $weight = session()->get('session_cart')[$id]['weight'];

            $subweight = $qty*$weight;
        }

        return $subweight;
    }

    public function BuyNowAddToCartAjax($id, $qty)
    {
        $lang = session()->get('lang');

        $product = DB::table('product_translates')
        ->where(['product_id' => $id])
        ->where(['lang' => $lang])
        ->first();

        if($product->saleprice == ""){
            $price = $product->price;
        }else{
            $price = $product->saleprice;
        }

        $vendor_id = $product->created_for;
        
        if(session()->has('session_cart')){
            $flag = false;
            foreach(session()->get('session_cart') as $vendor){
                if($vendor['vendor_id'] != $vendor_id){
                    $flag = true;
                }
            }

            if($flag == true){
                session()->put('session_cart', []);
            }

            $cart = session()->get('session_cart');

            if(isset($cart[$id])){
                $cart[$id]["quantity"] = $qty;
            }else{
                $cart[$id] = [
                    "id" => $product->product_id,
                    "quantity" => $qty,
                    "price" => $price,
                    "vendor_id" => $vendor_id,
                    "weight" => $product->weight,
                ];
            }

            session()->put('session_cart', $cart);
        }else{
            $cart = [
                $id => [
                    "id" => $product->product_id,
                    "quantity" => $qty,
                    "price" => $price,
                    "vendor_id" => $vendor_id,
                    "weight" => $product->weight,
                ]
            ];

            session()->put('session_cart', $cart);
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $action_time = date('Y-m-d h:i A');

        $cart_action = new CartAction();
        $cart_action->user_ip = $user_ip;
        $cart_action->product_id = $product->product_id;
        $cart_action->action_type = 'Add';
        $cart_action->action_time = $action_time;
        $cart_action->save();    
        // data analytics end here

        return $qty;
        // return Session::get('session_cart');
    }
}
