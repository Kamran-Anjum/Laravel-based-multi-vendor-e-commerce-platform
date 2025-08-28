<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\CityArea;

class CityAreaController extends Controller
{
    public function addCityArea(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            $cities = new CityArea();
            $cities->name = $data['name'];
            $cities->country_id = $data['country_id'];
            $cities->state_id = $state;
            $cities->city_id = $data['city_id'];
            $cities->isActive = $data['isActive'];
            $cities->save();

            /*return redirect()->back()->with('flash_message_success','Product Added Successfully!');*/
            return redirect('/admin/view-city-area')->with('flash_message_success','City Area Added Successfully!');
        }

        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        return view('admin.city-areas.add_city_area')->with(compact('countries'));
    }

    public function viewCityArea()
    {
        $city_areas = DB::table('city_areas as ca')
		        ->join('countries as co','ca.country_id','=','co.id')
		        ->join('cities as c','ca.city_id','=','c.id')
		        ->select('ca.*','c.name as city_name','co.name as country_name')
		        ->get();

        $states = DB::table('states')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        return view('admin.city-areas.view_city_area')->with(compact('city_areas','states'));
    }

    public function editCityArea(Request $request, $id)
    {

        if($request->isMethod('post')){
            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            CityArea::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'country_id'=>$data['country_id'],
                'state_id'=>$state,
                'city_id'=>$data['city_id'],
                'isActive'=>$data['isActive'],
            ]);


            return redirect('/admin/view-city-area')->with('flash_message_success','City Area has been Updated Successfully!');

        }

        $cityareaDetails =CityArea::where(['id'=>$id])->first();
        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        $states = DB::table('states')->where(['country_id'=>$cityareaDetails->country_id])->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        $cities = DB::table('cities')->where(['country_id'=>$cityareaDetails->country_id])->where(['isActive'=>1])->get();

        return view('admin.city-areas.edit_city_area')->with(compact('cityareaDetails','countries','states', 'cities'));
    }

    public function deleteCityArea($id = null)
    {

        CityArea::where(['id'=>$id])->update
        ([
            'isActive'=>0
        ]);

        CityArea::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','City Area has been deleted Successfully!');

    }

    // ajax call
    public function getstatename($id)
    {
        $states = DB::table('states')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $states;
    }

    public function getcityname($id)
    {
        $cities = DB::table('cities')->where(['state_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

    public function getcityareaname($id)
    {
        $city_areas = DB::table('city_areas')->where(['city_id'=>$id])->where(['isActive'=> 1])->get();
        return $city_areas;
    }


}
