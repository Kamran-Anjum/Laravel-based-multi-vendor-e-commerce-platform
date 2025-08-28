<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\PriceUnit;
use App\Models\PriceUnitTranslate;
use Image;
use File;

class PriceUnitController extends Controller
{
    public function addPriceUnit(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $price_unit = new PriceUnit();
            $price_unit->save();
            $price_unit_id = $price_unit->id;

            if($price_unit){
                if($data['lang_dropdown'] == "en"){
                    $en_price_unit_trans = new PriceUnitTranslate();
                    $en_price_unit_trans->price_unit_id = $price_unit_id;
                    $en_price_unit_trans->lang = "en";
                    $en_price_unit_trans->name = $data['en_name'];
                    $en_price_unit_trans->code = $data['en_code'];
                    $en_price_unit_trans->shortName = $data['en_short_name'];
					$en_price_unit_trans->isActive = $data['en_isActive'];
                    $en_price_unit_trans->save();
                }
                else
                if($data['lang_dropdown'] == "ar"){
                    $ar_price_unit_trans = new PriceUnitTranslate();
                    $ar_price_unit_trans->price_unit_id = $price_unit_id;
                    $ar_price_unit_trans->lang = "ar";
                    $ar_price_unit_trans->name = $data['ar_name'];
                    $ar_price_unit_trans->code = $data['ar_code'];
                    $ar_price_unit_trans->shortName = $data['ar_short_name'];
                    $ar_price_unit_trans->isActive = $data['ar_isActive'];
                    $ar_price_unit_trans->save();
                }else{
                    $en_price_unit_trans = new PriceUnitTranslate();
                    $en_price_unit_trans->price_unit_id = $price_unit_id;
                    $en_price_unit_trans->lang = "en";
                    $en_price_unit_trans->name = $data['en_name'];
                    $en_price_unit_trans->code = $data['en_code'];
                    $en_price_unit_trans->shortName = $data['en_short_name'];
					$en_price_unit_trans->isActive = $data['en_isActive'];
                    $en_price_unit_trans->save();

                    $ar_price_unit_trans = new PriceUnitTranslate();
                    $ar_price_unit_trans->price_unit_id = $price_unit_id;
                    $ar_price_unit_trans->lang = "ar";
                    $ar_price_unit_trans->name = $data['ar_name'];
                    $ar_price_unit_trans->code = $data['ar_code'];
                    $ar_price_unit_trans->shortName = $data['ar_short_name'];
                    $ar_price_unit_trans->isActive = $data['ar_isActive'];
                    $ar_price_unit_trans->save();
                }
            }

            return redirect('/admin/view-price-units')->with('flash_message_success','Price Unit added successfully');
        }

        return view('admin.price-units.add-unit');

    }

    public function viewPriceUnits(){
        $price_units = DB::table('price_units as pu')
        ->where(['put.isActive'=>1])
        ->join('price_unit_translates as put','put.price_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->get();

        return view('admin.price-units.view-units')->with(compact('price_units'));
    }

    public function viewENPriceUnits(){
        $price_units = DB::table('price_units as pu')
        ->where(['put.isActive'=>1])
        ->join('price_unit_translates as put','put.price_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->where(['put.lang'=>'en'])
        ->get();

        return view('admin.price-units.view-units')->with(compact('price_units'));
    }

    public function viewARPriceUnits(){
        $price_units = DB::table('price_units as pu')
        ->where(['put.isActive'=>1])
        ->join('price_unit_translates as put','put.price_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->where(['put.lang'=>'ar'])
        ->get();

        return view('admin.price-units.view-units')->with(compact('price_units'));
    }

    public function editPriceUnit(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            PriceUnitTranslate::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'code'=>$data['code'],
                'shortName'=>$data['short_name'],
                'isActive' => $data['isActive']
            ]);

            return redirect('/admin/view-price-units')->with('flash_message_success','Price Unit has been Updated Successfully!');
        }

        $price_unit_trans = PriceUnitTranslate::where(['id'=>$id])->first();

        return view('admin.price-units.edit-unit')->with(compact('price_unit_trans'));
    }
    
    public function deletePriceUnit(Request $request, $id=null){

        $price_unit = PriceUnitTranslate::where(['id'=>$id])->first();
        $price_unit_id = $price_unit->price_unit_id;

            PriceUnitTranslate::where(['id'=>$id])->delete();

        $price_unit_trans = PriceUnitTranslate::where(['price_unit_id'=>$price_unit_id])->get();
        if($price_unit_trans->isEmpty()){
            PriceUnit::where(['id'=>$price_unit_id])->delete();
        }

        return redirect()->back()->with('flash_message_success','Price Unit Deleted successfully!');
    }
}
