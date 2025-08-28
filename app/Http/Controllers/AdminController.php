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

class AdminController extends Controller
{
    use  Notifiable, HasRoles;

    public function login(Request $request){

        if($request->isMethod('post')){

            $data = $request->input();
            
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                
                $users = Auth::User();

                $user = User::where(['id'=> $users->id])->with('roles')->first();

                $role_name = $user->roles->first()->name;
                // dd($role_name);
                if($role_name == "admin"){
                    return redirect('admin/dashboard');
                }
                else if($role_name == "sub-admin"){
                    $active = $users->isActive;
                    if($active != 1 || $active != "1"){
                        return redirect('/admin')->with('flash_message_error','Your Account is not active right now, please contact Super Admin.');
                    }else{
                        return redirect('subadmin/dashboard');
                    }
                }
                else{
                    Session::flush();
                    return redirect('/admin')->with('flash_message_error','You do not have Rights to Access');
                }
            }
            else{
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated successfully');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','Incorrect current password ');
            }

        }
        
    }

    // check email in our DB
    public function chk_email(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $check_email = User::where(['email' => $data['email']])->first();
            $check_email_count = User::where(['email' => $data['email']])->count();

            if($check_email_count > 0){

                return view('admin.admin-lost-password')->with(compact('check_email'));

            }else{
                return redirect()->back()->with('flash_message_error','This E-mail Is Not Registered.');
            }

        }

        return view('admin.admin-lost-password');
        
    }

    // check email in our DB
    public function lostPasswordUpdated(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($data['password'] == $data['Cpassword']){

                $password = bcrypt($data['password']);

                User::where('id',$data['user_id'])->update(['password' => $password]);

                return redirect('/admin')->with('flash_message_success','Password Updated Successfully. Now Login');

            }else{

                $check_email = User::where(['email' => $data['user_id']])->first();

                return redirect()->back()->with('flash_message_error','Password & Confirm Password Not Match.');
            }

        }

        return view('admin.admin-lost-password');
        
    }
}
