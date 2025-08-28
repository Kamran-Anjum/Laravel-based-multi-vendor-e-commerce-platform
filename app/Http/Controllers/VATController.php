<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\VAT;

class VATController extends Controller
{
    public function editVAT(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            VAT::where(['id'=>1])->update
            ([
                'vat'=>$data['vat'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect()->back()->with('flash_message_success','VAT Updated Successfully!');
        }

        $vat =VAT::where(['id'=>1])->first();

        return view('admin.vat.edit_vat')->with(compact('vat'));

    }

}
