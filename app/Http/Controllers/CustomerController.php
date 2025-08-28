<?php

namespace App\Http\Controllers;
use App\Order;
use App\Order_Details;
use App\Product;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function viewCustomer ()
    {
    	$customers = DB::table('customers as c')
        ->where('c.deleted_at','=',null)
        ->join('users as u','c.user_id','=','u.id')
        ->join('countries as co','c.country_id','=','co.id')
        ->join('states as st','c.state_id','=','st.id')
        ->join('cities as ci','c.city_id','=','ci.id')
        ->select('u.name as username','c.firstname as firstname','c.lastname as lastname','u.email', 'c.isActive as status', 'c.id', 'co.name as country','st.name as state', 'ci.name as city','c.Address1', 'c.billToAddress','c.shipToAddress')
        ->get();
        return view('admin.customers.view_customers')->with(compact('customers'));
    }

    public function editCustomer(Request $request, $id =null)
    {
        if($request->isMethod('post')){
        	$data = $request->all();
        	if(isset($data['chkIsActive'])){
            	Customer::where(['id'=>$id])->update(['isActive'=>'1']);
        	}else{
	            Customer::where(['id'=>$id])->update(['isActive'=>'0']);
       		}
            return redirect()->back()->with('flash_message_success','Customer has been Updated Successfully!');
        }	
        
        $customers = DB::table('customers as c')
        ->where('c.deleted_at','=',null)
        ->where('c.id','=',$id)
        ->join('users as u','c.user_id','=','u.id')
        ->join('countries as co','c.country_id','=','co.id')
        ->join('states as st','c.state_id','=','st.id')
        ->join('cities as ci','c.city_id','=','ci.id')
        ->select('u.name as username','c.firstname as firstname','c.lastname as lastname','u.email', 'c.isActive as status', 'c.id', 'co.name as country','st.name as state', 'ci.name as city','c.Address1', 'c.billToAddress','c.shipToAddress')
        ->first();
        return view('admin.customers.edit_customers')->with(compact('customers'));
    }

    public function deleteCustomer($id = null){
    	    Customer::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Customer has been deleted Successfully!');
    }
}
