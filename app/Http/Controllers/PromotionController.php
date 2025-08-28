<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;
use App\Models\ProductTranslate;
use App\Models\CategoryTranslate;

class PromotionController extends Controller
{
    public function viewPromotion()
    {
        $cur_date = date('Y-m-d');

        // $promotions = DB::table('promotions')->orderBy('id', 'desc')->get();
        $promotions = DB::table('promotions')
                    ->leftJoin('product_translates', 'promotions.id', '=', 'product_translates.promotion_id') // Assuming 'promotion_id' is the foreign key
                    ->select('promotions.*', DB::raw('COUNT(product_translates.id) as product_count'))
                    ->groupBy('promotions.id')
                    ->orderBy('promotions.id', 'desc')
                    ->get();
        // dd($promotions);

        foreach ($promotions as $promo) {
            if ($cur_date > $promo->to_date) {
                Promotion::where(['id'=>$promo->id])->update
                ([
                    'isActive'=>0,
                ]);

                ProductTranslate::where(['promotion_id'=>$promo->id])->update
                ([
                    'promotion_id'=>0,
                ]);

                CategoryTranslate::where(['promotion_id'=>$promo->id])->update
                ([
                    'promotion_id'=>0,
                ]);
            }
        }

        return view('admin.promotion.view_promotion')->with(compact('promotions'));
    }

    public function viewProductForPromotion($id, $category_id)
    {
        $cur_date = date('Y-m-d');

        $promotion = DB::table('promotions')->where(['id'=>$id])->first();

        if ($category_id > 0) {
            $products = DB::table('product_translates')->where(['category_id'=>$category_id])->orderBy('id','desc')->get();
            $category_select = DB::table('category_translates')->where(['category_id'=>$category_id])->first();
        } else {
            $products = DB::table('product_translates')->orderBy('id','desc')->get();
            $category_select = DB::table('category_translates')->get();
        }
        

        $categories = DB::table('category_translates')->get();
        $brands = DB::table('brand_translates')->get();

        return view('admin.promotion.assign_promotion')->with(compact('promotion', 'products', 'category_select', 'categories', 'brands', 'category_id'));
    }

    public function assignPromotionToAllProducts($id)
    {
        ProductTranslate::where('promotion_id' ,'>=', '0')->update
        ([
            'promotion_id'=>$id,
        ]);

        CategoryTranslate::where('promotion_id' ,'>=', '0')->update
        ([
            'promotion_id'=>$id,
        ]);

        return redirect()->back()->with('flash_message_success','Assign Promotion To All Products Successfully!');
    }

    public function unassignPromotionToAllProducts($id)
    {
        ProductTranslate::where(['promotion_id'=>$id])->update
        ([
            'promotion_id'=>0,
        ]);

        CategoryTranslate::where(['promotion_id'=>$id])->update
        ([
            'promotion_id'=>0,
        ]);

        return redirect()->back()->with('flash_message_success','Un-Assign Promotion To All Products Successfully!');
    }

    public function assignPromotionToProduct($product_id, $promotion_id)
    {
        ProductTranslate::where(['id' => $product_id])->update
        ([
            'promotion_id'=>$promotion_id,
        ]);

        return redirect()->back()->with('flash_message_success','Assign Promotion To Product Successfully!');
    }

    public function unassignPromotionToProduct($product_id, $promotion_id)
    {
        ProductTranslate::where(['id' => $product_id, 'promotion_id' => $promotion_id])->update
        ([
            'promotion_id'=>0,
        ]);

        return redirect()->back()->with('flash_message_success','Un-Assign Promotion To Product Successfully!');
    }

    public function assignPromotionToAllCategoryProducts($category_id, $promotion_id)
    {
        ProductTranslate::where(['category_id' => $category_id])->update
        ([
            'promotion_id'=>$promotion_id,
        ]);

        CategoryTranslate::where(['category_id' => $category_id])->update
        ([
            'promotion_id'=>$promotion_id,
        ]);

        return redirect()->back()->with('flash_message_success','Assign Promotion To Category Product Successfully!');
    }

    public function unassignPromotionToAllCategoryProducts($category_id, $promotion_id)
    {
        ProductTranslate::where(['category_id' => $category_id, 'promotion_id' => $promotion_id])->update
        ([
            'promotion_id'=>0,
        ]);

        CategoryTranslate::where(['category_id' => $category_id, 'promotion_id' => $promotion_id])->update
        ([
            'promotion_id'=>0,
        ]);

        return redirect()->back()->with('flash_message_success','Un-Assign Promotion Category To Product Successfully!');
    }

    public function addPromotion(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $promotions = new Promotion();
            $promotions->name = $data['name'];
            $promotions->amount = $data['amount'];
            $promotions->type = $data['type'];
            $promotions->from_date = $data['from_date'];
            $promotions->to_date = $data['to_date'];
            $promotions->save();

            return redirect('/admin/view-promotions')->with('flash_message_success','Promotion Added Successfully!');
            
        }

        return view('admin.promotion.add_promotion');

    }

    public function editPromotion(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            Promotion::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'amount'=>$data['amount'],
                'type'=>$data['type'],
                'from_date'=>$data['from_date'],
                'to_date'=>$data['to_date'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-promotions')->with('flash_message_success','Promotion Updated Successfully!');
        }

        $promotion = Promotion::where(['id'=>$id])->first();

        return view('admin.promotion.edit_promotion')->with(compact('promotion'));

    }

    public function deletePromotion($id = null)
    {

        ProductTranslate::where(['promotion_id'=>$id])->update
        ([
            'promotion_id'=>0,
        ]);

        CategoryTranslate::where(['promotion_id'=>$id])->update
        ([
            'promotion_id'=>0,
        ]);

        Promotion::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Promotion Deleted Successfully!');

    }
}
