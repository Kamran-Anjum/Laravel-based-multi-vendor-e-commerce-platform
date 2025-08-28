<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\ProductUnit;
use App\Models\ProductUnitTranslate;
use Image;
use File;

class ProductUnitController extends Controller
{
    public function addProductUnit(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $product_unit = new ProductUnit();
            $product_unit->save();
            $product_unit_id = $product_unit->id;

            if($product_unit){
                if($data['lang_dropdown'] == "en"){
                    $en_product_unit_trans = new ProductUnitTranslate();
                    $en_product_unit_trans->product_unit_id = $product_unit_id;
                    $en_product_unit_trans->lang = "en";
                    $en_product_unit_trans->name = $data['en_name'];
                    $en_product_unit_trans->code = $data['en_code'];
                    $en_product_unit_trans->shortName = $data['en_short_name'];
					$en_product_unit_trans->isActive = $data['en_isActive'];
                    $en_product_unit_trans->save();
                }
                else
                if($data['lang_dropdown'] == "ar"){
                    $ar_product_unit_trans = new ProductUnitTranslate();
                    $ar_product_unit_trans->product_unit_id = $product_unit_id;
                    $ar_product_unit_trans->lang = "ar";
                    $ar_product_unit_trans->name = $data['ar_name'];
                    $ar_product_unit_trans->code = $data['ar_code'];
                    $ar_product_unit_trans->shortName = $data['ar_short_name'];
                    $ar_product_unit_trans->isActive = $data['ar_isActive'];
                    $ar_product_unit_trans->save();
                }else{
                    $en_product_unit_trans = new ProductUnitTranslate();
                    $en_product_unit_trans->product_unit_id = $product_unit_id;
                    $en_product_unit_trans->lang = "en";
                    $en_product_unit_trans->name = $data['en_name'];
                    $en_product_unit_trans->code = $data['en_code'];
                    $en_product_unit_trans->shortName = $data['en_short_name'];
					$en_product_unit_trans->isActive = $data['en_isActive'];
                    $en_product_unit_trans->save();

                    $ar_product_unit_trans = new ProductUnitTranslate();
                    $ar_product_unit_trans->product_unit_id = $product_unit_id;
                    $ar_product_unit_trans->lang = "ar";
                    $ar_product_unit_trans->name = $data['ar_name'];
                    $ar_product_unit_trans->code = $data['ar_code'];
                    $ar_product_unit_trans->shortName = $data['ar_short_name'];
                    $ar_product_unit_trans->isActive = $data['ar_isActive'];
                    $ar_product_unit_trans->save();
                }
            }

            return redirect('/admin/view-prod-units')->with('flash_message_success','Product Unit added successfully');
        }

        return view('admin.product-units.add-unit');

    }

    public function viewProductUnits(){
        $product_units = DB::table('product_units as pu')
        ->where(['put.isActive'=>1])
        ->join('product_unit_translates as put','put.product_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->get();

        return view('admin.product-units.view-units')->with(compact('product_units'));
    }

    public function viewENProductUnits(){
        $product_units = DB::table('product_units as pu')
        ->where(['put.isActive'=>1])
        ->join('product_unit_translates as put','put.product_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->where(['put.lang'=>'en'])
        ->get();

        return view('admin.product-units.view-units')->with(compact('product_units'));
    }

    public function viewARProductUnits(){
        $product_units = DB::table('product_units as pu')
        ->where(['put.isActive'=>1])
        ->join('product_unit_translates as put','put.product_unit_id', '=', 'pu.id')
        ->select('put.*')
        ->where(['put.lang'=>'ar'])
        ->get();

        return view('admin.product-units.view-units')->with(compact('product_units'));
    }

    public function editProductUnit(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            ProductUnitTranslate::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'code'=>$data['code'],
                'shortName'=>$data['short_name'],
                'isActive' => $data['isActive']
            ]);

            return redirect('/admin/view-prod-units')->with('flash_message_success','Product Unit has been Updated Successfully!');
        }

        $product_unit_trans = ProductUnitTranslate::where(['id'=>$id])->first();

        return view('admin.product-units.edit-unit')->with(compact('product_unit_trans'));
    }
    
    public function deleteProductUnit(Request $request, $id=null){

        $product_unit = ProductUnitTranslate::where(['id'=>$id])->first();
        $product_unit_id = $product_unit->product_unit_id;

        ProductUnitTranslate::where(['id'=>$id])->delete();

        $product_unit_trans = ProductUnitTranslate::where(['product_unit_id'=>$product_unit_id])->get();
        if($product_unit_trans->isEmpty()){
            ProductUnit::where(['id'=>$product_unit_id])->delete();
        }

        return redirect()->back()->with('flash_message_success','Product Unit Deleted successfully!');
    }
}
