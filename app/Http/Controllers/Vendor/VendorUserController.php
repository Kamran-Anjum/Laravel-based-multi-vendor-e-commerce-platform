<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Session;
use App\Models\User;
use App\Models\VendorUser;
use App\Models\VendorUserPrivilege;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class VendorUserController extends Controller
{
    public function viewVendorUsers(){
		$users = DB::table('users as u')
        ->where(['mhr.role_id'=> 4])
        ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
        ->join('vendor_users as vu','vu.user_id', '=', 'u.id')
        ->join('users as us', 'vu.created_by', '=', 'us.id')
        ->select('vu.*','us.name as userName','u.id as userId','u.email as email','u.isActive as isActive')
        ->get();
		
    	return view('vendor.vendor-users.view-vendor-users')->with(compact('users'));
    }

    public function addVendorUser(Request $request){
    	$current_user = Auth::user();

        if($request->isMethod('post')){
            $data = $request->all();

            if(isset($data['last_name'])){
            	$user_name = $data['first_name']."_".$data['last_name'];
            }else{
            	$user_name = $data['first_name'];
            }
            
            $usercount = User::where(['email'=>$data['email']])->count();
            if($usercount>0)
            {               
                return redirect()->back()->with('flash_message_error', 'Email Already Exist');
            }
            else if($data['password'] != $data['cpassword']){
                return redirect()->back()->with('flash_message_error', 'Both Passwords are not Same');
            }
            else
            {
                $user = new User;
                $user->name = $user_name;
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->isActive = $data['isActive'];
                $user->save();
                $user->assignRole('vendor-user');
                $userid = $user->id;

                if($user){
	                $vendoruser = new VendorUser();
	                $vendoruser->user_id = $userid;
	                $vendoruser->first_name = $data['first_name'];
	                $vendoruser->last_name = $data['last_name'];
	                $vendoruser->contact = $data['contact'];
	                $vendoruser->address = $data['address'];
	                if($request->hasFile('image')){

	                $image_tmp = $request->image;
	                    if($image_tmp->isValid()){
	                        // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
	                        $filename = 'vendoruser'.rand(1111,9999999).'.'.$extension;
	                        $large_image_path = 'images/backend_images/vendor_users/large/'.$filename;
	                        $medium_image_path = 'images/backend_images/vendor_users/medium/'.$filename;
	                        $small_image_path = 'images/backend_images/vendor_users/small/'.$filename;
	                        $tiny_image_path = 'images/backend_images/vendor_users/tiny/'.$filename;
	                        $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $image->resize(600,600)->save($medium_image_path);
                            $image->resize(300,300)->save($small_image_path);
                            $image->resize(100,100)->save($tiny_image_path);
	                        $vendoruser->image = $filename;
	                    }
	                }
	                $vendoruser->created_by = $current_user->id;
	                $vendoruser->save();


                    if($vendoruser){
                        $privilege = new VendorUserPrivilege;
                        $privilege->user_id = $userid;
                        $privilege->country_id = $data['country_id'];
                        $privilege->city_id = $data['city_id'];
                        $privilege->products = $data['isProduct'];
                        $privilege->orders = $data['isOrder'];
                        $privilege->accounts = $data['isAccount'];
                        $privilege->save();
                    }
            	}

                return redirect('vendor/view-vendor-users')->with('flash_message_success','Vendor User Added successfully!');
            }
        }
        else
        {
            $countries = DB::table('vendor_privileges as vp')
            ->where(['vp.user_id'=> Auth::user()->id])
            ->where(['c.isActive'=> 1])
            ->where(['c.isDeleted'=> 0])
            ->join('countries as c', 'vp.country_id', '=', 'c.id')
            ->select('c.*')
            ->groupBy('vp.country_id')
            ->get();

            $countries_dropdown = "<option selected value='' disabled>Select</option>";
            foreach($countries as $cont)
            {
                $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
            }

            return view('vendor.vendor-users.create-vendor-user')->with(compact('countries_dropdown'));
        }
    }

    public function editVendorUser(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                if($image_tmp->isValid()){

                	// image file delete start
                    $vendoruser_image = VendorUser::where(['user_id'=>$id])->first();
                    $p_image = $vendoruser_image->image;

                    $large_image_path = 'images/backend_images/vendor_users/large/'.$p_image;
                    $medium_image_path = 'images/backend_images/vendor_users/medium/'.$p_image;
                    $small_image_path = 'images/backend_images/vendor_users/small/'.$p_image;
                    $tiny_image_path = 'images/backend_images/vendor_users/tiny/'.$p_image;

                    if(File::exists($large_image_path)){
                        File::delete($large_image_path);
                    }
                    if(file_exists($medium_image_path)){
                        File::delete($medium_image_path);
                    }
                    if(file_exists($small_image_path)){
                        File::delete($small_image_path);
                    }
                    if(file_exists($tiny_image_path)){
                        File::delete($tiny_image_path);
                    }

                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'vendoruser'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/vendor_users/large/'.$filename;
                    $medium_image_path = 'images/backend_images/vendor_users/medium/'.$filename;
                    $small_image_path = 'images/backend_images/vendor_users/small/'.$filename;
                    $tiny_image_path = 'images/backend_images/vendor_users/tiny/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
                }
            }
            else{
                $filename = $data['current_image'];
	            if(empty($filename)){
	                $filename ='';
	            }
            }

            if(isset($data['last_name'])){
            	$user_name = $data['first_name']."_".$data['last_name'];
            }else{
            	$user_name = $data['first_name'];
            }

            $usersu = User::where(['id'=>$id])->update
            ([
                'name' => $user_name,
                'email' => $data['email'],
                'isActive' => $data['isActive']
            ]);

            if($usersu){
	            VendorUser::where(['user_id'=>$id])->update
	            ([
	                'first_name' => $data['first_name'],
	            	'last_name' => $data['last_name'],
	            	'contact' => $data['contact'],
	                'address' => $data['address'],
	                'image' => $filename
	            ]);
        	}

        	return redirect('/vendor/view-vendor-users')->with('flash_message_success','Vendor User has been Updated Successfully!'); 
        }
 
        $authorizedRoles = ['vendor-user'];
        $user = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                    return $query->whereIn('name', $authorizedRoles);
                })->where(['id'=>$id])->with('roles')->first();
        $vendoruser = DB::table('vendor_users')->where(['user_id'=>$id])->first();
      
        return view('vendor.vendor-users.edit-vendor-user')->with(compact('user','vendoruser'));
    }

    public function deleteVendorUser($id = null){
    	
    	$vendoruser_image = VendorUser::where(['user_id'=>$id])->first();
	    $p_image = $vendoruser_image->image;

    	$large_image_path = 'images/backend_images/vendor_users/large/'.$p_image;
        $medium_image_path = 'images/backend_images/vendor_users/medium/'.$p_image;
        $small_image_path = 'images/backend_images/vendor_users/small/'.$p_image;
        $tiny_image_path = 'images/backend_images/vendor_users/tiny/'.$p_image;

        if(File::exists($large_image_path)){
            File::delete($large_image_path);
        }
        if(file_exists($medium_image_path)){
            File::delete($medium_image_path);
        }
        if(file_exists($small_image_path)){
            File::delete($small_image_path);
        }
        if(file_exists($tiny_image_path)){
            File::delete($tiny_image_path);
        }

        $user = User::where(['id'=>$id])->delete();
        if($user){
    		VendorUser::where(['user_id'=>$id])->delete();
            VendorUserPrivilege::where(['user_id'=>$id])->delete();
    	}
    	return redirect()->back()->with('flash_message_success','Vendor User has been deleted Successfully!');
    }
}
