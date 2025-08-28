<?php

namespace App\Http\Controllers\Vendor;

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
use Image;
use Validator;

class VendorController extends Controller
{
    use  Notifiable, HasRoles;

    public function dashboard(){
        return view('vendor.dashboard');
    }

    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('/en/login')->with('flash_message_success','Logged out Successfully');
    }

    public function settings(){
        return view('vendor.settings');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where(['id'=>Auth::user()->id])->update(['password' => $password]);
                return redirect('/vendor/settings')->with('flash_message_success','Password updated successfully');
            }else{
                return redirect('/vendor/settings')->with('flash_message_error','Incorrect current password ');
            }
        }
    }

    public function getVendorPrivilegeItems($cityid){
        session()->put('VendorActiveCity', $cityid);
        return 1;
    }
}
