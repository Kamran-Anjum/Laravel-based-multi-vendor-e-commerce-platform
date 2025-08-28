<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Session;

use App\User;
use App\Country;
use App\Customer;

class CustomerController extends Controller
{
	public function userRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $usercount = User::where(['email'=>$data['email']])->count();
            if($usercount>0){
                return redirect()->back()->with('flash_message_errorlogin', 'Email Already Exist');
            }else{
                $user = new User;
                $user->name = $data['username'];
                $user->role = 3;
                $user->lastname = $data['fname'];
                $user->firstname = $data['lname'];
                $user->cell = $data['cell'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password1']);
                $checkuser = $user->save();
                $userid = $user->id;
                if($checkuser){
                    $customer = new Customer;
                    $customer->user_id = $userid;
                    $customer->firstname = $data['fname'];
                    $customer->lastname = $data['lname'];
                    $customer->cell = $data['cell'];
                    $customer->country_id = $data['country'];
                    $customer->state_id = $data['state'];
                    $customer->city_id = $data['city'];
                    $customer->address1 = $data['address'];
                    $customer->save();

                    if($customer){
                        return redirect('/login')->with('flash_message_error','Account registered successfully! Please Login');
                    }else{
                        return redirect()->back()->with('flash_message_error','Some error occured during registeration');
                    }
                }
            }
        }

        $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $countries_dropdown = "<option selected value='' disabled>Select Country</option>";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        }

		return view('customers.register')->with(compact('countries_dropdown'));
	}

    // public function login(Request $request)
    // {

    // 	if($request->isMethod('post')){
    // 		$data = $request->all();
    // 		// print_r($data);
    // 		// die;
    // 			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    // 				return redirect('/');
    // 			}else{
    // 				return redirect()->back()->with('flash_message_error','Invalid Email or Password!');
    // 			}
    // 		}
    // }
    
   //  public function checkEmail(Request $request){
   //  	$data =$request->all();
   //  	$usercount = User::where(['email'=>$data['email']])->count();
   //  		if($usercount>0){
   //  			echo "false";
			// }else{
			// 	echo "true"; die;
			// }
   //  }

    public function logout(){
    	Auth::logout();
    	return redirect('/');

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

            //echo '<pre>'.print_r($data); die;
        }else{
            return view('customers.change_password');
        }
        
    }
}
