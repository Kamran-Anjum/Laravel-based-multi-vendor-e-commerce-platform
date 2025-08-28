<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Notification;
use App\Notifications\NewMessage;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\Rider;

class OrderController extends Controller
{
    public function viewOrder(){

        $orders=DB::table('orders as o')
        ->where(['o.city_id'=>Session::get('RiderCity')])
        ->where(['o.deliverySchedualDate'=> date('Y-m-d 00:00:00')])
        ->where(['o.status_id'=>3])
        ->where(['o.rider_id'=>null])
        ->orwhere(['o.rider_id'=>Auth::user()->id])
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('city_areas as ca','o.area_id','=','ca.id')
        ->join('order_details as od','o.id','=','od.order_id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn',
            'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method', 'o.status_id', 'o.rider_id', 'o.latitude', 'o.longitude', 'o.streetAddress', 'o.buildingAddress')
        ->orderBy('o.id','desc')
        ->groupBy('od.order_id')
        ->get();

        $orderdetails=DB::table('order_details as od')
        ->where('p.lang','=','en')
        // ->where(['p.created_for'=>Auth::user()->id])
        ->join('orders as o','od.order_id','=','o.id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
        ->get();

        return view('rider.orders.view_orders')->with(compact('orders','orderdetails'));

    }

    public function viewOrderLocation($id){

        $orders=DB::table('orders as o')
        ->where(['o.id'=>$id])
        // ->where(['o.city_id'=>Session::get('RiderCity')])
        // ->where(['o.deliverySchedualDate'=> date('Y-m-d 00:00:00')])
        // ->where(['o.status_id'=>3])
        // ->where(['o.rider_id'=>null])
        // ->orwhere(['o.rider_id'=>Auth::user()->id])
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('city_areas as ca','o.area_id','=','ca.id')
        ->join('order_details as od','o.id','=','od.order_id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn',
            'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method', 'o.status_id', 'o.rider_id', 'o.latitude', 'o.longitude', 'o.streetAddress', 'o.buildingAddress')
        ->orderBy('o.id','desc')
        ->groupBy('od.order_id')
        ->get();

        $orderdetails=DB::table('order_details as od')
        ->where('p.lang','=','en')
        // ->where(['p.created_for'=>Auth::user()->id])
        ->join('orders as o','od.order_id','=','o.id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
        ->get();

        return view('rider.orders.view_order_location')->with(compact('orders','orderdetails'));

    }

    public function viewDeliveredOrder(){

        $orders=DB::table('orders as o')
        ->where(['o.city_id'=>Session::get('RiderCity')])
        ->where(['o.status_id'=>5])
        ->where(['o.rider_id'=>Auth::user()->id])
        ->join('status as s','o.status_id','=','s.id')
        ->join('countries as co','o.country_id','=','co.id')
        ->join('cities as c','o.city_id','=','c.id')
        ->join('city_areas as ca','o.area_id','=','ca.id')
        ->join('order_details as od','o.id','=','od.order_id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('c.name as c_name','co.name as co_name','o.billToAddress','o.shipToAddress','o.addedOn',
            'o.deliverdDate','s.name as s_name','o.total','o.id', 'o.firstName', 'o.lastName', 'o.email','o.contact','o.deliverySchedualDate','o.created_at', 'o.total_weight', 'o.total_amount', 'o.shippingFee', 'ca.name as area_name', 'o.payment_method', 'o.status_id', 'o.rider_id')
        ->orderBy('o.id','desc')
        ->groupBy('od.order_id')
        ->get();

        $orderdetails=DB::table('order_details as od')
        ->where('p.lang','=','en')
        // ->where(['p.created_for'=>Auth::user()->id])
        ->join('orders as o','od.order_id','=','o.id')
        ->join('product_translates as p','od.product_id','=','p.product_id')
        ->select('p.name as p_name','p.image','o.id as order_id','o.email','o.isPaid','od.id','od.qty','od.unit_price','od.total_price', 'od.unit_weight', 'od.total_weight', 'o.deliverdDate')
        ->get();

        return view('rider.orders.view_delivered_order')->with(compact('orders','orderdetails'));

    }

    public function acceptOrder($id =null)
    {

       // dd($data);
        Order::where(['id'=>$id])->update
        ([
            'status_id'=>4,
            'rider_id'=>Auth::user()->id,
        ]);
       	OrderDetail::where(['order_id'=>$id])->update
        ([
            'status'=>4,
        ]);

        return redirect()->back()->with('flash_message_success','Order Accepted Successfully!');

    }

    public function deliverOrder($id =null)
    {

       // dd($data);
        Order::where(['id'=>$id])->update
        ([
            'status_id'=>5,
            'rider_id'=>Auth::user()->id,
            'deliverdDate'=> date('Y-m-d'),
        ]);
       	OrderDetail::where(['order_id'=>$id])->update
        ([
            'status'=>5,
        ]);

        return redirect()->back()->with('flash_message_success','Order Delivered Successfully!');

    }

    public function cancelOrder($id =null)
    {

       // dd($data);
        Order::where(['id'=>$id])->update
        ([
            'status_id'=>3,
            'rider_id'=>null,
        ]);
       	OrderDetail::where(['order_id'=>$id])->update
        ([
            'status'=>3,
        ]);

        return redirect()->back()->with('flash_message_success','Order Canceled Successfully!');

    }

}
