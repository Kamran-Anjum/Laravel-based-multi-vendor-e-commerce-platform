<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Rider;
use Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Validator;

class RiderController extends Controller
{
    use  Notifiable, HasRoles;

    public function activeRiderAccount($id){

        User::where(['id'=>$id])->update([
            'isActive' => 1
        ]);

        Rider::where(['user_id'=>$id])->update([
            'is_verified' => 'Yes',
            'status' => 'Available',
            'isActive' => 1,
        ]);

        return view('frontend.rider_active');
    }

    public function dashboard(){
        return view('rider.dashboard');
    }

    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('/en/login')->with('flash_message_success','Logged out Successfully');
    }

    public function settings(){
        return view('rider.settings');
    }

    public function updatePassword(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where(['id'=>Auth::user()->id])->update(['password' => $password]);
                return redirect('/rider/settings')->with('flash_message_success','Password updated successfully');
            }else{
                return redirect()->back()->with('flash_message_error','Incorrect current password ');
            }

        }

        return view('rider.update-password');
    }

    public function updateProfile(Request $request){

        $id = Auth::user()->id;

        if($request->isMethod('post')){

            $data = $request->all();

            $Rider_image = Rider::where(['user_id'=>$id])->first();
            // dd($Rider_image);
            $image = $Rider_image->image;
            $id_image = $Rider_image->id_image;
            $license_image = $Rider_image->license_image;
            
            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    // image file delete start
                    $image_path = 'images/backend_images/rider/'.$image;

                    if(File::exists($image_path)){
                        File::delete($image_path);
                    }

                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_image = 'rider_image_'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/rider/'.$filename_image;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{

                $filename_image = $data['current_image'];
                if(empty($filename_image)){
                    $filename_image ='';
                }

            }

            if($request->hasFile('id_image')){

                $image_tmp = $request->id_image;

                if($image_tmp->isValid()){

                    // image file delete start
                    $id_image_path = 'images/backend_images/rider/id/'.$id_image;

                    if(File::exists($id_image_path)){
                        File::delete($id_image_path);
                    }

                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_id_image = 'id_image_'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/rider/id/'.$filename_id_image;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{

                $filename_id_image = $data['current_id_image'];
                if(empty($filename_id_image)){
                    $filename_id_image ='';
                }

            }

            if($request->hasFile('license_image')){

                $image_tmp = $request->license_image;

                if($image_tmp->isValid()){

                    // image file delete start
                    $license_image = 'images/backend_images/rider/license/'.$license_image;

                    if(File::exists($license_image)){
                        File::delete($license_image);
                    }

                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_license_image = 'license_image_'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/rider/license/'.$filename_license_image;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{

                $filename_license_image = $data['current_license_image'];
                if(empty($filename_license_image)){
                    $filename_license_image ='';
                }

            }

            $usersu = User::where(['id'=>$Rider_image->user_id])->update
            ([
                'name' => $data['name'],
                'email' => $data['email'],
                // 'isActive' => $data['isActive']
            ]);

            if($usersu){
                Rider::where(['user_id'=>$id])->update
                ([
                    'name' => $data['name'],
                    'd_o_b' => $data['d_o_b'],
                    'address' => $data['address'],
                    'phone_1' => $data['contact_1'],
                    'phone_2' => $data['contact_2'],
                    'nationality' => $data['nationality'],
                    'license_number' => $data['license_number'],
                    'license_expiry' => $data['license_expiry'],
                    'image' => $filename_image,
                    'id_image' => $filename_id_image,
                    'license_image' => $filename_license_image,
                ]);
            }

            return redirect()->back()->with('flash_message_success','Profile Updated Successfully!'); 
        }
 
        // $rider = Rider::where(['id'=>$id])->first();
        $rider = DB::table('riders as r')
                ->join('users as u','r.user_id', '=', 'u.id')
                ->select('r.*','u.email')
                ->where(['r.user_id' => $id])
                ->first();
                // dd($rider, $id);

        $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        $countries_dropdown = '';
        foreach($countries as $cont)
        {
            if ($rider->country_id == $cont->id) {
                $countries_dropdown .= "<option selected value='".$cont->id."'>".$cont->name . "</option>";
            }else{
                $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
            }
            
        }

        $city = DB::table('cities')->where(['id'=> $rider->city_id])->first();

      
        return view('rider.update-profile')->with(compact('countries_dropdown','rider', 'city'));
    }

}
