<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
use App\Models\ProductCity;
use App\Models\ProductTranslate;
use App\Models\ProductDetail;
use App\Models\MetaTag;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class ProductController extends Controller
{
    public function viewProducts(){

        $products = DB::table('product_translates')->orderBy('id','desc')->get();

        $categories = DB::table('category_translates')->get();
        $brands = DB::table('brand_translates')->get();
        $product_units = DB::table('product_unit_translates')->get();
        $price_units = DB::table('price_unit_translates')->get();

        return view('admin.products.view-products')->with(compact('products','categories','brands','product_units','price_units'));
    }

    public function viewEnProducts(){

        $products = DB::table('product_translates')->where(['lang'=>'en'])->orderBy('id','desc')->get();

        $categories = DB::table('category_translates')->get();
        $brands = DB::table('brand_translates')->get();
        $product_units = DB::table('product_unit_translates')->get();
        $price_units = DB::table('price_unit_translates')->get();

        return view('admin.products.view-products')->with(compact('products','categories','brands','product_units','price_units'));
    }

    public function viewArProducts(){

        $products = DB::table('product_translates')->where(['lang'=>'ar'])->orderBy('id','desc')->get();

        $categories = DB::table('category_translates')->get();
        $brands = DB::table('brand_translates')->get();
        $product_units = DB::table('product_unit_translates')->get();
        $price_units = DB::table('price_unit_translates')->get();

        return view('admin.products.view-products')->with(compact('products','categories','brands','product_units','price_units'));
    }

    public function addProduct(Request $request){

    	if($request->isMethod('post')){

    		$data = $request->all();

            $flag = false;

            $product = new Product();
            $product->save();
            $product_id = $product->id;

            if($product){

                $count = (int)$data['countrowdata'];
                for($i=1; $i <= $count ; $i++){
                    if(isset($data['countryid_'.$i])){
                        $find_id = DB::table('product_cities')
                        ->where(['product_id'=>$product_id])
                        ->where(['country_id'=>$data['countryid_'.$i]])
                        ->where(['city_id'=>$data['cityid_'.$i]])
                        ->get();

                        if($find_id->isEmpty()){
                            $product_cities = new ProductCity();
                            $product_cities->product_id = $product_id;
                            $product_cities->country_id = $data['countryid_'.$i];
                            $product_cities->city_id = $data['cityid_'.$i];
                            $product_cities->created_by = Auth::user()->id;
                            $product_cities->save();

                            $flag = true;
                        }
                    }
                }

                if($flag == true){
                    if($data['lang_dropdown'] == "en"){
                        if(isset($data['en_chkIsHotDeal'])){
                            $en_ishotdeal = '1';
                        }
                        else{
                            $en_ishotdeal = '0';
                        }
                        if(isset($data['en_chkIsTopOffer'])){
                            $en_istopoffer = '1';
                        }
                        else{
                            $en_istopoffer = '0';
                        }
                        if(isset($data['en_chkIsFeatured'])){
                            $en_isfeatured = '1';
                        }
                        else{
                            $en_isfeatured = '0';
                        }

                        $en_product_trans = new ProductTranslate();
                        $en_product_trans->product_id = $product_id;
                        $en_product_trans->lang = 'en';
                        // $en_product_trans->country_id = $data['en_country_id'];
                        // $en_product_trans->city_id = $data['en_city_id'];
                        $en_product_trans->category_id = $data['en_category_id'];
                        $en_product_trans->brand_id = $data['en_brand_id'];
                        $en_product_trans->product_unit_id = $data['en_productunit_id'];
                        $en_product_trans->name = $data['en_name'];
                        $en_product_trans->code = $data['en_code'];
                        $en_product_trans->price_unit_id = $data['en_priceunit_id'];
                        $en_product_trans->price = $data['en_price'];
                        $en_product_trans->saleprice = $data['en_saleprice'];
                        $en_product_trans->discount = $data['en_discount'];
                        $en_product_trans->quantity = $data['en_quantity'];
                        $en_product_trans->color = $data['en_color'];
                        $en_product_trans->height = $data['en_height'];
                        $en_product_trans->width = $data['en_width'];
                        $en_product_trans->weight = $data['en_weight'];
                        $en_product_trans->isHotDeal = $en_ishotdeal;
                        $en_product_trans->isTopOffer = $en_istopoffer;
                        $en_product_trans->isFeatured = $en_isfeatured;
                        $en_product_trans->created_for = $data['created_for'];
                        $en_product_trans->created_by = Auth::user()->id;
                        $en_product_trans->description = $data['en_description'];
                        $en_product_trans->long_description = $data['en_long_description'];
                        $en_product_trans->isActive = $data['en_isActive'];

                		if($request->hasFile('en_image')){
                			$image_tmp = $request->en_image;
                			if($image_tmp->isValid()){
                				// create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                				$filename = 'product'.rand(111,99999).'.'.$extension;
                				$large_image_path = 'images/backend_images/products/en/large/'.$filename;
                				$medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                				$small_image_path = 'images/backend_images/products/en/small/'.$filename;
                				$tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                				$image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                				$en_product_trans->image = $filename;
                			}

                		}
                		$en_product_trans->save();

                        $meta_tags = new MetaTag();
                        $meta_tags->table_name = 'products';
                        $meta_tags->table_id = $product_id;
                        $meta_tags->title = $data['en_name'];
                        $meta_tags->keywords = $data['keywords'];
                        $meta_tags->description = $data['meta_description'];
                        $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_name']));
                        $meta_tags->save();

                        if($request->hasFile('en_galeryimage1')){
                            $image_tmp = $request->en_galeryimage1;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        
                        if($request->hasFile('en_galeryimage2')){
                            $image_tmp = $request->en_galeryimage2;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        if($request->hasFile('en_galeryimage3')){
                            $image_tmp = $request->en_galeryimage3;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        if($request->hasFile('en_galeryimage4')){
                            $image_tmp = $request->en_galeryimage4;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }
                        }
                    }
                    else
                    if($data['lang_dropdown'] == "ar"){
                        if(isset($data['ar_chkIsHotDeal'])){
                            $ar_ishotdeal = '1';
                        }
                        else{
                            $ar_ishotdeal = '0';
                        }
                        if(isset($data['ar_chkIsTopOffer'])){
                            $ar_istopoffer = '1';
                        }
                        else{
                            $ar_istopoffer = '0';
                        }
                        if(isset($data['ar_chkIsFeatured'])){
                            $ar_isfeatured = '1';
                        }
                        else{
                            $ar_isfeatured = '0';
                        }

                        $ar_product_trans = new ProductTranslate();
                        $ar_product_trans->product_id = $product_id;
                        $ar_product_trans->lang = 'ar';
                        // $ar_product_trans->country_id = $data['ar_country_id'];
                        // $ar_product_trans->city_id = $data['ar_city_id'];
                        $ar_product_trans->category_id = $data['ar_category_id'];
                        $ar_product_trans->brand_id = $data['ar_brand_id'];
                        $ar_product_trans->product_unit_id = $data['ar_productunit_id'];
                        $ar_product_trans->name = $data['ar_name'];
                        $ar_product_trans->code = $data['ar_code'];
                        $ar_product_trans->price_unit_id = $data['ar_priceunit_id'];
                        $ar_product_trans->price = $data['ar_price'];
                        $ar_product_trans->saleprice = $data['ar_saleprice'];
                        $ar_product_trans->discount = $data['ar_discount'];
                        $ar_product_trans->quantity = $data['ar_quantity'];
                        $ar_product_trans->color = $data['ar_color'];
                        $ar_product_trans->height = $data['ar_height'];
                        $ar_product_trans->width = $data['ar_width'];
                        $ar_product_trans->weight = $data['ar_weight'];
                        $ar_product_trans->isHotDeal = $ar_ishotdeal;
                        $ar_product_trans->isTopOffer = $ar_istopoffer;
                        $ar_product_trans->isFeatured = $ar_isfeatured;
                        $ar_product_trans->created_for = $data['created_for'];
                        $ar_product_trans->created_by = Auth::user()->id;
                        $ar_product_trans->description = $data['ar_description'];
                        $ar_product_trans->long_description = $data['ar_long_description'];
                        $ar_product_trans->isActive = $data['ar_isActive'];

                        if($request->hasFile('ar_image')){
                            $image_tmp = $request->ar_image;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                $ar_product_trans->image = $filename;
                            }

                        }
                        $ar_product_trans->save();

                        $meta_tags = new MetaTag();
                        $meta_tags->table_name = 'products';
                        $meta_tags->table_id = $product_id;
                        $meta_tags->title = $data['ar_name'];
                        $meta_tags->keywords = $data['keywords'];
                        $meta_tags->description = $data['meta_description'];
                        $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['ar_name']));
                        $meta_tags->save();

                        if($request->hasFile('ar_galeryimage1')){
                            $image_tmp = $request->ar_galeryimage1;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        
                        if($request->hasFile('ar_galeryimage2')){
                            $image_tmp = $request->ar_galeryimage2;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        if($request->hasFile('ar_galeryimage3')){
                            $image_tmp = $request->ar_galeryimage3;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        if($request->hasFile('ar_galeryimage4')){
                            $image_tmp = $request->ar_galeryimage4;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }
                        }
                    }else{
                        if(isset($data['en_chkIsHotDeal'])){
                            $en_ishotdeal = '1';
                        }
                        else{
                            $en_ishotdeal = '0';
                        }
                        if(isset($data['en_chkIsTopOffer'])){
                            $en_istopoffer = '1';
                        }
                        else{
                            $en_istopoffer = '0';
                        }
                        if(isset($data['en_chkIsFeatured'])){
                            $en_isfeatured = '1';
                        }
                        else{
                            $en_isfeatured = '0';
                        }

                        $en_product_trans = new ProductTranslate();
                        $en_product_trans->product_id = $product_id;
                        $en_product_trans->lang = 'en';
                        // $en_product_trans->country_id = $data['en_country_id'];
                        // $en_product_trans->city_id = $data['en_city_id'];
                        $en_product_trans->category_id = $data['en_category_id'];
                        $en_product_trans->brand_id = $data['en_brand_id'];
                        $en_product_trans->product_unit_id = $data['en_productunit_id'];
                        $en_product_trans->name = $data['en_name'];
                        $en_product_trans->code = $data['en_code'];
                        $en_product_trans->price_unit_id = $data['en_priceunit_id'];
                        $en_product_trans->price = $data['en_price'];
                        $en_product_trans->saleprice = $data['en_saleprice'];
                        $en_product_trans->discount = $data['en_discount'];
                        $en_product_trans->quantity = $data['en_quantity'];
                        $en_product_trans->color = $data['en_color'];
                        $en_product_trans->height = $data['en_height'];
                        $en_product_trans->width = $data['en_width'];
                        $en_product_trans->weight = $data['en_weight'];
                        $en_product_trans->isHotDeal = $en_ishotdeal;
                        $en_product_trans->isTopOffer = $en_istopoffer;
                        $en_product_trans->isFeatured = $en_isfeatured;
                        $en_product_trans->created_for = $data['created_for'];
                        $en_product_trans->created_by = Auth::user()->id;
                        $en_product_trans->description = $data['en_description'];
                        $en_product_trans->long_description = $data['en_long_description'];
                        $en_product_trans->isActive = $data['en_isActive'];

                        if($request->hasFile('en_image')){
                            $image_tmp = $request->en_image;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                $en_product_trans->image = $filename;
                            }

                        }
                        $en_product_trans->save();

                        $meta_tags = new MetaTag();
                        $meta_tags->table_name = 'products';
                        $meta_tags->table_id = $product_id;
                        $meta_tags->title = $data['en_name'];
                        $meta_tags->keywords = $data['keywords'];
                        $meta_tags->description = $data['meta_description'];
                        $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_name']));
                        $meta_tags->save();

                        if($request->hasFile('en_galeryimage1')){
                            $image_tmp = $request->en_galeryimage1;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        
                        if($request->hasFile('en_galeryimage2')){
                            $image_tmp = $request->en_galeryimage2;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        if($request->hasFile('en_galeryimage3')){
                            $image_tmp = $request->en_galeryimage3;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }

                        }
                        if($request->hasFile('en_galeryimage4')){
                            $image_tmp = $request->en_galeryimage4;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $en_productdetail = new ProductDetail();
                                $en_productdetail->product_id = $product_id;
                                $en_productdetail->lang = 'en';
                                $en_productdetail->image = $filename;
                                $en_productdetail->save();
                            }
                        }

                        if(isset($data['ar_chkIsHotDeal'])){
                            $ar_ishotdeal = '1';
                        }
                        else{
                            $ar_ishotdeal = '0';
                        }
                        if(isset($data['ar_chkIsTopOffer'])){
                            $ar_istopoffer = '1';
                        }
                        else{
                            $ar_istopoffer = '0';
                        }
                        if(isset($data['ar_chkIsFeatured'])){
                            $ar_isfeatured = '1';
                        }
                        else{
                            $ar_isfeatured = '0';
                        }

                        $ar_product_trans = new ProductTranslate();
                        $ar_product_trans->product_id = $product_id;
                        $ar_product_trans->lang = 'ar';
                        // $ar_product_trans->country_id = $data['ar_country_id'];
                        // $ar_product_trans->city_id = $data['ar_city_id'];
                        $ar_product_trans->category_id = $data['ar_category_id'];
                        $ar_product_trans->brand_id = $data['ar_brand_id'];
                        $ar_product_trans->product_unit_id = $data['ar_productunit_id'];
                        $ar_product_trans->name = $data['ar_name'];
                        $ar_product_trans->code = $data['ar_code'];
                        $ar_product_trans->price_unit_id = $data['ar_priceunit_id'];
                        $ar_product_trans->price = $data['ar_price'];
                        $ar_product_trans->saleprice = $data['ar_saleprice'];
                        $ar_product_trans->discount = $data['ar_discount'];
                        $ar_product_trans->quantity = $data['ar_quantity'];
                        $ar_product_trans->color = $data['ar_color'];
                        $ar_product_trans->height = $data['ar_height'];
                        $ar_product_trans->width = $data['ar_width'];
                        $ar_product_trans->weight = $data['ar_weight'];
                        $ar_product_trans->isHotDeal = $ar_ishotdeal;
                        $ar_product_trans->isTopOffer = $ar_istopoffer;
                        $ar_product_trans->isFeatured = $ar_isfeatured;
                        $ar_product_trans->created_for = $data['created_for'];
                        $ar_product_trans->created_by = Auth::user()->id;
                        $ar_product_trans->description = $data['ar_description'];
                        $ar_product_trans->long_description = $data['ar_long_description'];
                        $ar_product_trans->isActive = $data['ar_isActive'];

                        if($request->hasFile('ar_image')){
                            $image_tmp = $request->ar_image;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                $ar_product_trans->image = $filename;
                            }

                        }
                        $ar_product_trans->save();

                        if($request->hasFile('ar_galeryimage1')){
                            $image_tmp = $request->ar_galeryimage1;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        
                        if($request->hasFile('ar_galeryimage2')){
                            $image_tmp = $request->ar_galeryimage2;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        if($request->hasFile('ar_galeryimage3')){
                            $image_tmp = $request->ar_galeryimage3;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }

                        }
                        if($request->hasFile('ar_galeryimage4')){
                            $image_tmp = $request->ar_galeryimage4;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'product'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                                $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                                $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                                $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $image->resize(600,600)->save($medium_image_path);
                                $image->resize(300,300)->save($small_image_path);
                                $image->resize(100,100)->save($tiny_image_path);
                                
                                $ar_productdetail = new ProductDetail();
                                $ar_productdetail->product_id = $product_id;
                                $ar_productdetail->lang = 'ar';
                                $ar_productdetail->image = $filename;
                                $ar_productdetail->save();
                            }
                        }
                    }
                }
            }

    		return redirect('/admin/view-products')->with('flash_message_success','Product Added Successfully!');
    	}

        // Country dropdown
        $countries = DB::table('countries')
        ->where(['isActive'=> 1])
        ->where(['isDeleted'=> 0])
        ->get();

        $countries_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->id."'>".$cont->name . "</option>";
        }

        // Categories dropdown
        $en_categories = DB::table('category_translates')->where(['parent_id'=>0])->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_categories_dropdown = "";
        $en_categories_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($en_categories as $en_category){
            $en_categories_dropdown.="<option value='".$en_category->category_id."'>".$en_category->name."</option>";
            $en_sub_categories = DB::table('category_translates')->where(['parent_id'=>$en_category->category_id])->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
            foreach($en_sub_categories as $en_sub_category){
                $en_categories_dropdown.="<option value='".$en_sub_category->category_id."'>&nbsp;--&nbsp;".$en_sub_category->name."</option>";
            }
        }
	    
        $ar_categories = DB::table('category_translates')->where(['parent_id'=>0])->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_categories_dropdown = "";
        $ar_categories_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($ar_categories as $ar_category){
            $ar_categories_dropdown.="<option value='".$ar_category->category_id."'>".$ar_category->name."</option>";
            $ar_sub_categories = DB::table('category_translates')->where(['parent_id'=>$ar_category->category_id])->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
            foreach($ar_sub_categories as $ar_sub_category){
                $ar_categories_dropdown.="<option value='".$ar_sub_category->category_id."'>&nbsp;--&nbsp;".$ar_sub_category->name."</option>";
            }
        }

        // Brand dropdown
        $en_brands = DB::table('brand_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_brand_dropdown = "";
        $en_brand_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($en_brands as $en_brand){
            $en_brand_dropdown.="<option value='".$en_brand->brand_id."'>".$en_brand->name."</option>";
        }

        $ar_brands = DB::table('brand_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_brand_dropdown = "";
        $ar_brand_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($ar_brands as $ar_brand){
            $ar_brand_dropdown.="<option value='".$ar_brand->brand_id."'>".$ar_brand->name."</option>";
        }

        // Product Unit dropdown
        $en_productunits = DB::table('product_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_productunit_dropdown = "";
        $en_productunit_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($en_productunits as $en_unit){
            $en_productunit_dropdown.="<option value='".$en_unit->product_unit_id."'>".$en_unit->name." (".$en_unit->code.")</option>";
        }

        $ar_productunits = DB::table('product_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_productunit_dropdown = "";
        $ar_productunit_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($ar_productunits as $ar_unit){
            $ar_productunit_dropdown.="<option value='".$ar_unit->product_unit_id."'>".$ar_unit->name." (".$ar_unit->code.")</option>";
        }

        // Price Unit dropdown
        $en_priceunits = DB::table('price_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_priceunit_dropdown = "";
        $en_priceunit_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($en_priceunits as $en_priceunit){
            $en_priceunit_dropdown.="<option value='".$en_priceunit->price_unit_id."'>".$en_priceunit->name." (".$en_priceunit->code.")</option>";
        }

        $ar_priceunits = DB::table('price_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_priceunit_dropdown = "";
        $ar_priceunit_dropdown.="<option value='0' disabled selected>Select</option>";
        foreach($ar_priceunits as $ar_priceunit){
            $ar_priceunit_dropdown.="<option value='".$ar_priceunit->price_unit_id."'>".$ar_priceunit->name." (".$ar_priceunit->code.")</option>";
        }

        $vendors = DB::table('vendors as v')
                    ->join('users as u', 'v.user_id', '=', 'u.id')
                    ->select('v.user_id', 'v.store_name', 'u.name')
                    ->get();
                    // dd($vendors);
        $vendor_dropdown = "";
        $vendor_dropdown.="<option value='". Auth::user()->id ."' selected=''>For You</option>";
        foreach($vendors as $vendor){
            $vendor_dropdown.="<option value='".$vendor->user_id."'>".$vendor->name." (".$vendor->store_name.")</option>";
        }

    	return view('admin.products.add-product')->with(compact('countries_dropdown','en_categories_dropdown','ar_categories_dropdown','en_brand_dropdown','ar_brand_dropdown','en_productunit_dropdown','ar_productunit_dropdown','en_priceunit_dropdown','ar_priceunit_dropdown', 'vendor_dropdown'));
    }
    
    public function editProduct(Request $request, $id =null){

        if($request->isMethod('post')){

            $data = $request->all();

            $productt = ProductTranslate::where(['id'=>$id])->first();
            $product_id = $productt->product_id;
            $language = $productt->lang;

            if($request->hasFile('image')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){


                        // image file delete start
                        $prod_image = ProductTranslate::where(['id'=>$id])->first();
                        $p_image = $prod_image->image;

                        $large_image_path = 'images/backend_images/products/en/large/'.$p_image;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$p_image;
                        $small_image_path = 'images/backend_images/products/en/small/'.$p_image;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$p_image;

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
                        $filename = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/en/large/'.$filename;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$filename;
                        $small_image_path = 'images/backend_images/products/en/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename;
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


                        // image file delete start
                        $prod_image = ProductTranslate::where(['id'=>$id])->first();
                        $p_image = $prod_image->image;

                        $large_image_path = 'images/backend_images/products/ar/large/'.$p_image;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$p_image;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$p_image;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$p_image;

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
                        $filename = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/ar/large/'.$filename;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename;
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
                    $filename ='';
                }
            }


            if(isset($data['chkIsHotDeal'])){
                $ishotdeal = '1';
            }
            else{
                $ishotdeal = '0';
            }
            if(isset($data['chkIsTopOffer'])){
                $istopoffer = '1';
            }
            else{
                $istopoffer = '0';
            }
            if(isset($data['chkIsFeatured'])){
                $isfeatured = '1';
            }
            else{
                $isfeatured = '0';
            }

            ProductTranslate::where(['id'=>$id])->update([
                // 'country_id'=>$data['country_id'],
                // 'city_id'=>$data['city_id'],
                'category_id'=>$data['category_id'],
                'brand_id'=>$data['brand_id'],
                'name'=>$data['name'],
                'code'=>$data['code'],
                'price'=>$data['price'],
                'saleprice'=>$data['saleprice'],
                'discount'=>$data['discount'],
                'color'=>$data['color'],
                'height'=>$data['height'],
                'width'=>$data['width'],
                'weight'=>$data['weight'],
                'description'=>$data['description'],
                'long_description'=>$data['long_description'],
                'image'=>$filename,
                'isHotDeal'=>$ishotdeal,
                'isTopOffer'=>$istopoffer,
                'isFeatured'=>$isfeatured,
                'product_unit_id'=>$data['productunit_id'],
                'quantity'=>$data['quantity'],
                'price_unit_id'=>$data['priceunit_id'],
                'isActive'=>$data['isActive']
            ]);

            if (!empty($data['keywords'])) {
                $meta_tags = new MetaTag();
                $meta_tags->table_name = 'products';
                $meta_tags->table_id = $id;
                $meta_tags->title = $data['name'];
                $meta_tags->keywords = $data['keywords'];
                $meta_tags->description = $data['meta_description'];
                $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['name']));
                $meta_tags->save();
            } 

            $filename1 ='';
            $filename2 ='';
            $filename3 ='';
            $filename4 ='';

            if($request->hasFile('galeryimage1')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->galeryimage1;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id1'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id1']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/en/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/en/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/en/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/en/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename1 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/en/large/'.$filename1;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$filename1;
                        $small_image_path = 'images/backend_images/products/en/small/'.$filename1;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename1;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->galeryimage1;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id1'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id1']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/ar/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/ar/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/ar/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/ar/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename1 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/ar/large/'.$filename1;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename1;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$filename1;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename1;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
            }
            else{
                if(!empty($data['current_image1'])){
                    $filename1 = $data['current_image1'];
                }
                if( empty($filename1)){
                    $filename1 ='';
                }
            }
            
            if(!empty($data['current_id1'])){
                ProductDetail::where(['id'=>$data['current_id1']])->update(['image'=>$filename1]);
            }elseif($filename1!=''){
                $productdetail = new ProductDetail();
                $productdetail->product_id = $product_id;
                $productdetail->lang = $language;
                $productdetail->image = $filename1;
                $productdetail->save();
            }

            if($request->hasFile('galeryimage2')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->galeryimage2;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id2'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id2']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/en/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/en/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/en/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/en/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename2 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/en/large/'.$filename2;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$filename2;
                        $small_image_path = 'images/backend_images/products/en/small/'.$filename2;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename2;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->galeryimage2;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id2'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id2']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/ar/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/ar/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/ar/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/ar/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename2 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/ar/large/'.$filename2;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename2;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$filename2;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename2;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
            }
            else{
                if(!empty($data['current_image2'])){
                    $filename2 = $data['current_image2'];
                }
                if( empty($filename2)){
                    $filename2 ='';
                }
            }
            
            if(!empty($data['current_id2'])){
                ProductDetail::where(['id'=>$data['current_id2']])->update(['image'=>$filename2]);
            }elseif($filename2!=''){
                $productdetail = new ProductDetail();
                $productdetail->product_id = $product_id;
                $productdetail->lang = $language;
                $productdetail->image = $filename2;
                $productdetail->save();
            }

            if($request->hasFile('galeryimage3')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->galeryimage3;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id3'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id3']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/en/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/en/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/en/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/en/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename3 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/en/large/'.$filename3;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$filename3;
                        $small_image_path = 'images/backend_images/products/en/small/'.$filename3;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename3;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->galeryimage3;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id3'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id3']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/ar/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/ar/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/ar/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/ar/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename3 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/ar/large/'.$filename3;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename3;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$filename3;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename3;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
            }
            else{
                if(!empty($data['current_image3'])){
                    $filename3 = $data['current_image3'];
                }
                if( empty($filename3)){
                    $filename3 ='';
                }
            }
            
            if(!empty($data['current_id3'])){
                ProductDetail::where(['id'=>$data['current_id3']])->update(['image'=>$filename3]);
            }elseif($filename3!=''){
                $productdetail = new ProductDetail();
                $productdetail->product_id = $product_id;
                $productdetail->lang = $language;
                $productdetail->image = $filename3;
                $productdetail->save();
            }

            if($request->hasFile('galeryimage4')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->galeryimage4;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id4'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id4']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/en/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/en/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/en/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/en/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename4 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/en/large/'.$filename4;
                        $medium_image_path = 'images/backend_images/products/en/medium/'.$filename4;
                        $small_image_path = 'images/backend_images/products/en/small/'.$filename4;
                        $tiny_image_path = 'images/backend_images/products/en/tiny/'.$filename4;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->galeryimage4;
                    if($image_tmp->isValid()){
                        // image file delete start
                        if(isset($data['current_id4'])){
                            $prodd_image = ProductDetail::where(['id'=>$data['current_id4']])->first();

                            if($prodd_image){
                                $ptt_image = $prodd_image->image;

                                $ptt_large_image_path = 'images/backend_images/products/ar/large/'.$ptt_image;
                                $ptt_medium_image_path = 'images/backend_images/products/ar/medium/'.$ptt_image;
                                $ptt_small_image_path = 'images/backend_images/products/ar/small/'.$ptt_image;
                                $ptt_tiny_image_path = 'images/backend_images/products/ar/tiny/'.$ptt_image;

                                if(File::exists($ptt_large_image_path)){
                                    File::delete($ptt_large_image_path);
                                }
                                if(file_exists($ptt_medium_image_path)){
                                    File::delete($ptt_medium_image_path);
                                }
                                if(file_exists($ptt_small_image_path)){
                                    File::delete($ptt_small_image_path);
                                }
                                if(file_exists($ptt_tiny_image_path)){
                                    File::delete($ptt_tiny_image_path);
                                }
                            }
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename4 = 'product'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/ar/large/'.$filename4;
                        $medium_image_path = 'images/backend_images/products/ar/medium/'.$filename4;
                        $small_image_path = 'images/backend_images/products/ar/small/'.$filename4;
                        $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$filename4;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);
                    }
                }
            }
            else{
                if(!empty($data['current_image4'])){
                    $filename4 = $data['current_image4'];
                }
                if( empty($filename4)){
                    $filename4 ='';
                }
            }
            
            if(!empty($data['current_id4'])){
                ProductDetail::where(['id'=>$data['current_id4']])->update(['image'=>$filename]);
            }elseif($filename4!=''){
                $productdetail = new ProductDetail();
                $productdetail->product_id = $product_id;
                $productdetail->lang = $language;
                $productdetail->image = $filename4;
                $productdetail->save();
            }

            return redirect('/admin/view-products')->with('flash_message_success','Product has been Updated Successfully!');
        }

        $product_trans = ProductTranslate::where(['id'=>$id])->first();
        $product_id = $product_trans->product_id;
        $en_product_details = ProductDetail::where(['product_id'=>$product_id])->where(['lang'=>'en'])->get();
        $ar_product_details = ProductDetail::where(['product_id'=>$product_id])->where(['lang'=>'ar'])->get();

        // Categories dropdown
        $en_categories = DB::table('category_translates')->where(['parent_id'=>0])->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_categories_dropdown = "";
        foreach($en_categories as $en_category){
            if($en_category->category_id==$product_trans->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $en_categories_dropdown.="<option value='".$en_category->category_id."' ".$selected.">".$en_category->name."</option>";
            $en_sub_categories = DB::table('category_translates')->where(['parent_id'=>$en_category->category_id])->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
            foreach($en_sub_categories as $en_sub_category){
                if($en_sub_category->category_id==$product_trans->category_id){
                    $selected1 = "selected";
                }else{
                    $selected1 = "";
                }
                $en_categories_dropdown.="<option value='".$en_sub_category->category_id."' ".$selected1.">&nbsp;--&nbsp;".$en_sub_category->name."</option>";
            }
        }
        
        $ar_categories = DB::table('category_translates')->where(['parent_id'=>0])->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_categories_dropdown = "";
        foreach($ar_categories as $ar_category){
            if($ar_category->category_id==$product_trans->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $ar_categories_dropdown.="<option value='".$ar_category->category_id."' ".$selected.">".$ar_category->name."</option>";
            $ar_sub_categories = DB::table('category_translates')->where(['parent_id'=>$ar_category->category_id])->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
            foreach($ar_sub_categories as $ar_sub_category){
                if($ar_sub_category->category_id==$product_trans->category_id){
                    $selected1 = "selected";
                }else{
                    $selected1 = "";
                }
                $ar_categories_dropdown.="<option value='".$ar_sub_category->category_id."' ".$selected1.">&nbsp;--&nbsp;".$ar_sub_category->name."</option>";
            }
        }

        // Brand dropdown
        $en_brands = DB::table('brand_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_brand_dropdown = "";
        foreach($en_brands as $en_brand){
            if($en_brand->brand_id==$product_trans->brand_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $en_brand_dropdown.="<option value='".$en_brand->brand_id."' ".$selected.">".$en_brand->name."</option>";
        }

        $ar_brands = DB::table('brand_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_brand_dropdown = "";
        foreach($ar_brands as $ar_brand){
            if($ar_brand->brand_id==$product_trans->brand_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $ar_brand_dropdown.="<option value='".$ar_brand->brand_id."' ".$selected.">".$ar_brand->name."</option>";
        }

        // Product Unit dropdown
        $en_productunits = DB::table('product_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_productunit_dropdown = "";
        foreach($en_productunits as $en_unit){
            if($en_unit->product_unit_id==$product_trans->product_unit_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $en_productunit_dropdown.="<option value='".$en_unit->product_unit_id."' ".$selected.">".$en_unit->name." (".$en_unit->code.")</option>";
        }

        $ar_productunits = DB::table('product_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_productunit_dropdown = "";
        foreach($ar_productunits as $ar_unit){
            if($ar_unit->product_unit_id==$product_trans->product_unit_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $ar_productunit_dropdown.="<option value='".$ar_unit->product_unit_id."' ".$selected.">".$ar_unit->name." (".$ar_unit->code.")</option>";
        }

        // Price Unit dropdown
        $en_price_units = DB::table('price_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'en'])->get();
        $en_priceunit_dropdown = "";
        foreach($en_price_units as $en_price_unit){
            if($en_price_unit->price_unit_id==$product_trans->price_unit_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $en_priceunit_dropdown.="<option value='".$en_price_unit->price_unit_id."' ".$selected.">".$en_price_unit->name." (".$en_price_unit->code.")</option>";
        }

        $ar_price_units = DB::table('price_unit_translates')->where(['isActive' =>'1'])->where(['lang'=>'ar'])->get();
        $ar_priceunit_dropdown = "";
        foreach($ar_price_units as $ar_price_unit){
            if($ar_price_unit->price_unit_id==$product_trans->price_unit_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $ar_priceunit_dropdown.="<option value='".$ar_price_unit->price_unit_id."' ".$selected.">".$ar_price_unit->name." (".$ar_price_unit->code.")</option>";
        }

        $meta_tag_counter = DB::table('meta_tags')->where(['table_name'=>'products', 'table_id'=>$product_trans->product_id])->count();

        return view('admin.products.edit-product')->with(compact('product_trans','en_product_details','ar_product_details','en_categories_dropdown','ar_categories_dropdown','en_brand_dropdown','ar_brand_dropdown','en_productunit_dropdown','ar_productunit_dropdown','en_priceunit_dropdown','ar_priceunit_dropdown', 'meta_tag_counter'));
    }
    
    public function deleteProductImage($id = null){
        // image file delete start
        $producttrans_image = ProductTranslate::where(['id'=>$id])->first();
        $p_image = $producttrans_image->image;
        $product_lang = $producttrans_image->lang;

        if($product_lang == 'en'){
            $large_image_path = 'images/backend_images/products/en/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/en/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/en/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/en/tiny/'.$p_image;

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
        if($product_lang == 'ar'){
            $large_image_path = 'images/backend_images/products/ar/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/ar/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/ar/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$p_image;

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

        ProductTranslate::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Product image has been Deleted Successfully!');
    }

    public function deleteProductGalleryImage($id =null){
        // image file delete start
        $producttrans_image = ProductDetail::where(['id'=>$id])->first();
        $p_image = $producttrans_image->image;
        $product_lang = $producttrans_image->lang;

        if($product_lang == 'en'){
            $large_image_path = 'images/backend_images/products/en/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/en/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/en/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/en/tiny/'.$p_image;

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
        if($product_lang == 'ar'){
            $large_image_path = 'images/backend_images/products/ar/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/ar/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/ar/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$p_image;

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

        ProductDetail::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product gallery image has been Deleted Successfully!');
    }

    public function deleteProducts($id = null){
        // image file delete start
        $producttrans_image = ProductTranslate::where(['id'=>$id])->first();
        $p_image = $producttrans_image->image;
        $product_id = $producttrans_image->product_id;
        $product_lang = $producttrans_image->lang;

        if($product_lang == 'en'){
            $large_image_path = 'images/backend_images/products/en/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/en/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/en/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/en/tiny/'.$p_image;

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
        if($product_lang == 'ar'){
            $large_image_path = 'images/backend_images/products/ar/large/'.$p_image;
            $medium_image_path = 'images/backend_images/products/ar/medium/'.$p_image;
            $small_image_path = 'images/backend_images/products/ar/small/'.$p_image;
            $tiny_image_path = 'images/backend_images/products/ar/tiny/'.$p_image;

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

        $productdet_image = ProductDetail::where(['product_id'=>$product_id])->where(['lang'=>$product_lang])->get();
        foreach($productdet_image as $productdet_img){
            $productdet_lang = $productdet_img->lang;
            $pd_image = $productdet_img->image;

            if($productdet_lang == 'en'){
                $pd_large_image_path = 'images/backend_images/products/en/large/'.$pd_image;
                $pd_medium_image_path = 'images/backend_images/products/en/medium/'.$pd_image;
                $pd_small_image_path = 'images/backend_images/products/en/small/'.$pd_image;
                $pd_tiny_image_path = 'images/backend_images/products/en/tiny/'.$pd_image;

                if(File::exists($pd_large_image_path)){
                    File::delete($pd_large_image_path);
                }
                if(file_exists($pd_medium_image_path)){
                    File::delete($pd_medium_image_path);
                }
                if(file_exists($pd_small_image_path)){
                    File::delete($pd_small_image_path);
                }
                if(file_exists($pd_tiny_image_path)){
                    File::delete($pd_tiny_image_path);
                }
            }
            else
            if($productdet_lang == 'ar'){
                $pd_large_image_path = 'images/backend_images/products/ar/large/'.$pd_image;
                $pd_medium_image_path = 'images/backend_images/products/ar/medium/'.$pd_image;
                $pd_small_image_path = 'images/backend_images/products/ar/small/'.$pd_image;
                $pd_tiny_image_path = 'images/backend_images/products/ar/tiny/'.$pd_image;

                if(File::exists($pd_large_image_path)){
                    File::delete($pd_large_image_path);
                }
                if(file_exists($pd_medium_image_path)){
                    File::delete($pd_medium_image_path);
                }
                if(file_exists($pd_small_image_path)){
                    File::delete($pd_small_image_path);
                }
                if(file_exists($pd_tiny_image_path)){
                    File::delete($pd_tiny_image_path);
                }
            }
        }

        ProductTranslate::where(['id'=>$id])->delete();

        $product_trans = ProductTranslate::where(['product_id'=>$product_id])->get();
        if($product_trans->isEmpty()){
            Product::where(['id'=>$product_id])->delete();
        }

        return redirect()->back()->with('flash_message_success','Product has been deleted Successfully!');
    }

    public function getProductCountryName()
    {
        $countries = DB::table('countries')->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $countries;
    }

    public function getProductCityName($id)
    {
        $cities = DB::table('cities')->where(['country_id'=>$id])->where(['isActive'=> 1])->where(['isDeleted'=> 0])->get();
        return $cities;
    }

//     /* Hamza Search 06-05-2019 */
//     public function search_index()
//     {
//         $countries = DB::table('countries')->get();
//         $cites = DB::table('cities')->get();
//         return view('admin.products.search')->with(compact('countries'));

//     }

//     public function cityname(Request $request)
//     {
//         $data = DB::table('cities')->where('country_id', '=', $request->id)
//             ->select('name', 'id')
//             ->get();
//         return response()->json($data);
//     }

//     public function productname(Request $request)
//     {
//         // $data = $request->search.'-'.$request->id;
// // print_r($data);


//         $data=DB::table('products as p')
//             ->where('p.name','like',"%{$request->search}%")
//             ->where('v.city_id','=',$request->id)
// //            ->orWhere('p.name','like',"%{$request->search}%")
// //            ->orWhere('pc.name','like',"%$request->search%")
//             ->join('vendors as v','p.vendor_id','=','v.id')
//             ->join('categories as pc','p.category_id','=','pc.id')
//             ->select('p.description','p.name','p.price','p.code','p.color','pc.name as pc_name','p.category_id')
//             ->get();
//         echo ($data);
//         die;
//         print_r($data);
//         die;
//         return response()->json($data);
//     }

   //  public function productname(Request $request)
   // {
   //     $data = $request->search.'-'.$request->id;



   //     $data=DB::table('products as p')
   //         ->where('p.name','like',"%{$request->search}%")
   //         ->where('v.city_id','=',$request->id)
   //         ->join('vendors as v','p.vendor_id','=','v.id')
   //         ->join('categories as pc','p.category_id','=','pc.id')
   //         ->join('product_details as pd', function ($join) {
   //             $join->on('p.id', '=', 'pd.product_id');})
   //         ->select('p.description','p.name','p.price','p.code','p.color','pc.name as pc_name','p.category_id','pd.image')
   //         ->get();



   //     echo ($data);
   //     die;
   //     print_r($data);
   //     die;
   //     return response()->json($data);
   // }
    /* Hamza Search 06-05-2019 */
}
