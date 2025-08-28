<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Rider;

class OrderDetailsController extends Controller
{
    public function viewOrderDetail($id){

        $orders=Order::find($id);

        $orderdetails=DB::table('order_details as od')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->where('od.order_id','=',$id)
        ->where('p.lang','=','en')
        ->select('od.id','od.order_id','p.name','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight')
        ->get();

        $rider = Rider::get();

        return view('admin.orders_details.view_orders_details')->with(compact('orderdetails', 'orders', 'rider'));
    }

    public function deleteOrderDetail($id = null){

        OrderDetail::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Order Detail has been deleted Successfully!');

    }

    public function editOrderDetail(Request $request, $id =null)
    {

        if($request->isMethod('post')){
//            dd($request);
            $data = $request->all();

            OrderDetail::where(['id'=>$id])->update

            ([
                'order_id'=>$data['order_id'],
                'product_id'=>$data['product_id'],
                'unit_price'=>$data['unit_price'],
                'qty'=>$data['qty'],
                'unit_price'=>$data['unit_price'],
                'total_price'=>$data['total_price']
            ]);

            return redirect()->back()->with('flash_message_success','Order has been Updated Successfully!');
        }

        $orderdetails = OrderDetail::where(['id'=>$id])->first();
        $orderdetails->save();
        return view('admin.orders_details.edit_orders_details')->with(compact('orderdetails'));
    }
}
