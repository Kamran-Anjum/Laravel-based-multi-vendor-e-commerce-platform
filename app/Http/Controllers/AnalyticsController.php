<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\CartAction;
use App\Models\PageVisit;

class AnalyticsController extends Controller
{
    public function viewAnalytics()
    {
        $overall_web_pages = DB::table('page_visits')
                            ->select('page', DB::raw('COUNT(*) as visit_count'), DB::raw('MAX(date_time) as last_visit_time'))
                            ->groupBy('page')
                            ->get();

        $product_visits = DB::table('page_visits as pv')
                            ->join('product_translates as p', 'pv.product_id', '=', 'p.product_id')
                            ->where(['pv.page' => 'Product Detail', 'p.lang'=>'en'])
                            ->groupBy('pv.product_id', 'p.name')
                            ->select(
                                'pv.product_id',
                                'p.name as productName',
                                DB::raw('COUNT(*) as visit_count'),
                                DB::raw('MAX(pv.date_time) as last_visit_time')
                            )
                            ->get();

        $product_cart_add = DB::table('cart_actions as ca')
                            ->join('product_translates as p','ca.product_id','=','p.product_id')
                            ->where(['ca.action_type' => 'Add', 'p.lang'=>'en'])
                            ->groupBy('ca.product_id', 'p.name')
                            ->select(
                                'ca.product_id',
                                'p.name as productName',
                                DB::raw('COUNT(*) as action_count'),
                                DB::raw('MAX(ca.action_time) as last_action_time')
                            )
                            ->get();

        $product_cart_delete = DB::table('cart_actions as ca')
                                ->join('product_translates as p','ca.product_id','=','p.product_id')
                                ->where(['ca.action_type' => 'Delete', 'p.lang'=>'en'])
                                ->groupBy('ca.product_id', 'p.name')
                                ->select(
                                    'ca.product_id',
                                    'p.name as productName',
                                    DB::raw('COUNT(*) as action_count'),
                                    DB::raw('MAX(ca.action_time) as last_action_time')
                                )
                                ->get();

        $product_cart_order = DB::table('cart_actions as ca')
                                ->join('product_translates as p','ca.product_id','=','p.product_id')
                                ->where(['ca.action_type' => 'Order', 'p.lang'=>'en'])
                                ->groupBy('ca.product_id', 'p.name')
                                ->select(
                                    'ca.product_id',
                                    'p.name as productName',
                                    DB::raw('COUNT(*) as action_count'),
                                    DB::raw('MAX(ca.action_time) as last_action_time')
                                )
                                ->get();

        return view('admin.analytics.view_analytics')->with(compact('overall_web_pages', 'product_visits', 'product_cart_add', 'product_cart_delete', 'product_cart_order'));
    }
}
