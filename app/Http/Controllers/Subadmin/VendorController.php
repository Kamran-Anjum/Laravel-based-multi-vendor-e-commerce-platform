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
use App\Models\User;
use App\Models\Bank_detail;
use App\Models\Vendor;
use App\Models\VendorPrivilege;
use App\Models\VendorApprovalRequest;
use App\Models\VendorCityRequest;
use App\Models\Priceunit;
use Session;
use Image;
use File;
use Validator;

class VendorController extends Controller
{
    public function viewVendors(Request $request){
        if($request->query('cityRequested')){
            $cityReq = 1;
        }else{
            $cityReq = 0;
        }

        if($request->query('approvalRequested')){
            $approvalReq = 1;
        }else{
            $approvalReq = 0;
        }

        $vendor_requests = VendorApprovalRequest::where(['subadmin_id'=>Auth::user()->id])->get();
        $vendor_city_requests = DB::table('vendor_city_requests as vcr')
        ->where(['subadmin_id'=>Auth::user()->id])
        ->join('countries as c','vcr.country_id', '=', 'c.id')
        ->join('cities as ci', 'vcr.city_id', '=', 'ci.id')
        ->select('vcr.*','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->get();

        $users = DB::table('users as u')
        ->where(['mhr.role_id'=> 3])
        ->where(['vp.city_id'=> session()->get('SubAdminActiveCity')])
        ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
        ->join('vendors as v','v.user_id', '=', 'u.id')
        ->join('vendor_privileges as vp','v.user_id', '=', 'vp.user_id')
        ->join('countries as c','vp.country_id', '=', 'c.id')
        ->join('cities as ci', 'vp.city_id', '=', 'ci.id')
        ->select('v.*','u.id as userId','u.email as email','u.isActive as isActive','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName')
        ->orderBy('v.id','DESC')
        ->get();

    	return view('subadmin.vendors.view_vendors')->with(compact('users','vendor_requests','vendor_city_requests','cityReq','approvalReq'));
    }

    public function viewVendorDetails($id){

        $vendorDetails = DB::table('users as u')
        ->where('v.user_id','=',$id)
        ->where(['mhr.role_id'=> 3])
        ->where(['vp.isActive'=> 1])
        ->join('model_has_roles as mhr','mhr.model_id', '=', 'u.id')
        ->join('vendors as v','v.user_id', '=', 'u.id')
        ->join('vendor_privileges as vp','v.user_id', '=', 'vp.user_id')
        ->join('countries as c','vp.country_id', '=', 'c.id')
        ->join('cities as ci', 'vp.city_id', '=', 'ci.id')
        ->join('bank_details as bd','v.user_id','=','bd.user_id')
        ->join('price_unit_translates as put','bd.currency_id','=','put.id')
        ->select('v.*','u.id as userId','u.email as email','u.isActive as user_isActive','c.id as countryId','c.name as countryName','ci.id as cityId','ci.name as cityName','put.name as currencyName','put.code as currencyCode','bd.*')
        ->get();

    	return view('subadmin.vendors.view_vendor_details')->with(compact('vendorDetails'));
    }

    public function deleteVendor($id = null){
        $vendorDocs = DB::table('vendors as v')
        ->where('v.user_id','=',$id)
        ->join('bank_details as bd','v.user_id','=','bd.user_id')
        ->select('v.*','bd.stemped_doc as stemped_doc')
        ->first();

        $trade_license = $vendorDocs->trade_license;
        $national_id = $vendorDocs->national_id;
        $tax_reg_certificate = $vendorDocs->tax_reg_certificate;
        $stemped_doc = $vendorDocs->stemped_doc;

        $trade_license_image_path = 'images/backend_images/vendor_docs/'.$trade_license;
        $national_id_image_path = 'images/backend_images/vendor_docs/'.$national_id;
        $tax_reg_certificate_image_path = 'images/backend_images/vendor_docs/'.$tax_reg_certificate;
        $stemped_doc_image_path = 'images/backend_images/vendor_docs/'.$stemped_doc;

        if(file_exists($trade_license_image_path)){
            File::delete($trade_license_image_path);
        }
        if(file_exists($national_id_image_path)){
            File::delete($national_id_image_path);
        }
        if(file_exists($tax_reg_certificate_image_path)){
            File::delete($tax_reg_certificate_image_path);
        }
        if(File::exists($stemped_doc_image_path)){
            File::delete($stemped_doc_image_path);
        }

        $user = User::where(['id'=>$id])->delete();
        if($user){
            Vendor::where(['user_id'=>$id])->delete();
            Bank_detail::where(['user_id'=>$id])->delete();
            VendorPrivilege::where(['user_id'=>$id])->delete();
            VendorApprovalRequest::where(['user_id'=>$id])->delete();
        }

        return redirect()->back()->with('flash_message_success','Vendor has been deleted Successfully!');
    }

    public function activeVendor($id){

        $userr = Auth::user();

        $vendor_requests = VendorApprovalRequest::where(['user_id'=>$id])->where(['subadmin_id'=>$userr->id])->get();
        if(!$vendor_requests->isEmpty()){
            VendorApprovalRequest::where(['user_id'=>$id])->delete();
        }

        DB::table('users')
        ->where(['id' => $id])
        ->update(['isActive' => 1]);

        return redirect()->back()->with('flash_message_success','Vendor Activated Successfully!');
    }

    public function deactiveVendor($id){

        DB::table('users')
        ->where(['id' => $id])
        ->update(['isActive' => 0]);

        return redirect()->back()->with('flash_message_success','Vendor De-Activated Successfully!');
    }

    public function updateVendorApprovalRequest(){

        $userr = Auth::user();

        $vendor_requests = VendorApprovalRequest::where(['subadmin_id'=>$userr->id])->where(['viewSubadmin'=>0])->get();
        if(!$vendor_requests->isEmpty()){
            $update_requests = VendorApprovalRequest::where(['subadmin_id'=>$userr->id])->update([
                'viewSubadmin' => 1
            ]);
        }

        return 1;
    }

    public function updateVendorCityRequest(){

        $userr = Auth::user();

        $vendor_requests = VendorCityRequest::where(['subadmin_id'=>$userr->id])->where(['viewSubadmin'=>0])->get();
        if(!$vendor_requests->isEmpty()){
            $update_requests = VendorCityRequest::where(['subadmin_id'=>$userr->id])->update([
                'viewSubadmin' => 1
            ]);
        }

        return 1;
    }
}
