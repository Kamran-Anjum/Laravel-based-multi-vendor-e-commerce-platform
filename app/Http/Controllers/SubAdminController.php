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
use App\Models\User;
use App\Models\SubAdmin;
use App\Models\SubAdminPrivilege;
use Image;
use File;
use Validator;

class SubAdminController extends Controller
{
    public function viewSubAdmin(){
		$users = DB::table('users as u')
        ->where(['mhr.role_id'=> 2])
        ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
        ->join('sub_admins as sa','sa.user_id', '=', 'u.id')
        ->join('users as us', 'sa.created_by', '=', 'us.id')
        ->select('sa.*','us.name as userName','u.id as userId','u.email as email','u.isActive as isActive')
        ->get();
		
    	return view('admin.sub-admin.view-sub-admin')->with(compact('users'));
    }

    public function addSubAdmin(Request $request){

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
                // for validate upload file types
                if($request->hasFile('image')){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                    }
                }

                if (empty($data['first_name']) || empty($data['email']) || empty($data['password']) || empty($data['cpassword']) || empty($request->image) || empty($data['country_id']) || empty($data['city_id'])) {

                    return redirect()->back()->with('flash_message_error', 'Please Fill Form Properly');

                } elseif ($extension = "pdf" || $extension = "docs" || $extension = "gif") {

                    return redirect()->back()->with('flash_message_error', 'PDF or Docs Files Are Not Accepted');
                    
                } else {

                    $user = new User;
                    $user->name = $user_name;
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->isActive = $data['isActive'];
                    $user->save();
                    $user->assignRole('sub-admin');
                    $userid = $user->id;

                    if($user){
                        $subadmin = new SubAdmin();
                        $subadmin->user_id = $userid;
                        $subadmin->first_name = $data['first_name'];
                        $subadmin->last_name = $data['last_name'];
                        $subadmin->contact = $data['contact'];
                        $subadmin->address = $data['address'];
                        if($request->hasFile('image')){

                            $image_tmp = $request->image;

                            if($image_tmp->isValid()){
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'subadmin'.rand(1111,9999999).'.'.$extension;
                                $large_image_path = 'images/backend_images/subadmin/large/'.$filename;
                                $medium_image_path = 'images/backend_images/subadmin/medium/'.$filename;
                                $small_image_path = 'images/backend_images/subadmin/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/subadmin/tiny/'.$filename;
                                Image::make($image_tmp)->save($large_image_path);
                                Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                                Image::make($image_tmp)->resize(166,266)->save($small_image_path);
                                Image::make($image_tmp)->resize(100,100)->save($tiny_image_path);
                                $subadmin->image = $filename;
                            }
                        }
                        $subadmin->created_by = $current_user->id;
                        $subadmin->save();

                        if($subadmin){
                            $privilege = new SubAdminPrivilege;
                            $privilege->user_id = $userid;
                            $privilege->country_id = $data['country_id'];
                            $privilege->city_id = $data['city_id'];
                            $privilege->chat_supports = $data['isChat'];
                            $privilege->products = $data['isProduct'];
                            $privilege->orders = $data['isOrder'];
                            $privilege->vendors = $data['isVendor'];
                            $privilege->save();
                        }
                    }

                    return redirect('admin/view-sub-admin')->with('flash_message_success','Sub Admin Added successfully!');

                }

                // dd($extension);

            }
        }
        else
        {
            $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
            $countries_dropdown = "<option selected value='' disabled>Select</option>";
            foreach($countries as $cont)
            {
                $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
            }

            return view('admin.sub-admin.create-sub-admin')->with(compact('countries_dropdown'));
        }
    }

    public function editSubAdmin(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                if($image_tmp->isValid()){

                	// image file delete start
                    $subadmin_image = SubAdmin::where(['user_id'=>$id])->first();
                    $p_image = $subadmin_image->image;

                    $large_image_path = 'images/backend_images/subadmin/large/'.$p_image;
                    $medium_image_path = 'images/backend_images/subadmin/medium/'.$p_image;
                    $small_image_path = 'images/backend_images/subadmin/small/'.$p_image;
                    $tiny_image_path = 'images/backend_images/subadmin/tiny/'.$p_image;

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

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'subadmin'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/subadmin/large/'.$filename;
                    $medium_image_path = 'images/backend_images/subadmin/medium/'.$filename;
                    $small_image_path = 'images/backend_images/subadmin/small/'.$filename;
                    $tiny_image_path = 'images/backend_images/subadmin/tiny/'.$filename;
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(166,266)->save($small_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($tiny_image_path);
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
	            SubAdmin::where(['user_id'=>$id])->update
	            ([
	                'first_name' => $data['first_name'],
	            	'last_name' => $data['last_name'],
	            	'contact' => $data['contact'],
	                'address' => $data['address'],
	                'image' => $filename
	            ]);
        	}

        	return redirect('/admin/view-sub-admin')->with('flash_message_success','Sub Admin has been Updated Successfully!'); 
        }
 
        $authorizedRoles = ['sub-admin'];
        $user = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                    return $query->whereIn('name', $authorizedRoles);
                })->where(['id'=>$id])->with('roles')->first();
        $subadmin = DB::table('sub_admins')->where(['user_id'=>$id])->first();
      
        return view('admin.sub-admin.edit-sub-admin')->with(compact('user','subadmin'));
    }

    public function deleteSubAdmin($id = null){
    	
    	$subadmin_image = SubAdmin::where(['user_id'=>$id])->first();
	    $p_image = $subadmin_image->image;

    	$large_image_path = 'images/backend_images/subadmin/large/'.$p_image;
        $medium_image_path = 'images/backend_images/subadmin/medium/'.$p_image;
        $small_image_path = 'images/backend_images/subadmin/small/'.$p_image;
        $tiny_image_path = 'images/backend_images/subadmin/tiny/'.$p_image;

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
    		SubAdmin::where(['user_id'=>$id])->delete();
            SubAdminPrivilege::where(['user_id'=>$id])->delete();
    	}
    	return redirect()->back()->with('flash_message_success','Sub Admin has been deleted Successfully!');
    }
}
