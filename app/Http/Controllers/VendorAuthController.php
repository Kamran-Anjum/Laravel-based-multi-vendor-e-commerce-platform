<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;
class VendorAuthController extends Controller
{
    public function showVendorRegistrationForm(Request $request)
    {
    	if($request->isMethod('post')){
    		$data = $request->input();
    		// print_r($data);
    		// die;
    		$this->validation($request);
    		// User::create($data);
    		User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
        ]);
    		return redirect('/admin')->with('flash_message_success','Vendor Registered Successfully!');
    	}else{
    		return view('vendor.vendor_register');
    	}
    }

    public function validation($request){
    	return $this->validate($request,[
    		'name' => 'required|string|max:25',
    		'lastname' => 'required|string|max:25',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|string|min:6|confirmed',

    	]);
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }
}
