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
use App\Models\SubAdminPrivilege;
use Image;
use File;

class SubAdminPrivilegeController extends Controller
{
    public function viewPrivileges($userid = null){
		$privileges = DB::table('sub_admin_privileges as sap')
        ->where(['sap.user_id'=> $userid])
        ->join('countries as c','sap.country_id', '=', 'c.id')
        ->join('cities as ci', 'sap.city_id', '=', 'ci.id')
        ->select('sap.*','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->get();
		
    	return view('admin.sub-admin.privileges.view-privileges')->with(compact('privileges','userid'));
    }

    public function addPrivilege(Request $request, $userid = null){
    	$current_user = Auth::user();

        if($request->isMethod('post')){
            $data = $request->all();
            
            $checkCity = SubAdminPrivilege::where(['user_id'=>$userid])->where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->count();
            if($checkCity>0)
            {               
                return redirect()->back()->with('flash_message_error', 'This City Privilege Already Exist');
            }
            else
            {
                $privilege = new SubAdminPrivilege;
                $privilege->user_id = $data['user_id'];
                $privilege->country_id = $data['country_id'];
                $privilege->city_id = $data['city_id'];
                $privilege->chat_supports = $data['isChat'];
                $privilege->products = $data['isProduct'];
                $privilege->orders = $data['isOrder'];
                $privilege->vendors = $data['isVendor'];
                $privilege->save();

                return redirect('admin/view-sub-admin-privileges/'.$userid)->with('flash_message_success','Sub Admin Privilege Added successfully!');
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

            return view('admin.sub-admin.privileges.create-privilege')->with(compact('countries_dropdown','userid'));
        }
    }

    public function editPrivilege(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $privilegee = SubAdminPrivilege::where(['id'=>$id])->first();
            $userid = $privilegee->user_id;
            
            SubAdminPrivilege::where(['id'=>$id])->update
            ([
                'country_id' => $data['country_id'],
                'city_id' => $data['city_id'],
                'chat_supports' => $data['isChat'],
                'products' => $data['isProduct'],
                'orders' => $data['isOrder'],
                'vendors' => $data['isVendor']
            ]);

        	return redirect('/admin/view-sub-admin-privileges/'.$userid)->with('flash_message_success','Sub Admin Privilege has been Updated Successfully!'); 
        }
 
 		$privilege = SubAdminPrivilege::where(['id'=>$id])->first();
 		$countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=> 0])->get();
        $cities = DB::table('cities')->where(['country_id'=>$privilege->country_id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
      
        return view('admin.sub-admin.privileges.edit-privilege')->with(compact('privilege','countries','cities'));
    }

    public function deletePrivilege($id = null){
        SubAdminPrivilege::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Sub Admin Privilege has been deleted Successfully!');
    }

    public function getPrivilegeCityName($id)
    {
        $cities = DB::table('cities')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function getPrivilegeStateName($id)
    {
        $states = DB::table('states')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $states;
    }
}
