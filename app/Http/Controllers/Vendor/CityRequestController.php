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

use App\Models\VendorPrivilege;
use App\Models\SubAdminPrivilege;
use App\Models\VendorCityRequest;
use Session;

class CityRequestController extends Controller
{
    public function viewVendorCityRequests(){
		$cities = DB::table('vendor_city_requests as vcr')
        ->where(['vcr.user_id'=> Auth::user()->id])
        ->join('countries as c','vcr.country_id', '=', 'c.id')
        ->join('cities as ci', 'vcr.city_id', '=', 'ci.id')
        ->select('vcr.*','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->groupBy('vcr.user_id')
        ->get();
		
    	return view('vendor.city-requests.view-city-requests')->with(compact('cities'));
    }

    public function addVendorCityRequest(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();

            $ven_privileges = VendorPrivilege::where(['user_id'=>Auth::user()->id])->where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->get();

            if($ven_privileges->isEmpty()){
            
	            $privileges = SubAdminPrivilege::where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->get();

	            if($privileges->isEmpty()){
	                $vendor_request = new VendorCityRequest;
	                $vendor_request->user_id = Auth::user()->id;
	                $vendor_request->country_id = $data['country_id'];
	                $vendor_request->city_id = $data['city_id'];
	                $vendor_request->viewAdmin = 0;
	                $vendor_request->subadmin_id = 0;
	                $vendor_request->viewSubadmin = 0;
	                $vendor_request->reason = $data['reason'];
	                $vendor_request->save();
	            }else{
	                foreach($privileges as $privilege){
	                    $subadmin_idd = $privilege->user_id;

	                    $vendor_request = new VendorCityRequest;
	                    $vendor_request->user_id = Auth::user()->id;
	                    $vendor_request->country_id = $data['country_id'];
	                	$vendor_request->city_id = $data['city_id'];
	                    $vendor_request->viewAdmin = 0;
	                    $vendor_request->subadmin_id = $subadmin_idd;
	                    $vendor_request->viewSubadmin = 0;
	                    $vendor_request->reason = $data['reason'];
	                    $vendor_request->save();
	                }
	            }

	            return redirect('vendor/view-city-requests')->with('flash_message_success','Vendor City Request Added successfully!');
	        }else{
	        	return redirect('vendor/add-city-request')->with('flash_message_success','This City is Already Added!');
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

            return view('vendor.city-requests.add-city-request')->with(compact('countries_dropdown'));
        }
    }

    public function deleteVendorCityRequest($id = null){
    	$exp = explode(",", $id);
        $user = VendorCityRequest::where(['user_id'=>$exp[0]])->where(['city_id'=>$exp[1]])->delete();
    	return redirect()->back()->with('flash_message_success','Vendor City Request has been deleted Successfully!');
    }
}
