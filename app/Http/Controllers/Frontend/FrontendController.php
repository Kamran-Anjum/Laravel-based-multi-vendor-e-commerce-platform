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
use Session;

use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Customer;
use App\Models\ProductRating;

use App\Models\Product;
use App\Models\ProductTranslate;

use App\Models\Category;
use App\Models\CategoryTranslate;

use App\Models\Brand;
use App\Models\BrandTranslate;

use App\Models\ProductUnit;
use App\Models\ProductUnitTranslate;

use App\Models\PriceUnit;
use App\Models\PriceUnitTranslate;

use App\Models\Slider;
use App\Models\HomeBanner;
use App\Models\WeServeProvide;
use App\Models\About;
use App\Models\CustomerReview;
use App\Models\OurTeam;

use App\Models\PageVisit;

class FrontendController extends Controller
{
    use  Notifiable, HasRoles;
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            // dd(Session::get('lang'));
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                
                $users = Auth::User();

                $user = User::where(['id'=> $users->id])->with('roles')->first();

                $role_name = $user->roles->first()->name;
                // dd($role_name);
                if($role_name == "vendor"){
                    if($user->isActive == 1){
                        return redirect('vendor/dashboard');
                    }else{
                        return redirect(Session::get('lang').'/login')->with('flash_message_error','Your account is not activated please contact to admin');
                    }
                }
                else if($role_name == "vendor-user"){
                    if($user->isActive == 1){
                        return redirect('vendoruser/dashboard');
                    }else{
                        return redirect(Session::get('lang').'/login')->with('flash_message_error','your account is not activated please contact to vendor');
                    }
                }
                else if($role_name == "rider"){
                    if($user->isActive == 1){
                        return redirect('rider/dashboard');
                    }else{
                        return redirect(Session::get('lang').'/login')->with('flash_message_error','your account is not activated please check you email');
                    }
                }
                else if($role_name == "customer"){
                    return redirect(Session::get('lang').'/home');
                }
                else{
                    // Session::flush();
                    return redirect(Session::get('lang').'/login')->with('flash_message_error','You do not have Rights to Access');
                }
            }
            else{
                return redirect(Session::get('lang').'/login')->with('flash_message_error','Invalid Username or Password');
            }
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Login';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.login');
    }

    public function index(){
        
        $lang = Session::get('lang');

        $sliders = DB::table('sliders')->where(['isActive'=>1])->get();

        $homebanner_full = DB::table('home_banners')->where(['condition'=>1])->first();
        $homebanner_sidebyside = DB::table('home_banners')->where(['condition'=>2])->first();
        $homebanner_bottomleft = DB::table('home_banners')->where(['condition'=>3])->first();

        $we_serve_provides = DB::table('we_serve_provides')->get();

        if(session()->has('city_session')){
            $newArrivalProducts = DB::table('product_translates as pt')
            ->where(['pt.isTopOffer'=>'1'])
            ->where(['pt.lang'=>$lang])
            ->where('pc.country_id','=', Session::get('country_session'))
            ->where('pc.city_id','=', Session::get('city_session'))
            ->join('product_cities as pc', 'pt.product_id', '=', 'pc.product_id')
            ->select('pt.*')
            ->orderBy('pt.updated_at', 'desc')
            ->get();
        }else{
            $newArrivalProducts = DB::table('product_translates')
            ->where(['isTopOffer'=>'1'])
            ->where(['lang'=>$lang])
            ->orderBy('updated_at', 'desc')
            ->get();
        }
        
        foreach ($newArrivalProducts as $key => $value) {
            $category_name = CategoryTranslate::where(['category_id'=>$value->category_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->category_name = $category_name->name;
            $price_unit = PriceUnitTranslate::where(['price_unit_id'=>$value->price_unit_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->price_unit = $price_unit->code;

            $brand_name = BrandTranslate::where(['brand_id'=>$value->brand_id])->where(['lang'=>$lang])->first();
            $newArrivalProducts[$key]->brand_name = $brand_name->name;
            /* Rating star show*/
            $ratingSum = ProductRating::where(['product_id'=>$value->product_id])->sum('star');
            $ratingcount = ProductRating::where(['product_id'=>$value->product_id])->count();

            if ($ratingcount > 0) {
                $newArrivalProducts[$key]->productrating = round($ratingSum/$ratingcount,1);
            } else {
                $newArrivalProducts[$key]->productrating = 0;
            }
            /* Rating star show*/
            
        }

        if(session()->has('city_session')){
            $isHotDealProducts = DB::table('product_translates as pt')
            ->where(['pt.isHotDeal'=>'1'])
            ->where(['pt.lang'=>$lang])
            ->where('pc.country_id','=', Session::get('country_session'))
            ->where('pc.city_id','=', Session::get('city_session'))
            ->join('product_cities as pc', 'pt.product_id', '=', 'pc.product_id')
            ->select('pt.*')
            ->orderBy('pt.updated_at', 'desc')
            ->get();
        }else{
            $isHotDealProducts = DB::table('product_translates')
            ->where(['isHotDeal'=>'1'])
            ->where(['lang'=>$lang])
            ->orderBy('updated_at', 'desc')
            ->get();
        }
        
        foreach ($isHotDealProducts as $key => $value) {
            $category_name = CategoryTranslate::where(['category_id'=>$value->category_id])->where(['lang'=>$lang])->first();
            $isHotDealProducts[$key]->category_name = $category_name->name;
            $price_unit = PriceUnitTranslate::where(['price_unit_id'=>$value->price_unit_id])->where(['lang'=>$lang])->first();
            $isHotDealProducts[$key]->price_unit = $price_unit->code;

            $brand_name = BrandTranslate::where(['brand_id'=>$value->brand_id])->where(['lang'=>$lang])->first();
            $isHotDealProducts[$key]->brand_name = $brand_name->name;
            /* Rating star show*/
            $ratingSum = ProductRating::where(['product_id'=>$value->product_id])->sum('star');
            $ratingcount = ProductRating::where(['product_id'=>$value->product_id])->count();

            if ($ratingcount > 0) {
                $isHotDealProducts[$key]->productrating = round($ratingSum/$ratingcount,1);
            } else {
                $isHotDealProducts[$key]->productrating = 0;
            }
            /* Rating star show*/
        }

        if(session()->has('city_session')){
            $bestSellerProducts = DB::table('product_translates as pt')
            ->where(['pt.lang'=>$lang])
            ->where('pc.country_id','=', Session::get('country_session'))
            ->where('pc.city_id','=', Session::get('city_session'))
            ->join('product_cities as pc', 'pt.product_id', '=', 'pc.product_id')
            ->select('pt.*')
            ->orderBy('pt.id', 'desc')
            ->get();
        }else{
            $bestSellerProducts = DB::table('product_translates')
            ->where(['lang'=>$lang])
            ->orderBy('id', 'desc')
            ->get();
        }
        
        foreach ($bestSellerProducts as $key => $value) {
            $category_name = CategoryTranslate::where(['category_id'=>$value->category_id])->where(['lang'=>$lang])->first();
            $bestSellerProducts[$key]->category_name = $category_name->name;
            $price_unit = PriceUnitTranslate::where(['price_unit_id'=>$value->price_unit_id])->where(['lang'=>$lang])->first();
            $bestSellerProducts[$key]->price_unit = $price_unit->code;

            $brand_name = BrandTranslate::where(['brand_id'=>$value->brand_id])->where(['lang'=>$lang])->first();
            $bestSellerProducts[$key]->brand_name = $brand_name->name;
            /* Rating star show */
            $ratingSum = ProductRating::where(['product_id'=>$value->product_id])->sum('star');
            $ratingcount = ProductRating::where(['product_id'=>$value->product_id])->count();

            if ($ratingcount > 0) {
                $bestSellerProducts[$key]->productrating = round($ratingSum/$ratingcount,1);
            } else {
                $bestSellerProducts[$key]->productrating = 0;
            }
            /* Rating star show */
        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Home';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.index')->with(compact('sliders', 'homebanner_full', 'homebanner_sidebyside', 'homebanner_bottomleft', 'we_serve_provides', 'isHotDealProducts', 'newArrivalProducts', 'bestSellerProducts'));
    }

    public function CheckCountryCitySession(){
        $chk = 0;
        if(session()->has('country_session')){
            if(session()->has('city_session')){
                $chk = 1;
            }
        }

        return $chk;
    }

    public function AddUpdateCountryCitySession($countryId, $cityId){
        if($countryId == 0 || $countryId == '0'){
            if(session()->has('country_session')){
                session()->forget('country_session');
            }
            if(session()->has('city_session')){
                session()->forget('city_session');
            }
        }else{
            session()->put('country_session', $countryId);
        }

        if($cityId == 0 || $cityId == '0'){
            if(session()->has('city_session')){
                session()->forget('city_session');
            }
        }else{
            session()->put('city_session', $cityId);
        }

        return 1;
    }

    public function aboutus(){

        $we_serve_provides = DB::table('we_serve_provides')->where(['isActive'=>1])->get();
        $abouts = DB::table('abouts')->where(['isActive'=>1])->get();
        $customer_reviews = DB::table('customer_reviews')->where(['isActive'=>1])->get();
        $our_teams = DB::table('our_teams')->where(['isActive'=>1])->get();

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'About';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.about_us')->with(compact('we_serve_provides', 'abouts', 'customer_reviews', 'our_teams'));
        
    }
    
    public function contactus(){

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Contact';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.contact_us');
    }

    public function updateLangSession($lang_code)
    {
        if(session()->has('lang')){
            session()->put('lang', $lang_code);
        }
        
        return $lang_code;
    }

    public function getStateName($id)
    {
        $states = DB::table('states')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $states;
    }

    public function getCityName($id)
    {
        $cities = DB::table('cities')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function getStateCityName($id)
    {
        $cities = DB::table('cities')->where(['state_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function supportchat(){

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Support Chat';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.support_chat');
    }

    // check email in our DB
    public function chk_email(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $check_email = User::where(['email' => $data['email']])->first();
            $check_email_count = User::where(['email' => $data['email']])->count();

            if($check_email_count > 0){

                return view('frontend.lost-password')->with(compact('check_email'));

            }else{
                return redirect()->back()->with('flash_message_error','This E-mail Is Not Registered.');
            }

        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Lost Password';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.lost-password');
        
    }

    // check email in our DB
    public function lostPasswordUpdated(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($data['password'] == $data['Cpassword']){

                $password = bcrypt($data['password']);

                User::where('id',$data['user_id'])->update(['password' => $password]);

                return redirect(Session::get('lang').'/login')->with('flash_message_success','Password Updated Successfully. Now Login');

            }else{

                $check_email = User::where(['email' => $data['user_id']])->first();

                return redirect()->back()->with('flash_message_error','Password & Confirm Password Not Match.');
            }

        }

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Lost Password';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.lost-password');
        
    }

    // check email in our DB
    public function getwishlist(){

        // data analytics
        $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
        $date_time = date('Y-m-d h:i A');

        $page_visit = new PageVisit();
        $page_visit->user_ip = $user_ip;
        $page_visit->page = 'Wishlist';
        $page_visit->date_time = $date_time;
        $page_visit->save();    
        // data analytics end here

        return view('frontend.wishlist');
        
    }

    public function getSubCategoryNav($category_id)
    {
        $all_sub_categoriesss = DB::table('category_translates')
                                ->where(['parent_id' => $category_id])
                                ->where(['lang' => Session::get('lang')])
                                ->where(['isActive' => 1])
                                ->get();

        $lang = session()->get('lang');

        $html = '';

        $html .= '<div class="tab-content" id="v-pills-tabContent">';
            $html .= '<div class="tab-pane fade show active" id="'.$category_id.'" role="tabpanel" aria-labelledby="v-pills-home-tab">';
                $html .= '<div class="tab-list row">';
                    $html .= '<ul class="cat-list">';
                        foreach($all_sub_categoriesss as $subCat){
                            $html .= '<li>';
                                $html .= '<a class="active" href="http://localhost:8000/'.$lang.'/shop/'.$category_id.'/'.$subCat->id.'/0">';
                                    $html .= $subCat->name;
                                $html .= '</a>';
                            $html .= '</li>';
                        }
                    $html .= '</ul>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';


        return $html;
        
    }
}
