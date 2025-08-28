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
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CityArea;
use App\Models\Customer;
use App\Models\Shippingcost;
use App\Models\ShippingCostZoneCity;
use App\Models\PageVisit;

class CustomerController extends Controller
{
	public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $usercount = User::where(['email'=>$data['email']])->count();
            if($usercount>0)
            {               
                return redirect()->back()->with('flash_message_error', 'Email Already Exist');
            }
            else
            {
                $username = $data['fname'].' '.$data['lname'];

                $user = new User;
                $user->name = $username;
                $user->email = $data['email'];
                $user->password = bcrypt($data['password1']);
                $user->isActive = 1;
                $user->save();
                $user->assignRole('customer');
                $userid = $user->id;

                if($user){
                    if(isset($data['state'])){
                        $state = $data['state'];
                    }else{
                        $state = "";
                    }

                    $customer = new Customer;
                    $customer->user_id = $userid;
                    $customer->first_name = $data['fname'];
                    $customer->last_name = $data['lname'];
                    $customer->cell = $data['cell'];
                    $customer->country_id = $data['country'];
                    $customer->state_id = $state;
                    $customer->city_id = $data['city'];
                    $customer->address1 = $data['address'];
                    $customer->save();

                    if($customer){
                        return redirect(Session::get('lang').'/login')->with('flash_message_error','Account registered successfully! Please Login');
                    }else{
                        return redirect()->back()->with('flash_message_error','Some error occured during registeration');
                    }
                }
            }
        }

        $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $countries_dropdown = "";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Register';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

		return view('customers.register')->with(compact('countries_dropdown'));
	}

    public function logout(){
    	Auth::logout();
    	return redirect(Session::get('lang').'/home');
    }
    
    public function updateCustomerPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['currentPassword'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['newPassword']);
                // echo $password;
                // die;
                User::where('email',Auth::user()->email)->update(['password' => $password]);
                return redirect()->back()->with('flash_message_success','Password updated successfully');
            }else{
                return redirect()->back()->with('flash_message_error','Incorrect current password ');
            }
        }else{
            return view('customers.change_password');
        }
        
    }

    public function getStateName($id)
    {
        $states = DB::table('states')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $states;
    }

    public function getCityName($id)
    {
        $cities = DB::table('cities')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function getStateCityName($id)
    {
        $cities = DB::table('cities')->where(['state_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function getcityareasshippingcost($id, $total_weight)
    {
        $weight = '';
        if ($total_weight <= 1000) {
            $weight = 1000;
        } else if ($total_weight > 1000 && $total_weight <= 2000) {
            $weight = 2000;
        } else if ($total_weight > 2000 && $total_weight <= 3000) {
            $weight = 3000;
        } else if ($total_weight > 3000 && $total_weight <= 4000) {
            $weight = 4000;
        } else if ($total_weight > 4000 && $total_weight <= 5000) {
            $weight = 5000;
        } else if ($total_weight > 5000 && $total_weight <= 6000) {
            $weight = 6000;
        } else if ($total_weight > 6000 && $total_weight <= 7000) {
            $weight = 7000;
        } else if ($total_weight > 7000 && $total_weight <= 8000) {
            $weight = 8000;
        } else if ($total_weight > 8000 && $total_weight <= 9000) {
            $weight = 9000;
        } else if ($total_weight > 9000 && $total_weight <= 10000) {
            $weight = 10000;
        } 
        
        $shippingcost = DB::table('shipping_zone_weight_costs as szwc')
                        ->join('shippingcosts as sc','szwc.shipping_cost_id','=','sc.id')
                        ->join('shipping_cost_zone_cities as sczc','szwc.shipping_cost_id','=','sczc.shipping_cost_id')
                        // ->join('shipping_zone_weight_costs as szwc','sczc.shipping_cost_id','=','szwc.id')
                        ->select('szwc.*')
                        ->where(['sczc.city_area_id'=>$id])
                        ->Where('szwc.weight_up_to', '=', $weight)
                        ->get();
        // dd($shippingcost);
        return $shippingcost;
    }

    public function myAccount()
    {
        if(Auth::user()){
            if(Auth::user()->hasRole('customer')){
                $customer = DB::table('users as u')
                ->where(['mhr.role_id'=> 5])
                ->where(['u.id' => Auth::user()->id])
                ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
                ->join('customers as c','c.user_id', '=', 'u.id')
                ->join('countries as co','c.country_id', '=', 'co.id')
                ->join('cities as ci','c.city_id', '=', 'ci.id')
                ->select('c.*','u.id as userId','u.email as email','u.isActive as isActive','co.id as countryId','co.name as countryName', 'ci.id as cityId','ci.name as cityName')
                ->first();

                $customerState = State::where(['id' => $customer->state_id])->get();

                return view('customers.myAccount')->with(compact('customer', 'customerState'));
            }            
        }
    }

    public function customerEditProfile(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                if($image_tmp->isValid()){
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'user'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend-images/customers/large/'.$filename;
                    $medium_image_path = 'images/frontend-images/customers/medium/'.$filename;
                    $small_image_path = 'images/frontend-images/customers/small/'.$filename;
                    $tiny_image_path = 'images/frontend-images/customers/tiny/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
                }
            }else{
                $filename = $data['current_image'];
                if(empty($filename)){
                    $filename ='';
                }
            }

            Customer::where(['user_id'=>Auth::user()->id])->update([
                'first_name'=>$data['fname'],
                'last_name'=>$data['lname'],
                'image'=>$filename,
                'cell'=>$data['phonenumber'],
                'country_id'=>$data['country'],
                'state_id'=>$data['state'],
                'city_id'=>$data['city'],
                'Address1'=>$data['address'],
                // 'shipToAddress'=>$data['sAddress'],
                // 'billToAddress'=>$data['bAddress'],
            ]);

            return redirect(session()->get('lang').'/my-account');

        }else{
            if(Auth::user())
            {
                if(Auth::user()->hasRole('customer')){
                    $customer = DB::table('users as u')
                    ->where(['mhr.role_id'=> 5])
                    ->where(['u.id' => Auth::user()->id])
                    ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
                    ->join('customers as c','c.user_id', '=', 'u.id')
                    ->join('countries as co','c.country_id', '=', 'co.id')
                    ->join('cities as ci','c.city_id', '=', 'ci.id')
                    ->select('c.*','u.id as userId','u.email as email','u.isActive as isActive','co.id as countryId','co.name as countryName', 'ci.id as cityId','ci.name as cityName')
                    ->first();

                    $country = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
                    $customerState = DB::table('states')->where(['country_id'=> $customer->countryId])->where(['isActive'=> 1])->get();
                    $customerCity = DB::table('cities')->where(['country_id'=> $customer->countryId])->where(['isActive'=> 1])->get();

                    return view('customers.edit_myAccount')->with(compact('country', 'customer', 'customerState', 'customerCity'));
                }
            }
        }
    }

    public function customerOrders(){
        if(Auth::user()){
            if(Auth::user()->hasRole('customer')){
                $orders=DB::table('orders as o')
                ->where('o.user_id','=',Auth::user()->id)
                ->join('users as u','o.user_id','=','u.id')
                ->join('customers as cust','o.user_id','=','cust.user_id')
                ->join('status as s','o.status_id','=','s.id')
                ->join('countries as co','o.country_id','=','co.id')
                ->join('cities as c','o.city_id','=','c.id')
                ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn', 'o.created_at as ordercreatedat', 'o.deliverdDate','s.name as s_name','o.total_amount','o.id as orderid','u.name as u_name','o.email','o.contact_no','cust.*', 'o.payment_method', 'o.vat_value', 'o.vat_amount')
                ->orderBy('o.id', 'desc')
                ->get();

                return view('customers.customer_order')->with(compact('orders'));
            }
        }else{
            return redirect()->action('HomePageController@getProducts');
        }
    }

    public function customerOrderDetail($id =null){
        if(Auth::user()){
            if(Auth::user()->hasRole('customer')){
                $orders=DB::table('orders as o')
                ->where('o.id','=',$id)
                ->join('users as u','o.user_id','=','u.id')
                ->join('customers as cust','o.user_id','=','cust.user_id')
                ->join('status as s','o.status_id','=','s.id')
                ->join('countries as co','o.country_id','=','co.id')
                ->join('cities as c','o.city_id','=','c.id')
                ->join('city_areas as ca','o.area_id','=','ca.id')
                // ->join('states as st','o.state_id','=','st.id')
                ->select('c.name as c_name','co.id as countryId','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn', 'o.created_at as ordercreatedat',
                    'o.deliverdDate','s.name as s_name','o.total','o.id as orderid','u.name as u_name','o.email','o.contact_no','cust.first_name as custfname','cust.last_name as custlname','cust.cell as custcell','cust.billToAddress as custbillto','cust.shipToAddress as custshipto','cust.state_id as stateId', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method', 'o.vat_value', 'o.vat_amount')
                ->first();

                $orderState = State::where(['country_id' => $orders->countryId])->get();

                $customers=DB::table('customers as cust')
                ->where('cust.user_id','=',Auth::user()->id)
                ->join('countries as co','cust.country_id','=','co.id')
                ->join('cities as c','cust.city_id','=','c.id')
                // ->join('states as st','cust.state_id','=','st.id')
                ->select('c.name as c_name','co.id as countryId','co.name as co_name','cust.billToAddress','cust.shipToAddress','cust.cell as custcell','cust.state_id as stateId')
                ->first();

                $customerState = State::where(['country_id' => $customers->countryId])->get();

                $orderdetails=DB::table('order_details as od')
                ->where('od.order_id','=',$id)
                ->where('p.lang','=',session()->get('lang'))
                ->join('orders as o','od.order_id','=','o.id')
                ->join('product_translates as p','od.product_id','=','p.product_id')
                ->select('p.product_id as productid','p.name as p_name','p.image as productimage','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight')
                ->get();

                return view('customers.order_details')->with(compact('orderdetails','orders','customers','orderState','customerState'));
            }
        }
        else
        {
            return redirect()->action('HomePageController@getProducts');
        }
    }
}
