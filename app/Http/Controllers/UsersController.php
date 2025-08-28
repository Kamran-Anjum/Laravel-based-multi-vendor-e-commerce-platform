<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

class UsersController extends Controller
{
    // use  Notifiable, HasRoles;
    // public function login(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->input();
            
    //         if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                
    //                 $users = Auth::User();

    //                 $user = User::where(['id'=> $users->id])->with('roles')->first();

    //                 $role_name = $user->roles->first()->name;
    //                 // dd($role_name);
    //                 if($role_name == "admin"){
    //                     return redirect('admin/dashboard');
    //                 }
    //                 else if($role_name == "sub-admin"){
    //                     return redirect('subadmin/dashboard');
    //                 }
    //                 else{
    //                     Session::flush();
    //                     return redirect('/admin')->with('flash_message_error','You do not have Rights to Access');
    //                 }
    //             }
    //             else{
    //                 return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
    //             }
    //     }
    //     return view('admin.admin_login');
    
    // }

    // public function dashboard(){
    //     return view('admin.dashboard');
    // }

	public function userLoginRegister(){
        $country = Country::where(['isActive' => '1'])->where(['deleted_at' => NULL])->get();
		return view('users.login_register')->with(compact('country'));
	}

    public function register(Request $request)
    {

    	if($request->isMethod('post')){
    		$data = $request->all();
    		// print_r($data);
    		// die;
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

    				return redirect()->back()->with('flash_message_success','Account registered successfully! Please Login');
                }else{
                    return redirect()->back()->with('flash_message_error','Some error occured during registeration');
                }
    			}
    			// if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password1']])){
    			// 	return redirect()->back()->with('flash_message_success','Account registered successfully! Please Login');
    			// }
    		}


    	}	
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
    public function checkEmail(Request $request){
    	$data =$request->all();
    	$usercount = User::where(['email'=>$data['email']])->count();
    		if($usercount>0){
    			echo "false";
			}else{
				echo "true"; die;
			}
    }

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
