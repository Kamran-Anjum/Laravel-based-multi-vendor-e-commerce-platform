<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function addCity(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            $cities = new City();
            $cities->name = $data['name'];
            $cities->code = $data['code'];
            $cities->country_id = $data['country_id'];
            $cities->state_id = $state;
            $cities->shortName = $data['shortName'];
            $cities->lat = "";
            $cities->long = "";
            $cities->isActive = $data['isActive'];
            $cities->isDeleted = '0';
            $cities->save();

            /*return redirect()->back()->with('flash_message_success','Product Added Successfully!');*/
            return redirect('/admin/view-city')->with('flash_message_success','City Added Successfully!');
        }
        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        return view('admin.cites.add_cites')->with(compact('countries'));
    }

    public function viewCity()
    {
        $cites = DB::table('cities as c')
        ->where('c.isDeleted','=','0')
        ->where('c.deleted_at','=',null)
        ->join('countries as co','c.country_id','=','co.id')
        ->select('c.name','co.name as country_name','c.code','c.shortName','c.isActive','c.isDeleted','c.id','c.state_id as stateId')
        ->get();

        $states = DB::table('states')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();

        // ,'s.name as state_name'
        return view('admin.cites.view_cites')->with(compact('cites','states'));
    }

    public function editCity(Request $request, $id)
    {

        if($request->isMethod('post')){
            $data = $request->all();

            if($data['state_id'] == 0 || $data['state_id'] == '0'){
                $state = "";
            }else{
                $state = $data['state_id'];
            }

            City::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'code'=>$data['code'],
                'country_id'=>$data['country_id'],
                'state_id'=>$state,
                'shortName'=>$data['shortName'],
                'isActive'=>$data['isActive'],
            ]);


            return redirect('/admin/view-city')->with('flash_message_success','City has been Updated Successfully!');
        }
        // $country_id = $data['country_id'];
        $citiesDetails =City::where(['id'=>$id])->first();
        // $citiesDetails->save();
        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        $states = DB::table('states')->where(['country_id'=>$citiesDetails->country_id])->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        // where(['country_id'=>$citiesDetails->country_id])->
        return view('admin.cites.edit_cites')->with(compact('citiesDetails','countries','states'));
    }
    public function deleteCity($id = null)
    {

        City::where(['id'=>$id])->update
        ([
            'isActive'=>0
        ]);

        City::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','City has been deleted Successfully!');
    }

  //   public function statename(Request $request)
  //   {
  //       $data = DB::table('states')->where('country_id', '=', $request->id)->where('deleted_at','=',NULL)
  //           ->select('name', 'id')
  //           ->get();
		// return response()->json($data);
  //   }
}
