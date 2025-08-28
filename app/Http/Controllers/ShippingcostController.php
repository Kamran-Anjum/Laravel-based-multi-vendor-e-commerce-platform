<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\CityArea;
use App\Models\Shippingcost;
use App\Models\ShippingCostZoneCity;
use App\Models\ShippingZoneWeightCost;

class ShippingcostController extends Controller
{
    public function viewShippingcosts(){

        $shippingcosts = Shippingcost::orderBy('id', 'desc')->get();

        return view('admin.shippingcost.view_shippingcost')->with(compact('shippingcosts'));

    }

    public function viewShippingcostsdetails($id){

        $shippingcost = Shippingcost::where(['id'=>$id])->first();

        $zone_cities = DB::table('shipping_cost_zone_cities as sczc')
                    ->join('countries as co','sczc.country_id','=','co.id')
                    ->join('cities as c','sczc.city_id','=','c.id')
                    ->join('city_areas as ca','sczc.city_area_id','=','ca.id')
                    ->select('sczc.*','c.name as city_name','co.name as country_name', 'ca.name as area_name')
                    ->where(['sczc.shipping_cost_id'=>$id])
                    ->get();

        $states = DB::table('states')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        $zone_charges = DB::table('shipping_zone_weight_costs as sczc')
                    ->where(['shipping_cost_id'=>$id])
                    ->get();

        return view('admin.shippingcost.view_shippingcost_detail')->with(compact('shippingcost', 'zone_cities', 'states', 'zone_charges'));

    }

    public function addShippingcost(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            $shippingcost = new Shippingcost();
            $shippingcost->zone_name = $data['zone_name'];
            // $shippingcost->amountLimit = $data['amountLimit'];
            // $shippingcost->shippingCost = $data['shippingCost'];
            $shippingcost->save();

            $shipping_cost_id = $shippingcost->id;

            $shippingcost_cityzone = '';
            $already2 = '';
            $added = 0;
            $already = 0;

            for($i=0;$i<count($data['city_area_id']);$i++){

                $area_count = DB::table('shipping_cost_zone_cities')->count();

                if($area_count>0){
                    $areas = DB::table('shipping_cost_zone_cities')->get();
                    $flag = true;

                    foreach ($areas as $area) {
                        if($area->city_area_id == $data['city_area_id'][$i])
                        {
                            $flag = false;
                        }
                    }

                    if($flag == true){
                        $shippingcost_cityzone = new ShippingCostZoneCity();
                        $shippingcost_cityzone->shipping_cost_id = $shipping_cost_id;
                        $shippingcost_cityzone->country_id = $data['country_id'];
                        $shippingcost_cityzone->state_id = $data['state_id'];
                        $shippingcost_cityzone->city_id = $data['city_id'];
                        $shippingcost_cityzone->city_area_id = $data['city_area_id'][$i];
                        $shippingcost_cityzone->save();
                        $added++;
                    }else{
                        $already2 = "already exist";
                        $already++;
                    }
                }else{
                    $shippingcost_cityzone = new ShippingCostZoneCity();
                    $shippingcost_cityzone->shipping_cost_id = $shipping_cost_id;
                    $shippingcost_cityzone->country_id = $data['country_id'];
                    $shippingcost_cityzone->state_id = $data['state_id'];
                    $shippingcost_cityzone->city_id = $data['city_id'];
                    $shippingcost_cityzone->city_area_id = $data['city_area_id'][$i];
                    $shippingcost_cityzone->save();
                    $added++;
                }
            }

            if(!empty($shippingcost_cityzone)){
                return redirect('/admin/view-zone')->with('flash_message_success','Zone has been Added Successfully!');
            }else if(!empty($already) || $already != 0){
                return redirect()->back()->with('flash_message_error','Area Already Added');
            }else{
                return redirect()->back()->with('flash_message_error','Some error occured during teacher assign subject');
            } 

        }

        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        return view('admin.shippingcost.add_shippingcost')->with(compact('countries'));
    }

    public function addShippingcostcities(Request $request, $zone_id){

        if($request->isMethod('post')){

            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            $shipping_cost_id = $zone_id;

            $shippingcost_cityzone = '';
            $already2 = '';
            $added = 0;
            $already = 0;

            for($i=0;$i<count($data['city_area_id']);$i++){

                $area_count = DB::table('shipping_cost_zone_cities')->count();

                if($area_count>0){
                    $areas = DB::table('shipping_cost_zone_cities')->get();
                    $flag = true;

                    foreach ($areas as $area) {
                        if($area->city_area_id == $data['city_area_id'][$i])
                        {
                            $flag = false;
                        }
                    }

                    if($flag == true){
                        $shippingcost_cityzone = new ShippingCostZoneCity();
                        $shippingcost_cityzone->shipping_cost_id = $shipping_cost_id;
                        $shippingcost_cityzone->country_id = $data['country_id'];
                        $shippingcost_cityzone->state_id = $data['state_id'];
                        $shippingcost_cityzone->city_id = $data['city_id'];
                        $shippingcost_cityzone->city_area_id = $data['city_area_id'][$i];
                        $shippingcost_cityzone->save();
                        $added++;
                    }else{
                        $already2 = "already exist";
                        $already++;
                    }
                }else{
                    $shippingcost_cityzone = new ShippingCostZoneCity();
                    $shippingcost_cityzone->shipping_cost_id = $shipping_cost_id;
                    $shippingcost_cityzone->country_id = $data['country_id'];
                    $shippingcost_cityzone->state_id = $data['state_id'];
                    $shippingcost_cityzone->city_id = $data['city_id'];
                    $shippingcost_cityzone->city_area_id = $data['city_area_id'][$i];
                    $shippingcost_cityzone->save();
                    $added++;
                }
            }

            if(!empty($shippingcost_cityzone)){
                return redirect('/admin/view-zone-detail/'.$shipping_cost_id)->with('flash_message_success','Zone Area has been Added Successfully!');
            }else if(!empty($already) || $already != 0){
                return redirect()->back()->with('flash_message_error','Area Already Added');
            }else{
                return redirect()->back()->with('flash_message_error','Some error occured during teacher assign subject');
            } 

        }

        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        return view('admin.shippingcost.add_shippingcost_area')->with(compact('countries', 'zone_id'));
    }

    public function addShippingcostzonecharges(Request $request, $zone_id){

        if($request->isMethod('post')){

            $data = $request->all();

            $shipping_cost_id = $zone_id;

            for($i=0;$i<count($data['cost']);$i++){
                    $shipping_zone_charges = new ShippingZoneWeightCost();
                    $shipping_zone_charges->shipping_cost_id = $shipping_cost_id;
                    $shipping_zone_charges->weight_up_to = $data['weight_up_to'][$i];
                    $shipping_zone_charges->cost = $data['cost'][$i];
                    $shipping_zone_charges->save();
            }

            return redirect('/admin/view-zone-detail/'.$shipping_cost_id)->with('flash_message_success','Zone Charges has been Added Successfully!');

        }

        return view('admin.shippingcost.add_shippingcost_charges')->with(compact('zone_id'));
    }
    
    public function editShippingcost(Request $request, $id=null){

	    if($request->isMethod('post')){

            $data = $request->all();

            Shippingcost::where(['id'=>$id])->update
            ([
                'shippingCost'=>$data['shippingCost'],
                // 'zone_name'=>$data['zone_name'],
                // 'amountLimit'=>$data['amountLimit'],
            ]);

            return redirect('/admin/view-zone')->with('flash_message_success','Zone has been Updated Successfully!');
        }

        $shippingcostDetails = Shippingcost::where(['id'=>$id])->first();
        
        return view('admin.shippingcost.edit_shippingcost')->with(compact('shippingcostDetails'));
        
    }

    public function editShippingcostzonecharges(Request $request, $id=null){

        if($request->isMethod('post')){

            $data = $request->all();

            ShippingZoneWeightCost::where(['id'=>$id])->update
            ([
                'cost'=>$data['cost'],
            ]);

            return redirect('/admin/view-zone-detail/'.$data['shipping_cost_id'])->with('flash_message_success','Zone Charges has been Updated Successfully!');
        }

        $shippingzonecharges = ShippingZoneWeightCost::where(['id'=>$id])->first();
        
        return view('admin.shippingcost.edit_shippingcost_charges')->with(compact('shippingzonecharges'));
        
    }

    public function deleteShippingCost($id){

        ShippingCostZoneCity::where(['shipping_cost_id'=>$id])->delete();

        ShippingZoneWeightCost::where(['shipping_cost_id'=>$id])->delete();

        Shippingcost::where(['id'=>$id])->delete();

        return redirect('/admin/view-zone')->with('flash_message_success','Zone has been Deleted Successfully!');

    }

    public function deleteShippingCostArea($id){

        ShippingCostZoneCity::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Zone Area has been Deleted Successfully!');

    }

    public function deleteShippingCostAreaCharges($id){

        ShippingZoneWeightCost::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Zone Area Charges has been Deleted Successfully!');

    }

}
