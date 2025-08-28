<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use App\Notification;
use App\Notifications\NewMessage;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

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
//            dd($order);
            $order->save();
            /*return redirect()->back()->with('flash_message_success','Product Added Successfully!');*/
            return redirect('/vendor/view-order')->with('flash_message_success','Order Added Successfully!');
        }
        return view('vendor.orders.add_orders');

    }

    public function viewOrder(){

        $orders=DB::table('orders as o')
        ->where(['o.city_id'=>session()->get('VendorActiveCity')])
        ->where(['p.created_for'=>Auth::user()->id, 'p.lang'=>'en'])
        // ->join('users as u','o.user_id','=','u.id')
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('city_areas as ca','o.area_id','=','ca.id')
        ->join('order_details as od','o.id','=','od.order_id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn',
            'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method')
        ->orderBy('o.id','desc')
        ->groupBy('od.order_id')
        ->get();

        $orderdetails=DB::table('order_details as od')
        ->where('p.lang','=','en')
        ->where(['p.created_for'=>Auth::user()->id])
        ->join('orders as o','od.order_id','=','o.id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
        ->get();



        return view('vendor.orders.view_orders')->with(compact('orders','orderdetails'));
    }

    public function deleteOrder($id = null){

        Order::where(['id'=>$id])->delete();
        Order_Details::where(['order_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Order has been deleted Successfully!');
//        return view('vendor.orders.add_orders');
    }

    public function editOrder(Request $request, $id =null)
    {

        if($request->isMethod('post')){

           $data = $request->all();
           // dd($data);
            // Order::where(['id'=>$id])->update
            // ([
            //     'status_id'=>$data['status_id'],
            // ]);
           OrderDetail::where(['id'=>$data['order_detail_id']])->update
            ([
                'status'=>$data['status_id'],
            ]);

            return redirect()->back()->with('flash_message_success','Order has been Updated Successfully!');

        }

        $orderDetail=DB::table('order_Details as od')->where(['o.id'=>$id])
            ->join('orders as o','od.order_id','=','o.id')
            ->join('status as s','o.status_id','=','s.id')
            ->join('product_translates as p','od.product_id','=','p.id')
            ->join('countries as co','o.country_id','=','co.id')
            ->join('cities as c','o.city_id','=','c.id')
            // ->join('customers as u','o.user_id','=','u.user_id')
           ->select('od.unit_price','od.qty','od.total_price','o.email','o.shipToAddress','o.billToAddress',
               'p.name as p_name','s.id as s_id','co.name as co_name','o.contact_no','c.name as c_name','o.firstName','o.lastName','o.contact','o.id','o.total','o.deliverySchedualDate','o.created_at')
            ->first();

        $orderDetails=DB::table('order_Details as od')->where(['o.id'=>$id])
            ->where('p.lang','=','en')
            ->where(['p.created_for'=>Auth::user()->id])
            ->join('orders as o','od.order_id','=','o.id')
            ->join('status as s','o.status_id','=','s.id')
            ->join('product_translates as p','od.product_id','=','p.product_id')
             ->select('od.unit_price','od.qty','od.total_price', 'od.id as o_d_id', 'od.status', 'p.name as p_name','s.id as s_id','o.id','p.image')
            ->get();

        $status = DB::table('status')->where(['deleted_at'=>NULL])->get();

           // dd($orderDetail, $id);
//            $orderDetails = Order::where(['id'=>$id])->first();
//            $orderDetails->save();
            $status = DB::table('status')->where(['deleted_at'=>NULL])->get();
        return view('vendor.orders.edit_orders')->with(compact('orderDetail','orderDetails','status'));
    }
}
