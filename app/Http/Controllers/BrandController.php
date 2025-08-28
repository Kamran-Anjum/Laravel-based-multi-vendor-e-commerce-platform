<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Brand;
use App\Models\BrandTranslate;
use App\Models\MetaTag;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class BrandController extends Controller
{
    public function addBrand(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $brand = new Brand();
            $brand->save();
            $brand_id = $brand->id;

            if($brand){

                if($data['lang_dropdown'] == "en"){

                    $en_brand_trans = new BrandTranslate();
                    $en_brand_trans->brand_id = $brand_id;
                    $en_brand_trans->lang = "en";
                    $en_brand_trans->name = $data['en_name'];
                    $en_brand_trans->short_name = $data['en_short_name'];
                    $en_brand_trans->description = $data['en_description'];

                    if($request->hasFile('en_image')){
                        $image_tmp = $request->en_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'brand'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/brands/en/large/'.$filename;
                            $medium_image_path = 'images/backend_images/brands/en/medium/'.$filename;
                            $small_image_path = 'images/backend_images/brands/en/small/'.$filename;
                            $tiny_image_path = 'images/backend_images/brands/en/tiny/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $image->resize(600,600)->save($medium_image_path);
                            $image->resize(300,300)->save($small_image_path);
                            $image->resize(100,100)->save($tiny_image_path);
                            $en_brand_trans->image = $filename;
                        }
                    }

                    $en_brand_trans->isActive = $data['en_isActive'];
                    $en_brand_trans->save();

                    $meta_tags = new MetaTag();
                    $meta_tags->table_name = 'brands';
                    $meta_tags->table_id = $brand_id;
                    $meta_tags->title = $data['en_name'];
                    $meta_tags->keywords = $data['keywords'];
                    $meta_tags->description = $data['meta_description'];
                    $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_name']));
                    $meta_tags->save();

                }else if($data['lang_dropdown'] == "ar"){

                    $ar_brand_trans = new BrandTranslate();
                    $ar_brand_trans->brand_id = $brand_id;
                    $ar_brand_trans->lang = "ar";
                    $ar_brand_trans->name = $data['ar_name'];
                    $ar_brand_trans->short_name = $data['ar_short_name'];
                    $ar_brand_trans->description = $data['ar_description'];

                    if($request->hasFile('ar_image')){
                        $image_tmp = $request->ar_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'brand'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/brands/ar/large/'.$filename;
                            $medium_image_path = 'images/backend_images/brands/ar/medium/'.$filename;
                            $small_image_path = 'images/backend_images/brands/ar/small/'.$filename;
                            $tiny_image_path = 'images/backend_images/brands/ar/tiny/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $image->resize(600,600)->save($medium_image_path);
                            $image->resize(300,300)->save($small_image_path);
                            $image->resize(100,100)->save($tiny_image_path);
                            $ar_brand_trans->image = $filename;
                        }
                    }

                    $ar_brand_trans->isActive = $data['ar_isActive'];
                    $ar_brand_trans->save();

                    $meta_tags = new MetaTag();
                    $meta_tags->table_name = 'brands';
                    $meta_tags->table_id = $brand_id;
                    $meta_tags->title = $data['ar_name'];
                    $meta_tags->keywords = $data['keywords'];
                    $meta_tags->description = $data['meta_description'];
                    $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['ar_name']));
                    $meta_tags->save();

                }else{

                    $en_brand_trans = new BrandTranslate();
                    $en_brand_trans->brand_id = $brand_id;
                    $en_brand_trans->lang = "en";
                    $en_brand_trans->name = $data['en_name'];
                    $en_brand_trans->short_name = $data['en_short_name'];
                    $en_brand_trans->description = $data['en_description'];

                    if($request->hasFile('en_image')){
                        $image_tmp = $request->en_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'brand'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/brands/en/large/'.$filename;
                            $medium_image_path = 'images/backend_images/brands/en/medium/'.$filename;
                            $small_image_path = 'images/backend_images/brands/en/small/'.$filename;
                            $tiny_image_path = 'images/backend_images/brands/en/tiny/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $image->resize(600,600)->save($medium_image_path);
                            $image->resize(300,300)->save($small_image_path);
                            $image->resize(100,100)->save($tiny_image_path);
                            $en_brand_trans->image = $filename;
                        }
                    }

                    $en_brand_trans->isActive = $data['en_isActive'];
                    $en_brand_trans->save();


                    $ar_brand_trans = new BrandTranslate();
                    $ar_brand_trans->brand_id = $brand_id;
                    $ar_brand_trans->lang = "ar";
                    $ar_brand_trans->name = $data['ar_name'];
                    $ar_brand_trans->short_name = $data['ar_short_name'];
                    $ar_brand_trans->description = $data['ar_description'];

                    if($request->hasFile('ar_image')){
                        $image_tmp = $request->ar_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'brand'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/brands/ar/large/'.$filename;
                            $medium_image_path = 'images/backend_images/brands/ar/medium/'.$filename;
                            $small_image_path = 'images/backend_images/brands/ar/small/'.$filename;
                            $tiny_image_path = 'images/backend_images/brands/ar/tiny/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $image->resize(600,600)->save($medium_image_path);
                            $image->resize(300,300)->save($small_image_path);
                            $image->resize(100,100)->save($tiny_image_path);
                            $ar_brand_trans->image = $filename;
                        }
                    }

                    $ar_brand_trans->isActive = $data['ar_isActive'];
                    $ar_brand_trans->save();

                    $meta_tags = new MetaTag();
                    $meta_tags->table_name = 'brands';
                    $meta_tags->table_id = $brand_id;
                    $meta_tags->title = $data['en_name'];
                    $meta_tags->keywords = $data['keywords'];
                    $meta_tags->description = $data['meta_description'];
                    $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_name']));
                    $meta_tags->save();

                }
            }

            return redirect('/admin/view-brands')->with('flash_message_success','Brand added successfully');
        }

        return view('admin.brands.add_brand');

    }

    public function viewBrands(){
        $brands = DB::table('brands as b')
        ->join('brand_translates as bt','bt.brand_id', '=', 'b.id')
        ->select('bt.*')
        ->get();

        return view('admin.brands.view_brand')->with(compact('brands'));
    }

    public function viewENBrands(){
        $brands = DB::table('brands as b')
        ->join('brand_translates as bt','bt.brand_id', '=', 'b.id')
        ->select('bt.*')
        ->where(['bt.lang'=>'en'])
        ->get();

        return view('admin.brands.view_brand')->with(compact('brands'));
    }

    public function viewARBrands(){
        $brands = DB::table('brands as b')
        ->join('brand_translates as bt','bt.brand_id', '=', 'b.id')
        ->select('bt.*')
        ->where(['bt.lang'=>'ar'])
        ->get();

        return view('admin.brands.view_brand')->with(compact('brands'));
    }

    public function editBrand(Request $request, $id=null){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){

                        $brandtrans_image = BrandTranslate::where(['id'=>$id])->first();
                        $p_image = $brandtrans_image->image;

                        $large_image_path = 'images/backend_images/brands/en/large/'.$p_image;
                        $medium_image_path = 'images/backend_images/brands/en/medium/'.$p_image;
                        $small_image_path = 'images/backend_images/brands/en/small/'.$p_image;
                        $tiny_image_path = 'images/backend_images/brands/en/tiny/'.$p_image;

                        if(File::exists($large_image_path)){
                            File::delete($large_image_path);
                        }
                        if(file_exists($medium_image_path)){
                            File::delete($medium_image_path);
                        }
                        if(file_exists($small_image_path)){
                            File::delete($small_image_path);
                        }
                        if(file_exists($tiny_image_path)){
                            File::delete($tiny_image_path);
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = 'brand'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/brands/en/large/'.$filename;
                        $medium_image_path = 'images/backend_images/brands/en/medium/'.$filename;
                        $small_image_path = 'images/backend_images/brands/en/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/brands/en/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){

                        $brandtrans_image = BrandTranslate::where(['id'=>$id])->first();
                        $p_image = $brandtrans_image->image;

                        $large_image_path = 'images/backend_images/brands/ar/large/'.$p_image;
                        $medium_image_path = 'images/backend_images/brands/ar/medium/'.$p_image;
                        $small_image_path = 'images/backend_images/brands/ar/small/'.$p_image;
                        $tiny_image_path = 'images/backend_images/brands/ar/tiny/'.$p_image;

                        if(File::exists($large_image_path)){
                            File::delete($large_image_path);
                        }
                        if(file_exists($medium_image_path)){
                            File::delete($medium_image_path);
                        }
                        if(file_exists($small_image_path)){
                            File::delete($small_image_path);
                        }
                        if(file_exists($tiny_image_path)){
                            File::delete($tiny_image_path);
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = 'brand'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/brands/ar/large/'.$filename;
                        $medium_image_path = 'images/backend_images/brands/ar/medium/'.$filename;
                        $small_image_path = 'images/backend_images/brands/ar/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/brands/ar/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
            }else{
                $filename = $data['current_image'];
                if(empty($filename)){
                    $filename = "";
                }
            }

            BrandTranslate::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'description'=>$data['description'],
                'short_name'=>$data['short_name'],
                'image' => $filename,
                'isActive' => $data['isActive']
            ]);

            if (!empty($data['keywords'])) {
                $meta_tags = new MetaTag();
                $meta_tags->table_name = 'brands';
                $meta_tags->table_id = $id;
                $meta_tags->title = $data['name'];
                $meta_tags->keywords = $data['keywords'];
                $meta_tags->description = $data['meta_description'];
                $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['name']));
                $meta_tags->save();
            } 

            return redirect('/admin/view-brands')->with('flash_message_success','Brand has been Updated Successfully!');
        }

        $brand_trans = BrandTranslate::where(['id'=>$id])->first();

        $meta_tag_counter = DB::table('meta_tags')->where(['table_name'=>'brands', 'table_id'=>$brand_trans->brand_id])->count();

        return view('admin.brands.edit_brand')->with(compact('brand_trans', 'meta_tag_counter'));
    }
    public function deleteBrand(Request $request, $id=null){
        // image file delete start
        $brandtrans_image = BrandTranslate::where(['id'=>$id])->first();
        $p_image = $brandtrans_image->image;
        $brand_id = $brandtrans_image->brand_id;
        $brand_lang = $brandtrans_image->lang;

        if($brand_lang == 'en'){
            $large_image_path = 'images/backend_images/brands/en/large/'.$p_image;
            $medium_image_path = 'images/backend_images/brands/en/medium/'.$p_image;
            $small_image_path = 'images/backend_images/brands/en/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/brands/en/tiny/'.$p_image;

            if(File::exists($large_image_path)){
                File::delete($large_image_path);
            }
            if(file_exists($medium_image_path)){
                File::delete($medium_image_path);
            }
            if(file_exists($small_image_path)){
                File::delete($small_image_path);
            }
            if(file_exists($tiny_image_path)){
                File::delete($tiny_image_path);
            }
        }
        else
        if($brand_lang == 'ar'){
            $large_image_path = 'images/backend_images/brands/ar/large/'.$p_image;
            $medium_image_path = 'images/backend_images/brands/ar/medium/'.$p_image;
            $small_image_path = 'images/backend_images/brands/ar/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/brands/ar/tiny/'.$p_image;

            if(File::exists($large_image_path)){
                File::delete($large_image_path);
            }
            if(file_exists($medium_image_path)){
                File::delete($medium_image_path);
            }
            if(file_exists($small_image_path)){
                File::delete($small_image_path);
            }
            if(file_exists($tiny_image_path)){
                File::delete($tiny_image_path);
            }
        }

        BrandTranslate::where(['id'=>$id])->delete();

        $brand_trans = BrandTranslate::where(['brand_id'=>$brand_id])->get();
        if($brand_trans->isEmpty()){
            Brand::where(['id'=>$brand_id])->delete();
        }

        return redirect()->back()->with('flash_message_success','Brand Deleted successfully!');
    }
}
