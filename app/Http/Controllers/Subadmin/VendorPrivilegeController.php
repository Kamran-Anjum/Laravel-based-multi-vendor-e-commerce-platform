<?php

namespace App\Http\Controllers\Subadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Session;
use App\Models\User;
use App\Models\VendorPrivilege;
use App\Models\VendorCityRequest;
use Image;
use File;

class VendorPrivilegeController extends Controller
{
    public function viewPrivileges($userid = null){
		$privileges = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> $userid])
        ->join('countries as c','vp.country_id', '=', 'c.id')
        ->join('cities as ci', 'vp.city_id', '=', 'ci.id')
        ->select('vp.*','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->get();
		
    	return view('subadmin.vendors.privileges.view-privileges')->with(compact('privileges','userid'));
    }

    public function addPrivilege(Request $request, $userid = null){
    	$current_user = Auth::user();

        if($request->isMethod('post')){
            $data = $request->all();
            
            $checkCity = VendorPrivilege::where(['user_id'=>$userid])->where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->count();
            if($checkCity>0)
            {               
                return redirect()->back()->with('flash_message_error', 'This City Privilege Already Exist');
            }
            else
            {
                $privilege = new VendorPrivilege;
                $privilege->user_id = $data['user_id'];
                $privilege->country_id = $data['country_id'];
                $privilege->city_id = $data['city_id'];
                $privilege->isActive = 0;
                $privilege->save();

                if($privilege){
                    $vendor_city_requests = DB::table('vendor_city_requests')
                    ->where(['user_id'=>$data['user_id']])
                    ->where(['country_id'=>$data['country_id']])
                    ->where(['city_id'=>$data['city_id']])
                    ->where(['subadmin_id'=>Auth::user()->id])
                    ->get();

                    if(!$vendor_city_requests->isEmpty()){
                        VendorCityRequest::where(['user_id'=>$data['user_id']])->where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->delete();
                    }
                }

                return redirect('subadmin/view-vendor-privileges/'.$userid)->with('flash_message_success','Vendor Privilege Added successfully!');
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

            return view('subadmin.vendors.privileges.create-privilege')->with(compact('countries_dropdown','userid'));
        }
    }

    public function editPrivilege(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $privilegee = VendorPrivilege::where(['id'=>$id])->first();
            $userid = $privilegee->user_id;
            
            VendorPrivilege::where(['id'=>$id])->update
            ([
                'country_id' => $data['country_id'],
                'city_id' => $data['city_id'],
            ]);

        	return redirect('/subadmin/view-vendor-privileges/'.$userid)->with('flash_message_success','Vendor Privilege has been Updated Successfully!'); 
        }
 
 		$privilege = VendorPrivilege::where(['id'=>$id])->first();
 		$countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=> 0])->get();
        $cities = DB::table('cities')->where(['country_id'=>$privilege->country_id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
      
        return view('subadmin.vendors.privileges.edit-privilege')->with(compact('privilege','countries','cities'));
    }

    public function deletePrivilege($id = null){
        VendorPrivilege::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Vendor has been deleted Successfully!');
    }
}
