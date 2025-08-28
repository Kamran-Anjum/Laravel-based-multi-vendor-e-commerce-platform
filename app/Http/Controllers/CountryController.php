<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CountryController extends Controller
{
    public function addCountry(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $country = new Country();
            $country->name = $data['name'];
            $country->code = $data['code'];
            $country->shortName = $data['shortName'];
            $country->lat = "";
            $country->long = "";
            $country->isActive = $data['isActive'];
            $country->isDeleted = '0';
            $country->save();
            /*return redirect()->back()->with('flash_message_success','Product Added Successfully!');*/
            return redirect('/admin/view-country')->with('flash_message_success','Country Added Successfully!');
        }
        return view('admin.countries.add_countries');
    }

    public function viewCountry()
    {
        $countries =DB::table('countries')
        ->where('isDeleted','=','0')
        ->where('deleted_at','=',null)->get();
        return view('admin.countries.view_countries')->with(compact('countries'));
    }

    public function editCountry(Request $request, $id =null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            Country::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'code'=>$data['code'],
                'shortName'=>$data['shortName'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-country')->with('flash_message_success','Country has been Updated Successfully!');
        }

        $countryDetails = Country::where(['id'=>$id])->first();
        // $countryDetails->save();
        return view('admin.countries.edit_countries')->with(compact('countryDetails'));
    }
    public function deleteCountry($id = null)
    {
        Country::where(['id'=>$id])->update
        ([
            'isActive'=>0
        ]);

        Country::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Country has been deleted Successfully!');
    }
}
