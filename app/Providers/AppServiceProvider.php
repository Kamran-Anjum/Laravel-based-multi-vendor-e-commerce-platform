<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Http\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Promotion;
use App\Models\ProductTranslate;
use App\Models\CategoryTranslate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            if(Auth::user()){

                // subadmin part
                $citiess = DB::table('sub_admin_privileges as sap')
                            ->where(['sap.user_id'=> Auth::user()->id])
                            ->join('cities as ci', 'sap.city_id', '=', 'ci.id')
                            ->select('sap.*','ci.id as cityId','ci.name as cityName')
                            ->get();

                if(!$citiess->isEmpty()){
                    $citiessss = DB::table('sub_admin_privileges as sap')
                                ->where(['sap.user_id'=> Auth::user()->id])
                                ->join('cities as ci', 'sap.city_id', '=', 'ci.id')
                                ->select('sap.*','ci.id as cityId','ci.name as cityName')
                                ->first();

                    if(!session()->has('SubAdminActiveCity')){
                        session()->put('SubAdminActiveCity', $citiessss->cityId);
                    }
                }

                $privilegee = DB::table('sub_admin_privileges')
                            ->where(['user_id'=>Auth::user()->id])
                            ->where(['city_id'=>Session::get('SubAdminActiveCity')])
                            ->first();

                // vendor part
                $vendor_citiess = DB::table('vendor_privileges as vp')
                                ->where(['vp.user_id'=> Auth::user()->id])
                                ->join('cities as ci', 'vp.city_id', '=', 'ci.id')
                                ->select('vp.*','ci.id as cityId','ci.name as cityName')
                                ->get();

                if(!$vendor_citiess->isEmpty()){
                    $vendor_citiessss = DB::table('vendor_privileges as vp')
                                        ->where(['vp.user_id'=> Auth::user()->id])
                                        ->join('cities as ci', 'vp.city_id', '=', 'ci.id')
                                        ->select('vp.*','ci.id as cityId','ci.name as cityName')
                                        ->first();

                    if(!session()->has('VendorActiveCity')){
                        session()->put('VendorActiveCity', $vendor_citiessss->cityId);
                    }
                }

                // vendor user part
                $vendor_user_citiess = DB::table('vendor_user_privileges as vup')
                                        ->where(['vup.user_id'=> Auth::user()->id])
                                        ->join('cities as ci', 'vup.city_id', '=', 'ci.id')
                                        ->select('vup.*','ci.id as cityId','ci.name as cityName')
                                        ->get();

                if(!$vendor_user_citiess->isEmpty()){
                    $vendor_user_citiessss = DB::table('vendor_user_privileges as vup')
                                            ->where(['vup.user_id'=> Auth::user()->id])
                                            ->join('cities as ci', 'vup.city_id', '=', 'ci.id')
                                            ->select('vup.*','ci.id as cityId','ci.name as cityName')
                                            ->first();

                    if(!session()->has('VendorUserActiveCity')){
                        session()->put('VendorUserActiveCity', $vendor_user_citiessss->cityId);
                    }
                }

                $ven_user_privilegee = DB::table('vendor_user_privileges')
                                        ->where(['user_id'=>Auth::user()->id])
                                        ->where(['city_id'=>Session::get('VendorUserActiveCity')])
                                        ->first();

                // rider city id
                $active_rider = DB::table('riders')->where(['user_id'=> Auth::user()->id])->get();

                if(!$active_rider->isEmpty()){
                    $rider = DB::table('riders')->where(['user_id'=> Auth::user()->id])->first();

                    if(!session()->has('RiderCity')){
                        session()->put('RiderCity', $rider->city_id);
                    }
                }

                $view
                    ->with('citiess', $citiess)
                    ->with('privilegee', $privilegee)
                    ->with('vendor_citiess', $vendor_citiess)
                    ->with('vendor_user_citiess', $vendor_user_citiess)
                    ->with('ven_user_privilegee', $ven_user_privilegee);
            }
            
            // frontend part 
            if(!session()->has('lang')){
                session()->put('lang', 'en');
            }

            $footer = DB::table('footers')->first();
            $footer_count = DB::table('footers')->count();

            $categoriesss = DB::table('category_translates')
                            ->where(['parent_id' => 0])
                            ->where(['lang' => Session::get('lang')])
                            ->where(['isActive' => 1])
                            ->limit(6)
                            ->get();

            $all_categoriesss = DB::table('category_translates as ct')
                                ->leftJoin('product_translates as pt', function($join) {
                                    $join->on('ct.id', '=', 'pt.category_id')
                                         ->where('pt.lang', '=', Session::get('lang'));
                                })
                                ->select('ct.*', DB::raw('COUNT(pt.id) as product_count'))
                                ->groupBy('ct.id')
                                // ->orderBy('ct.id', 'asc')
                                ->where(['ct.parent_id' => 0])
                                ->where(['ct.lang' => Session::get('lang')])
                                ->where(['ct.isActive' => 1])
                                ->get();
                                // dd($all_categoriesss);

            $promotions = DB::table('promotions')->orderBy('id', 'desc')->get();
            $cur_date = date('Y-m-d');
            foreach ($promotions as $promo) {
                if ($cur_date > $promo->to_date) {
                    Promotion::where(['id'=>$promo->id])->update
                    ([
                        'isActive'=>0,
                    ]);

                    ProductTranslate::where(['promotion_id'=>$promo->id])->update
                    ([
                        'promotion_id'=>0,
                    ]);

                    CategoryTranslate::where(['promotion_id'=>$promo->id])->update
                    ([
                        'promotion_id'=>0,
                    ]);
                }
            }
            $all_promo = DB::table('promotions')->where('to_date', '>=', date('Y-m-d'))->where(['isActive' => 1])->get();

            $countriesss = DB::table('countries')->where(['isActive' => 1])->get();

            $countriesss_dropdown = "";
            if(session()->has('country_session')){
                foreach($countriesss as $countsss)
                {
                    if($countsss->id == Session::get('country_session')){
                        $countriesss_dropdown .= "<option selected value='".$countsss->id."'>".$countsss->name . "</option>";
                    }else{
                        $countriesss_dropdown .= "<option value='".$countsss->id."'>".$countsss->name . "</option>";
                    }
                }
            }else{
                foreach($countriesss as $countsss)
                {
                    $countriesss_dropdown .= "<option value='".$countsss->id."'>".$countsss->name . "</option>";
                }
            }

            $citiesss_dropdown = "";
            if(session()->has('city_session')){
                $citiesss = DB::table('cities')
                            ->where(['country_id' => Session::get('country_session')])
                            ->where(['isActive' => 1])
                            ->get();

                foreach($citiesss as $citsss)
                {
                    if($citsss->id == Session::get('city_session')){
                        $citiesss_dropdown .= "<option selected value='".$citsss->id."'>".$citsss->name . "</option>";
                    }else{
                        $citiesss_dropdown .= "<option value='".$citsss->id."'>".$citsss->name . "</option>";
                    }
                }
            }

            $all_cities = DB::table('cities')->where(['isActive' => 1])->get();

            if(!session()->has('Support_User')){
                session()->put('Support_User', "User_".rand('1111','9999'));
            }

            // session()->forget('country_session');
            // session()->forget('city_session');
            // session()->forget('session_cart');
            $cart_items = 0;
            if(session()->has('session_cart')){
                $cart_items = count(Session::get('session_cart'));
            }

            $cart_productDetails = [];
            if(session()->has('session_cart')){
                foreach(session()->get('session_cart') as $cart_item){
                    $product = DB::table('product_translates')
                                ->where(['product_id' => $cart_item['id']])
                                ->where(['lang' => Session::get('lang')])
                                ->first();

                    if($product){
                        $cart_productDetails[] = [
                            'id' => $cart_item['id'],
                            'name' => $product->name,
                            'price' => $cart_item['price'],
                            'quantity' => $cart_item['quantity'],
                            'description' => $product->description,
                            'image' => $product->image,
                            'weight' => $product->weight,
                        ];
                    }
                }
            }


            $home_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'/'])->first();
            $about_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'about'])->first();
            $contact_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'contact'])->first();
            $shop_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'shop'])->first();

            $category_meta_tags = DB::table('meta_tags')->where(['table_name'=>'categories'])->get();
            $brand_meta_tags = DB::table('meta_tags')->where(['table_name'=>'brands'])->get();
            $product_meta_tags = DB::table('meta_tags')->where(['table_name'=>'products'])->get();

            $vat = DB::table('v_a_t_s')->where(['id'=>1])->first();

            $view
                ->with('footer', $footer)
                ->with('footer_count', $footer_count)
                ->with('categoriesss', $categoriesss)
                ->with('all_categoriesss', $all_categoriesss)
                ->with('all_promo', $all_promo)
                ->with('countriesss_dropdown', $countriesss_dropdown)
                ->with('citiesss_dropdown', $citiesss_dropdown)
                ->with('all_cities', $all_cities)
                ->with('cart_items', $cart_items)
                ->with('cart_productDetails', $cart_productDetails)
                ->with('home_meta_tags', $home_meta_tags)
                ->with('about_meta_tags', $about_meta_tags)
                ->with('contact_meta_tags', $contact_meta_tags)
                ->with('shop_meta_tags', $shop_meta_tags)
                ->with('category_meta_tags', $category_meta_tags)
                ->with('brand_meta_tags', $brand_meta_tags)
                ->with('product_meta_tags', $product_meta_tags)
                ->with('vat', $vat);
        });
    }
}
