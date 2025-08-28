<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Bank_detail;
use App\Shop_owner;
use App\Priceunit;
use Hash;
use Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Validator;

class ShopController extends Controller
{
	// for vendor register
	public function sellwithus(Request $request){

		if($request->isMethod('post')){
    		$data = $request->all();
            // dd($data);
    		$usercount = User::where(['email'=>$data['email']])->count();
    		if($usercount>0){
    			return redirect()->back()->with('flash_message_errorlogin', 'Email Already Exist');

    		}else{

                // for validate upload file types
                $rules = array(
                    'trade_license' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                    'national_id' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                    'tax_reg_certificate' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg',
                    'stemped_doc' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
                );
                $validator = Validator::make(Input::all(), $rules);

    			$user = new User;
    			$user->name = $data['store_name'];
    			$user->email = $data['email'];
    			$user->password = bcrypt($data['password']);
                $user->role = 1;
                $user->isActive = 0;
    			$checkuser = $user->save();

                $userid = $user->id;
    			if($checkuser){

                    $shop_owner = new Shop_owner;
                    $shop_owner->user_id = $userid;
                    $shop_owner->email = $data['email'];
                    $shop_owner->country = $data['country'];
                    $shop_owner->city = $data['city'];
                    $shop_owner->store_name = $data['store_name'];
                    $shop_owner->company_legal_name = $data['company_legal_name'];
                    $shop_owner->product_kind = $data['product_kind'];
                    $shop_owner->full_address = $data['full_address'];

                    if($request->hasFile('trade_license')){
                        $image_tmp = Input::file('trade_license');
                        
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $doc_path = 'vendor_docs';

                            $upload_success = $image_tmp->move($doc_path,$filename);

                            $shop_owner->trade_license = $filename;
                        }
                    }

                    if($request->hasFile('national_id')){
                        $image_tmp = Input::file('national_id');
                        
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $doc_path = 'vendor_docs';

                            $upload_success = $image_tmp->move($doc_path,$filename);

                            $shop_owner->national_id = $filename;
                        }
                    }

                    $shop_owner->tax_reg_number = $data['tax_reg_number'];

                    if($request->hasFile('tax_reg_certificate')){
                        $image_tmp = Input::file('tax_reg_certificate');
                        
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $doc_path = 'vendor_docs';

                            $upload_success = $image_tmp->move($doc_path,$filename);

                            $shop_owner->tax_reg_certificate = $filename;
                        }
                    }

                    $shop_owner->isActive = 0;

                    $shop_owner->save();

                    $s_o_id = $shop_owner->id;

                    $bank_details = new Bank_detail;
                    $bank_details->user_id = $userid;
                    $bank_details->shop__id = $s_o_id;
                    $bank_details->beneficiary_name = $data['beneficiary_name'];
                    $bank_details->bank_name = $data['bank_name'];
                    $bank_details->barnch_name = $data['barnch_name'];
                    $bank_details->account_number = $data['account_number'];
                    $bank_details->iban_number = $data['iban_number'];
                    $bank_details->swift_code = $data['swift_code'];
                    $bank_details->currency = $data['currency'];

                    if($request->hasFile('stemped_doc')){
                        $image_tmp = Input::file('stemped_doc');
                        
                        if($image_tmp->isValid()){
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = rand(111,99999).'.'.$extension;
                            $doc_path = 'vendor_docs';

                            $upload_success = $image_tmp->move($doc_path,$filename);

                            $bank_details->stemped_doc = $filename;
                        }
                    }

                    $bank_details->isActive = 1;

                    $bank_details->save();

                    if($bank_details){

    					return redirect()->back()->with('flash_message_success','Store registered successfully..!');
                	}else{
                    return redirect()->back()->with('flash_message_error','Some error occured during registeration');
                	}
    			}
    		}
    	}

        $priceunits = Priceunit::where(['isActive' =>'1'])->get();
        $priceunits_dropdown = "<option selected value='0' disabled>Select</option>";
        foreach($priceunits as $priceunit){
            $priceunits_dropdown.="<option value='".$priceunit->name." (".$priceunit->code.")'>".$priceunit->name." (".$priceunit->code.")</option>";
        }

		return view('frontend.sell_with_us')->with(compact('priceunits_dropdown'));
	}

    public function viewStores(){

        $viewstores = DB::table('shop_owners')
        ->where('isDeleted','=','0')
        ->where(['deleted_at'=>NULL])->get();
    	return view('admin.sell_with_us.view_vendors')->with(compact('viewstores'));
    }

    public function viewStoreDetails($id){

        $storeDetails = DB::table('shop_owners as sp')
        ->where('sp.id','=',$id)
        ->where('sp.deleted_at','=',NULL)
        ->join('bank_details as bd','sp.id','=','bd.shop__id')
        ->select('sp.*','sp.isActive as status','bd.*')
        ->get();

    	return view('admin.sell_with_us.view_vendor_details')->with(compact('storeDetails'));
    }

    public function deleteStore($id = null){

        User::where(['id'=>$id])->delete();
        Shop_owner::where(['user_id'=>$id])->delete();
        Bank_detail::where(['user_id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Store has been deleted Successfully!');
    }

    public function activeStore($id){

        DB::table('users')
        ->where(['id' => $id])
        ->update(['isActive' => 1]);

        DB::table('shop_owners')
        ->where(['user_id' => $id])
        ->update(['isActive' => 1]);

        return redirect()->back()->with('flash_message_success','Store Activated Successfully!');
    }

    public function deactiveStore($id){

        DB::table('users')
        ->where(['id' => $id])
        ->update(['isActive' => 0]);

        DB::table('shop_owners')
        ->where(['user_id' => $id])
        ->update(['isActive' => 0]);

        return redirect()->back()->with('flash_message_success','Store De-Activated Successfully!');
    }
}
