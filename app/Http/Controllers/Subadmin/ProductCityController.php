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
use App\Models\Product;
use App\Models\ProductCity;
use App\Models\ProductTranslate;

class ProductCityController extends Controller
{
    public function viewProductCities($productId = null){

        $cities = DB::table('product_cities as pc')
        ->where(['pc.product_id'=>$productId])
        ->where(['pc.created_by'=>Auth::user()->id])
        ->join('countries as c','pc.country_id','=','c.id')
        ->join('cities as ci','pc.city_id','=','ci.id')
        ->select('pc.*','c.name as countryName','ci.name as cityName')
        ->get();

        return view('subadmin.products.cities.view-cities')->with(compact('cities','productId'));
    }

    public function addProductCity(Request $request, $productId = null){
    	if($request->isMethod('post')){
    		$data = $request->all();

            if($productId){

                $count = (int)$data['countrowdata'];
                for($i=1; $i <= $count ; $i++){
                    if(isset($data['countryid_'.$i])){
                        $find_id = DB::table('product_cities')
                        ->where(['product_id'=>$productId])
                        ->where(['country_id'=>$data['countryid_'.$i]])
                        ->where(['city_id'=>$data['cityid_'.$i]])
                        ->get();

                        if($find_id->isEmpty()){
                            $product_cities = new ProductCity();
                            $product_cities->product_id = $productId;
                            $product_cities->country_id = $data['countryid_'.$i];
                            $product_cities->city_id = $data['cityid_'.$i];
                            $product_cities->created_by = Auth::user()->id;
                            $product_cities->save();
                        }
                    }
                }

                return redirect('/subadmin/view-product-cities/'.$productId)->with('flash_message_success','City Added Successfully!');
            }
        }

        // Country dropdown
        $countries = DB::table('sub_admin_privileges as sap')
        ->where(['sap.user_id'=> Auth::user()->id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('countries as c','sap.country_id','=','c.id')
        ->select('sap.*','c.name as countryName','c.id as countryId')
        ->groupBy('sap.country_id')
        ->get();

        $countries_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->countryId."'>".$cont->countryName . "</option>";
        }

        return view('subadmin.products.cities.add-city')->with(compact('countries_dropdown','productId'));
    }

    public function deleteProductCity($id = null){
        ProductCity::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','City has been deleted Successfully!');
    }

}
