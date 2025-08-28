<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
	public function addState(Request $request)
	{
        if($request->isMethod('post')){
            $data = $request->all();
            $states = new State();
            $states->name = $data['name'];
            $states->code = $data['code'];
            $states->country_id = $data['country_id'];
            $states->shortName = $data['shortName'];
            $states->lat = "";
            $states->long = "";
            $states->isActive = $data['isActive'];
            $states->isDeleted = '0';
            $states->save();
            /*return redirect()->back()->with('flash_message_success','Product Added Successfully!');*/
            return redirect('/admin/view-state')->with('flash_message_success','State Added Successfully!');

        }
        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        $countries_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($countries as $cont){
            $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        }

        return view('admin.states.add_states')->with(compact('countries_dropdown'));
    }
    public function viewState()
    {
        $states = DB::table('states as s')->where('s.isDeleted','=','0')
        	->where(['s.deleted_at'=>null])
            ->join('countries as c','s.country_id','=','c.id')
            ->select('s.id','s.name','s.code','s.shortName','s.lat','s.long','s.isActive','c.name as country_name')
            ->get();

        return view('admin.states.view_states')->with(compact('states'));
    }

    public function editState(Request $request, $id =null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            State::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'code'=>$data['code'],
                'country_id'=>$data['country_id'],
                'shortName'=>$data['shortName'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-state')->with('flash_message_success','State has been Updated Successfully!');
        }

        $statesDetails =State::where(['id'=>$id])->first();
        // $statesDetails->save();


        $countries = DB::table('countries')->where(['isActive'=>1])->where(['isDeleted'=>0])->get();
        // $countries_dropdown = "<option selected value='' disabled>Select</option>";
        // foreach($countries as $cont) {
        //     $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        // }
        return view('admin.states.edit_states')->with(compact('statesDetails','countries'));
    }

    public function deleteState($id = null)
    {
        State::where(['id'=>$id])->update
        ([
            'isActive'=>0
        ]);

        State::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','State has been deleted Successfully!');
    }
}
