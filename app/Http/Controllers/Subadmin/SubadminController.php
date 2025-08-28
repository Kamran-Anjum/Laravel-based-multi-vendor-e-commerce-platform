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

class SubadminController extends Controller
{
    // use  Notifiable, HasRoles;
    public function dashboard(){
        return view('subadmin.dashboard');
    }

    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }

    public function settings(){
        return view('subadmin.settings');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where(['id'=>Auth::user()->id])->update(['password' => $password]);
                return redirect('/subadmin/settings')->with('flash_message_success','Password updated successfully');
            }else{
                return redirect('/subadmin/settings')->with('flash_message_error','Incorrect current password ');
            }
        }
    }

    public function getPrivilegeItems($cityid){
        session()->put('SubAdminActiveCity', $cityid);
        return 1;
    }
}
