<?php

namespace App\Http\Controllers\Frontend;

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
use App\Models\Priceunit;
use App\Models\SubAdminPrivilege;
use Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Validator;

use App\Models\PageVisit;

class VendorController extends Controller
{
    use  Notifiable, HasRoles;
	// for vendor register
	public function register(Request $request){

		if($request->isMethod('post')){

    		$data = $request->all();

    		$usercount = User::where(['email'=>$data['email']])->count();

    		if($usercount>0){

    			return redirect()->back()->with('flash_message_error', 'Email Already Exist');

    		}else{

                if (empty($data['email']) || empty($data['password']) || empty($data['country_id']) || empty($data['city_id']) || empty($data['store_name']) || empty($data['company_legal_name']) || empty($data['product_kind']) || empty($data['full_address']) || empty($data['trade_license']) || empty($data['national_id']) || empty($data['beneficiary_name']) || empty($data['bank_name']) || empty($data['barnch_name']) || empty($data['account_number']) || empty($data['iban_number']) || empty($data['swift_code']) || empty($data['currency_id']) || empty($data['stemped_doc']) || empty($data['tax_reg_number']) || empty($data['tax_reg_certificate']) ) {

                    $out = '';

                    if (empty($data['email'])) {
                        $out .= 'Please Fill E-mail <br>';
                    }
                    if (empty($data['password'])) {
                        $out .= 'Please Fill Password <br>';
                    }
                    if (empty($data['country_id'])) {
                        $out .= 'Please Select Country <br>';
                    }
                    if (empty($data['city_id'])) {
                        $out .= 'Please Select City <br>';
                    }
                    if (empty($data['store_name'])) {
                        $out .= 'Please Fill Store Name <br>';
                    }
                    if (empty($data['company_legal_name'])) {
                        $out .= 'Please Fill Company Legal Name <br>';
                    }
                    if (empty($data['product_kind'])) {
                        $out .= 'Please Fill Product Kind <br>';
                    }
                    if (empty($data['full_address'])) {
                        $out .= 'Please Fill Address <br>';
                    }
                    if (empty($data['trade_license'])) {
                        $out .= 'Please Upload Trade License <br>';
                    }
                    if (empty($data['national_id'])) {
                        $out .= 'Please Upload National ID <br>';
                    }
                    if (empty($data['beneficiary_name'])) {
                        $out .= 'Please Fill Beneficiary Name <br>';
                    }
                    if (empty($data['bank_name'])) {
                        $out .= 'Please Fill Bank Name <br>';
                    }
                    if (empty($data['barnch_name'])) {
                        $out .= 'Please Fill Branch Name <br>';
                    }
                    if (empty($data['account_number'])) {
                        $out .= 'Please Fill Account Number <br>';
                    }
                    if (empty($data['iban_number'])) {
                        $out .= 'Please Fill IBAN Number <br>';
                    }
                    if (empty($data['swift_code'])) {
                        $out .= 'Please Fill Swift Code <br>';
                    }
                    if (empty($data['currency_id'])) {
                        $out .= 'Please Select Currency <br>';
                    }
                    if (empty($data['stemped_doc'])) {
                        $out .= 'Please Upload Bank Stemped Document <br>';
                    }
                    if (empty($data['tax_reg_number'])) {
                        $out .= 'Please Fill Tax Registration Number <br>';
                    }
                    if (empty($data['tax_reg_certificate'])) {
                        $out .= 'Please Upload Tax Registration Certificate <br>';
                    }

                    return redirect()->back()->with('flash_message_error', $out.'All Fields Are Required, Please Fill Form Properly');

                } else {

                    // for validate upload file types
                    $rules = array(
                        'trade_license' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                        'national_id' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                        'tax_reg_certificate' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                        'stemped_doc' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
                    );

                    $new = array($data['trade_license'], $data['national_id'], $data['tax_reg_certificate'], $data['stemped_doc'] );

                    $validator = Validator::make($new, $rules);

                    $user = new User;
                    $user->name = $data['store_name'];
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->isActive = 0;
                    $user->save();
                    $user->assignRole('vendor');
                    $userid = $user->id;

                    if($user){
                        $vendor = new Vendor;
                        $vendor->user_id = $userid;
                        $vendor->store_name = $data['store_name'];
                        $vendor->company_legal_name = $data['company_legal_name'];
                        $vendor->product_kind = $data['product_kind'];
                        $vendor->full_address = $data['full_address'];

                        if($request->hasFile('trade_license')){
                            $image_tmp = $data['trade_license'];
                            
                            if($image_tmp->isValid()){
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = rand(111,99999).'.'.$extension;
                                $doc_path = 'images/backend_images/vendor_docs';

                                $upload_success = $image_tmp->move($doc_path,$filename);

                                $vendor->trade_license = $filename;
                            }
                        }

                        if($request->hasFile('national_id')){
                            $image_tmp = $data['national_id'];
                            
                            if($image_tmp->isValid()){
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = rand(111,99999).'.'.$extension;
                                $doc_path = 'images/backend_images/vendor_docs';

                                $upload_success = $image_tmp->move($doc_path,$filename);

                                $vendor->national_id = $filename;
                            }
                        }

                        $vendor->tax_reg_number = $data['tax_reg_number'];

                        if($request->hasFile('tax_reg_certificate')){
                            $image_tmp = $data['tax_reg_certificate'];
                            
                            if($image_tmp->isValid()){
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = rand(111,99999).'.'.$extension;
                                $doc_path = 'images/backend_images/vendor_docs';

                                $upload_success = $image_tmp->move($doc_path,$filename);

                                $vendor->tax_reg_certificate = $filename;
                            }
                        }
                        $vendor->save();

                        if($vendor){
                            $privilege = new VendorPrivilege;
                            $privilege->user_id = $userid;
                            $privilege->country_id = $data['country_id'];
                            $privilege->city_id = $data['city_id'];
                            $privilege->isActive = 1;
                            $privilege->save();

                            if($privilege){
                                $bank_details = new Bank_detail;
                                $bank_details->user_id = $userid;
                                $bank_details->beneficiary_name = $data['beneficiary_name'];
                                $bank_details->bank_name = $data['bank_name'];
                                $bank_details->barnch_name = $data['barnch_name'];
                                $bank_details->account_number = $data['account_number'];
                                $bank_details->iban_number = $data['iban_number'];
                                $bank_details->swift_code = $data['swift_code'];
                                $bank_details->currency_id = $data['currency_id'];

                                if($request->hasFile('stemped_doc')){
                                    $image_tmp = $data['stemped_doc'];
                                    
                                    if($image_tmp->isValid()){
                                        $extension = $image_tmp->getClientOriginalExtension();
                                        $filename = rand(111,99999).'.'.$extension;
                                        $doc_path = 'images/backend_images/vendor_docs';

                                        $upload_success = $image_tmp->move($doc_path,$filename);

                                        $bank_details->stemped_doc = $filename;
                                    }
                                }

                                $bank_details->isActive = 1;
                                $bank_details->save();

                                if($bank_details){

                                    $privileges = SubAdminPrivilege::where(['country_id'=>$data['country_id']])->where(['city_id'=>$data['city_id']])->get();

                                    if($privileges->isEmpty()){
                                        $vendor_request = new VendorApprovalRequest;
                                        $vendor_request->user_id = $userid;
                                        $vendor_request->viewAdmin = 0;
                                        $vendor_request->subadmin_id = 0;
                                        $vendor_request->viewSubadmin = 0;
                                        $vendor_request->save();
                                    }else{
                                        foreach($privileges as $privilege){
                                            $subadmin_idd = $privilege->user_id;

                                            $vendor_request = new VendorApprovalRequest;
                                            $vendor_request->user_id = $userid;
                                            $vendor_request->viewAdmin = 0;
                                            $vendor_request->subadmin_id = $subadmin_idd;
                                            $vendor_request->viewSubadmin = 0;
                                            $vendor_request->save();
                                        }
                                    }

                                    // data analytics
                                    $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                                    $date_time = date('Y-m-d h:i A');

                                    $page_visit = new PageVisit();
                                    $page_visit->user_ip = $user_ip;
                                    $page_visit->page = 'Vendor Register Done';
                                    $page_visit->date_time = $date_time;
                                    $page_visit->save();    
                                    // data analytics end here

                                    return redirect(Session::get('lang').'/login')->with('flash_message_error','Vendor registered successfully..! Now please wait! Admin activate your account.');
                                }else{
                                    return redirect()->back()->with('flash_message_error','Some error occured during registeration');
                                }
                            }
                        }
                    }
                }
    		}
    	}

        $priceUnits = DB::table('price_unit_translates')->where(['lang'=>Session::get('lang'),'isActive'=> 1])->get();
        $priceunits_dropdown = "<option selected value='0' disabled>Select</option>";
        foreach($priceUnits as $priceunit){
            $priceunits_dropdown.="<option value='".$priceunit->id."'>".$priceunit->name." (".$priceunit->code.")</option>";
        }

        $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $countries_dropdown = "<option selected value='0' disabled>Select</option>";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Vendor Register';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

		return view('frontend.sell_with_us')->with(compact('priceunits_dropdown','countries_dropdown'));
	}
}
