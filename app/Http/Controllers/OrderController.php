<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function addOrder(Request $request ){

        if($request->isMethod('post')){
            $data = $request->all();
            $order = new Order();
            $order->total = $data['total'];
            $order->customer_id = $data['customer_id'];
            $order->city_id = $data['city_id'];
            $order->country_id = $data['country_id'];
            $order->addedOn= $data['addedOn'];
            $order->status = $data['status'];
            $order->deliverdDate = $data['deliverdDate'];
            $order->shipToAddress = $data['shipToAddress'];
            $order->billToAddress = $data['billToAddress'];
            $order->save();
            return redirect('/admin/view-order')->with('flash_message_success','Order Added Successfully!');
        }
        return view('admin.orders.add_orders');

    }

    public function viewOrder(){

        $orders = DB::table('orders as o')
                ->join('status as s','o.status_id','=','s.id')
                ->join('countries as co','o.country_id','=','co.id')
                ->join('cities as c','o.city_id','=','c.id')
                ->join('city_areas as ca','o.area_id','=','ca.id')
                ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn', 'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'o.vat_value', 'o.vat_amount', 'ca.name as area_name', 'o.payment_method')
                ->orderBy('o.id','desc')
                ->get();

        $orderdetails = DB::table('order_details as od')
                        ->where('p.lang','=','en')
                        ->join('orders as o','od.order_id','=','o.id')
                        ->join('product_translates as p','od.product_id','=','p.product_id')
                        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
                        ->get();

        return view('admin.orders.view_orders')->with(compact('orders','orderdetails'));
    }

    public function deleteOrder($id = null){

        Order::where(['id'=>$id])->delete();
        
        Order_Details::where(['order_id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Order has been deleted Successfully!');

    }

    public function editOrder(Request $request, $id =null)
    {

        if($request->isMethod('post')){

            $data = $request->all();
            
           if (!empty($data['o_status_id'])) {

                Order::where(['id'=>$id])->update
                ([
                    'status_id'=>$data['o_status_id'],
                ]);
               
           }
            
           if (!empty($data['o_p_status_id'])) {

                OrderDetail::where(['id'=>$data['order_detail_id']])->update
                ([
                    'status'=>$data['o_p_status_id'],
                ]);
               
           }


            return redirect()->back()->with('flash_message_success','Order has been Updated Successfully!');
        }

        $orderDetail = DB::table('order_details as od')->where(['o.id'=>$id])
                        ->join('orders as o','od.order_id','=','o.id')
                        ->join('status as s','o.status_id','=','s.id')
                        ->join('product_translates as p','od.product_id','=','p.id')
                        ->join('countries as co','o.country_id','=','co.id')
                        ->join('cities as c','o.city_id','=','c.id')
                        // ->join('customers as u','o.user_id','=','u.user_id')
                       ->select('od.unit_price','od.qty','od.total_price','o.email','o.shipToAddress','o.billToAddress','p.name as p_name','s.id as s_id','co.name as co_name','o.contact_no','c.name as c_name','o.firstName','o.lastName','o.contact','o.id','o.total','o.deliverySchedualDate','o.created_at', 'o.vat_value', 'o.vat_amount')
                        ->first();
             // dd($orderDetail);

        $orderDetails = DB::table('order_details as od')->where(['o.id'=>$id])
                        ->where('p.lang','=','en')
                        ->join('orders as o','od.order_id','=','o.id')
                        ->join('status as s','o.status_id','=','s.id')
                        ->join('product_translates as p','od.product_id','=','p.product_id')
                        ->select('od.unit_price','od.qty','od.total_price', 'od.id as o_d_id', 'od.status', 'p.name as p_name','s.id as s_id','o.id','p.image')
                        ->get();

        $status = DB::table('status')->where(['deleted_at'=>NULL])->get();

        $status = DB::table('status')->where(['deleted_at'=>NULL])->get();

        return view('admin.orders.edit_orders')->with(compact('orderDetail','orderDetails','status'));

    }

}
