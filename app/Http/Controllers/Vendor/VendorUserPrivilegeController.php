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
use App\Models\VendorUserPrivilege;
use Image;
use File;

class VendorUserPrivilegeController extends Controller
{
    public function viewPrivileges($userid = null){
		$privileges = DB::table('vendor_user_privileges as vup')
        ->where(['vup.user_id'=> $userid])
        ->join('countries as c','vup.country_id', '=', 'c.id')
        ->join('cities as ci', 'vup.city_id', '=', 'ci.id')
        ->select('vup.*','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->get();
		
    	return view('vendor.vendor-users.privileges.view-privileges')->with(compact('privileges','userid'));
    }

    public function addPrivilege(Request $request, $userid = null){
    	$current_user = Auth::user();

        if($request->isMethod('post')){
            $data = $request->all();
            
            $checkCity = VendorUserPrivilege::where(['user_id'=>$userid])->where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->count();
            if($checkCity>0)
            {               
                return redirect()->back()->with('flash_message_error', 'This City Privilege Already Exist');
            }
            else
            {
                $privilege = new VendorUserPrivilege;
                $privilege->user_id = $data['user_id'];
                $privilege->country_id = $data['country_id'];
                $privilege->city_id = $data['city_id'];
                $privilege->products = $data['isProduct'];
                $privilege->orders = $data['isOrder'];
                $privilege->accounts = $data['isAccount'];
                $privilege->save();

                return redirect('vendor/view-vendor-user-privileges/'.$userid)->with('flash_message_success','Vendor User Privilege Added successfully!');
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

            return view('vendor.vendor-users.privileges.create-privilege')->with(compact('countries_dropdown','userid'));
        }
    }

    public function editPrivilege(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $privilegee = VendorUserPrivilege::where(['id'=>$id])->first();
            $userid = $privilegee->user_id;
            
            VendorUserPrivilege::where(['id'=>$id])->update
            ([
                'country_id' => $data['country_id'],
                'city_id' => $data['city_id'],
                'products' => $data['isProduct'],
                'orders' => $data['isOrder'],
                'accounts' => $data['isAccount']
            ]);

        	return redirect('/vendor/view-vendor-user-privileges/'.$userid)->with('flash_message_success','Vendor User Privilege has been Updated Successfully!'); 
        }
 
 		$privilege = VendorUserPrivilege::where(['id'=>$id])->first();
 		
        $countries = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('countries as c', 'vp.country_id', '=', 'c.id')
        ->select('c.*')
        ->groupBy('vp.country_id')
        ->get();

        $cities = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['c.country_id'=> $privilege->country_id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('cities as c', 'vp.city_id', '=', 'c.id')
        ->select('c.*')
        ->groupBy('vp.city_id')
        ->get();
      
        return view('vendor.vendor-users.privileges.edit-privilege')->with(compact('privilege','countries','cities'));
    }

    public function deletePrivilege($id = null){
        VendorUserPrivilege::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Vendor User Privilege has been deleted Successfully!');
    }

    public function getCityName($id)
    {
    	$cities = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['c.country_id'=> $id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('cities as c', 'vp.city_id', '=', 'c.id')
        ->select('c.*')
        ->groupBy('vp.city_id')
        ->get();

        return $cities;
    }
}
