<?php

namespace App\Http\Controllers\Subadmin;

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
use App\Models\Rider;
use App\Models\SubAdminPrivilege;
use App\Models\Order;
use App\Models\OrderDetail;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;
use Mail;
use App\Mail\SendMailToAdminAboutRider;
use App\Mail\SendMailToNewRider;
use App\Mail\SendMailToSubAdminAboutRider;

class RiderController extends Controller
{
    public function viewRider(){

		$riders = DB::table('riders as r')
		        ->join('users as u','r.user_id', '=', 'u.id')
		        ->join('countries as c','r.country_id', '=', 'c.id')
		        ->join('cities as ci','r.city_id', '=', 'ci.id')
		        ->join('users as us','r.added_by', '=', 'us.id')
		        ->select('r.*','c.name as countryName','ci.name as cityName', 'u.email', 'us.name as addedBy_name')
		        ->get();
		
    	return view('subadmin.rider.view-rider')->with(compact('riders'));

    }

    public function viewRiderOrder($id){

        $orders=DB::table('orders as o')
        ->where(['o.rider_id'=>$id])
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('city_areas as ca','o.area_id','=','ca.id')
        ->join('order_details as od','o.id','=','od.order_id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn',
            'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method', 'o.status_id', 'o.rider_id')
        ->orderBy('o.id','desc')
        ->groupBy('od.order_id')
        ->get();

        $orderdetails=DB::table('order_details as od')
        ->where('p.lang','=','en')
        // ->where(['p.created_for'=>Auth::user()->id])
        ->join('orders as o','od.order_id','=','o.id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
        ->get();

        return view('subadmin.rider.view-rider-orders')->with(compact('orders','orderdetails'));

    }

    public function viewRiderDetail($id){

        $rider = DB::table('riders as r')
                ->join('users as u','r.user_id', '=', 'u.id')
                ->join('countries as c','r.country_id', '=', 'c.id')
                ->join('cities as ci','r.city_id', '=', 'ci.id')
                ->join('users as us','r.added_by', '=', 'us.id')
                ->select('r.*','c.name as countryName','ci.name as cityName', 'u.email', 'us.name as addedBy_name')
                ->where(['r.id' => $id])
                ->first();
        
        return view('subadmin.rider.view-rider-detail')->with(compact('rider'));
        
    }

    public function addRider(Request $request){

    	$current_user = Auth::user();

        if($request->isMethod('post')){

            $data = $request->all();
            
            $usercount = User::where(['email'=>$data['email']])->count();

            if($usercount>0)
            {               
                return redirect()->back()->with('flash_message_error', 'Email Already Exist');
            }
            else if($data['password'] != $data['cpassword']){
                return redirect()->back()->with('flash_message_error', 'Both Passwords are not Same');
            }
            else
            {
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->isActive = 0;
                $user->save();
                $user->assignRole('rider');
                $userid = $user->id;

                if($user){

	                $rider = new Rider();
                    $rider->country_id = $data['country_id'];
                    $rider->city_id = $data['city_id'];
                    $rider->user_id = $userid;
                    $rider->unique_id = 'Rider-'.rand(0000,9999);
	                $rider->name = $data['name'];
                    $rider->d_o_b = $data['d_o_b'];
                    $rider->address = $data['address'];
                    $rider->phone_1 = $data['contact_1'];
                    $rider->phone_2 = $data['contact_2'];
                    $rider->nationality = $data['nationality'];
                    $rider->license_number = $data['license_number'];
                    $rider->license_expiry = $data['license_expiry'];

	                if($request->hasFile('image')){

	                    $image_tmp = $request->image;

	                    if($image_tmp->isValid()){
	                        // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
	                        $filename = 'rider_image_'.rand(1111,9999999).'.'.$extension;
	                        $large_image_path = 'images/backend_images/rider/'.$filename;
	                        $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
	                        $rider->image = $filename;
	                    }

	                }

                    if($request->hasFile('id_image')){

                        $image_tmp = $request->id_image;

                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'id_image_'.rand(1111,9999999).'.'.$extension;
                            $large_image_path = 'images/backend_images/rider/id/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $rider->id_image = $filename;
                        }

                    }

                    if($request->hasFile('license_image')){

                        $image_tmp = $request->license_image;

                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'license_image_'.rand(1111,9999999).'.'.$extension;
                            $large_image_path = 'images/backend_images/rider/license/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $rider->license_image = $filename;
                        }

                    }

                    $rider->added_by = $current_user->id;
                    $rider->is_verified = 'No';
                    $rider->status = 'Not verified';
                    $rider->isActive = 0;
	                $rider->save();

                    // data send to emails
                    $rider_details = array(
                        'user_id'   =>   $userid,
                        'name'      =>  $data['name'],
                        'email'      =>  $data['email'],
                        'phone'      =>  $data['contact_1'],
                    );

                    Mail::to($data['email'])->send(new SendMailToNewRider($rider_details));

                    $admin = User::where(['id'=>1])->first();
                    Mail::to($admin->email)->send(new SendMailToAdminAboutRider($rider_details));
                    
                    $sub_admin_count = SubAdminPrivilege::where(['city_id'=>$data['city_id']])->count();

                    $sub_admins = SubAdminPrivilege::where(['city_id'=>$data['city_id']])->get();

                    if ($sub_admin_count > 0) {

                        foreach ($sub_admins as $key) {

                            $subadmin = User::where(['id'=>$key->user_id])->first();

                            Mail::to($subadmin->email)->send(new SendMailToSubAdminAboutRider($rider_details));
                            
                        }
                    
                    }

                     // dd($admin, $sub_admins, $subadmin, $data['city_id']);                  

            	}

                return redirect('subadmin/view-rider')->with('flash_message_success','Rider Added successfully!');
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

            return view('subadmin.rider.create-rider')->with(compact('countries_dropdown'));
        }
    }

    public function editRider(Request $request, $id = null){

        if($request->isMethod('post')){

            $data = $request->all();

            $Rider_image = Rider::where(['id'=>$id])->first();
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
	            Rider::where(['id'=>$id])->update
	            ([
	                'country_id' => $data['country_id'],
                    'city_id' => $data['city_id'],
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
                    'isActive' => $data['isActive'],
	            ]);
        	}

        	return redirect('/subadmin/view-rider')->with('flash_message_success','Rider has been Updated Successfully!'); 
        }
 
        // $rider = Rider::where(['id'=>$id])->first();
        $rider = DB::table('riders as r')
                ->join('users as u','r.user_id', '=', 'u.id')
                ->select('r.*','u.email')
                ->where(['r.id' => $id])
                ->first();

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

      
        return view('subadmin.rider.edit-rider')->with(compact('countries_dropdown','rider', 'city'));
    }

    public function deleteRider($id = null){
    	
    	$Rider_image = Rider::where(['user_id'=>$id])->first();
        $image = $Rider_image->image;
        $id_image = $Rider_image->id_image;
        $license_image = $Rider_image->license_image;

        $image_path = 'images/backend_images/rider/'.$image;
        $id_image_path = 'images/backend_images/rider/id/'.$id_image;
        $license_image = 'images/backend_images/rider/license/'.$license_image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }
        if(File::exists($id_image_path)){
            File::delete($id_image_path);
        }
        if(File::exists($license_image)){
            File::delete($license_image);
        }

        $user = User::where(['id'=>$id])->delete();

        if($user){

    		Rider::where(['user_id'=>$id])->delete();
    	}

    	return redirect()->back()->with('flash_message_success','Rider has been deleted Successfully!');
    }

}
