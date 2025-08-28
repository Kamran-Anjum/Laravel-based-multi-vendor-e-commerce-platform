<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;
use App\Models\User;
use Image;

class UserController extends Controller
{
    public function sendMessage(){

        return view('PhoneNumber');
    }

    public function index(){

        $factory = (new Factory)->withServiceAccount(__DIR__.'/storeshop.json');

        $database = $factory->createDatabase();

        $newPost = $database
        ->getReference('blog/posts')
        ->push(['title' => 'Post title','body' => 'This should probably be longer.']);

        // return response()->json($user, 200);
        return response()->json($user);
  	}

  // // 	public function register(Request $request){
  // // 		$data = $request->all();

  // // 		if($data['email'] != ""){
		// // 	$email = $data['email'];

		// // 	$validator = Validator::make($data, [
		// // 	    'username' => 'string|alpha_dash|max:255|unique:users',
		// // 	    'email' => 'required|string|email|unique:users',
		// // 	    'password' => 'required|string'
		// // 	]);
		// // }

		// // if($validator->fails()){
		// // 	$response = [
  // //               'http_status' => "fail",
  // //               'message' => $validator->errors()
  // //           ];

  // //           return response()->json($response, 401);
  // //   	}else{

  // //   		$user = new User();
  // //           $user->username = $data['username'];
  // //           $user->email = $email;
  // //           $user->password = bcrypt($data['password']);
	 // //        $user->save();

		// // 	if($user){
  // //               $user_id = $user->id;

  // //               $user_detail = new UserDetail();
  // //               $user_detail->user_id = $user_id;
  // //               $user_detail->user_type = $data['user_type'];
  // //               $user_detail->first_name = $data['first_name'];
  // //               $user_detail->last_name = $data['last_name'];
  // //               $user_detail->dob = $data['dob'];
  // //               $user_detail->contact = $data['contact'];
  // //               $user_detail->city = $data['city'];
  // //               $user_detail->country = $data['country'];
  // //               $user_detail->about_me = $data['about_me'];
  // //               $user_detail->make_smile = $data['make_smile'];

  // //               $user_detail->org_status = 0;
  // //               $user_detail->org_id = 0;
  // //               $user_detail->anonymous_status = 0;
  // //               $user_detail->privacy_status = 0;
  // //               $user_detail->member_type = "";

  // //               if($request->hasFile('image')){
  // //                   $image_tmp = $request->image;
  // //                   if($image_tmp->isValid()){
  // //                       $extension = $image_tmp->getClientOriginalExtension();
  // //                       $filename = 'user'.rand(1111,9999999).'.'.$extension;
  // //                       $large_image_path = 'images/backend-images/zakati/users/large/'.$filename;
  // //                       $medium_image_path = 'images/backend-images/zakati/users/medium/'.$filename;
  // //                       $small_image_path = 'images/backend-images/zakati/users/small/'.$filename;
  // //                       $tiny_image_path = 'images/backend-images/zakati/users/tiny/'.$filename;
  // //                       Image::make($image_tmp)->save($large_image_path);
  // //                       Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
  // //                       Image::make($image_tmp)->resize(166,266)->save($small_image_path);
  // //                       Image::make($image_tmp)->resize(100,100)->save($tiny_image_path);
  // //                       $user_detail->image = $filename;
  // //                   }
  // //               }
  // //               $user_detail->save();

  // //               if($user_detail){
  // //                   $accessToken = $user->createToken('authToken');
  // //                   $token = $accessToken->accessToken;

  // //                   $detail = array(
  // //                       'accessToken' => $token,
  // //                       'tokenType' => 'Bearer',
  // //                       'user_id' => $user_id,
  // //                       'user_type' => $data['user_type']
  // //                   );

  // //                   $response = [
  // //                       'http_status' => "success",
  // //                       'message' => "User Successfully Register",
  // //                       'data' => $detail
  // //                   ];

  // //                   return response()->json($response, 201);
  // //               }
		// // 	}
		// // }
  // //   }

    public function login(Request $request){
 
        $username = $request->username;
        $password = $request->password;
        
        $chk_user = "";
        $status = 0;
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            if(Auth::attempt(['email'=>$username,'password'=>$password]))
            {
                $user = $request->user();
                $user_id = $user->id;
                $status = $user->is_Active;

                $user_detail = UserDetail::where('user_id', $user_id)->first();

                if($user_detail){
                    $user_type = $user_detail->user_type;
                }else{
                    $user_type = "admin";
                }

                $chk_user = "Email";
            }
        }else{
            if(Auth::attempt(['username'=>$username,'password'=>$password]))
            {
                $user = $request->user();
                $user_id = $user->id;
                $status = $user->is_Active;

                $user_detail = UserDetail::where('user_id', $user_id)->first();
                
                if($user_detail){
                    $user_type = $user_detail->user_type;
                }else{
                    $user_type = "admin";
                }

                $chk_user = "Username";
            }
        }

        if(!empty($chk_user)){
            if($status == 1){
                $accessToken = $user->createToken('authToken');
                $token = $accessToken->accessToken;

                $detail = array(
                    'accessToken' => $token,
                    'tokenType' => 'Bearer',
                    'user_id' => $user_id,
                    'user_type' => $user_type
                );

                $response = [
                    'http_status' => "success",
                    'message' => "User Successfully Login",
                    'data' => $detail
                ];
            }else{
                $response = [
                    'http_status' => "fail",
                    'message' => "Something is wrong on user login"
                ];
            }
        }else{
            $response = [
                'http_status' => "fail",
                'message' => "Invalid Login Credentials"
            ];
        }

        return response()->json($response);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();

        $response = [
            'http_status' => "success",
            'message' => "User Successfully Logout"
        ];

        return response()->json($response);
    }

    public function changePassword(Request $request) {
        $data = $request->all();

        $user_id = Auth::guard('api')->user()->id;

        $validator = Validator::make($data, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        if($validator->fails()){
            $response = [
                'http_status' => "fail",
                'message' => $validator->errors()
            ];

            // return response()->json($response, 401);
        }else{

            if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                $response = [
                    'http_status' => "fail",
                    'message' => "Error: Incorrect password"
                ];

                // return response()->json($response, 400);
            }
            else
            if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                $response = [
                    'http_status' => "fail",
                    'message' => "Error: old password and new password similar"
                ];

                // return response()->json($response, 400);
            }
            else {
                $user = User::where('id', $user_id)->update([
                    'password' => Hash::make($data['new_password'])
                ]);

                if($user){
                    $response = [
                        'http_status' => "success",
                        'message' => "User Password Reset Successfully"
                    ];

                    // return response()->json($response, 200);
                }else{
                    $response = [
                        'http_status' => "fail",
                        'message' => "Error: Something accur wrong on pasword reseting"
                    ];

                    // return response()->json($response, 400);
                }
            }
        }

        return response()->json($response);
    }

    public function forgotPassword(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email'
        ]);

        if($validator->fails()){
            $response = [
                'http_status' => "fail",
                'message' => $validator->errors()
            ];
        }else{

            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject($this->getEmailSubject());
            });
            switch ($response) {
                case Password::RESET_LINK_SENT:
                    $response = [
                        'http_status' => "success",
                        'message' => "Link Sent Successfully"
                    ];
                case Password::INVALID_USER:
                    $response = [
                        'http_status' => "fail",
                        'message' => "Error : Invalid user"
                    ];
            }
        }

        return response()->json($response);
    }
}
