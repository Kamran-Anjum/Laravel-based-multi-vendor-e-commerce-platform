<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Category;
use App\Models\CategoryTranslate;
use App\Models\MetaTag;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Session;
use File;

class CategoryController extends Controller
{
    public function addCategory(Request $request){

    	if($request->isMethod('post')){
            
    		$data = $request->all();

            $category = new Category();
            $category->save();
            $category_id = $category->id;

            if($category){
                if($data['lang_dropdown'] == "en"){

            		$en_category_trans = new CategoryTranslate();
                    $en_category_trans->category_id = $category_id;
                    $en_category_trans->lang = "en";
            		$en_category_trans->name = $data['en_category_name'];
            		$en_category_trans->parent_id = $data['en_parent_id'];
            		$en_category_trans->description = $data['en_description'];

                    if($request->hasFile('en_image')){
                        $image_tmp = $request->en_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'category'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/category/en/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $en_category_trans->image = $filename;
                        }
                    }

                    $en_category_trans->isActive = $data['en_isActive'];
            		$en_category_trans->save();

                    $meta_tags = new MetaTag();
                    $meta_tags->table_name = 'categories';
                    $meta_tags->table_id = $category_id;
                    $meta_tags->title = $data['en_category_name'];
                    $meta_tags->keywords = $data['keywords'];
                    $meta_tags->description = $data['meta_description'];
                    $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_category_name']));
                    $meta_tags->save();

                } else if($data['lang_dropdown'] == "ar"){

                    $ar_category_trans = new CategoryTranslate();
                    $ar_category_trans->category_id = $category_id;
                    $ar_category_trans->lang = "ar";
                    $ar_category_trans->name = $data['ar_category_name'];
                    $ar_category_trans->parent_id = $data['ar_parent_id'];
                    $ar_category_trans->description = $data['ar_description'];

                    if($request->hasFile('ar_image')){
                        $image_tmp = $request->ar_image;
                        if($image_tmp->isValid()){
                            // create image manager with desired driver
                            $manager = new ImageManager(new Driver());
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = 'category'.rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/category/ar/'.$filename;
                            $image = $manager->read($image_tmp);
                            $image->save($large_image_path);
                            $ar_category_trans->image = $filename;
                        }
                    }

                    $ar_category_trans->isActive = $data['ar_isActive'];
                    $ar_category_trans->save();

                    $meta_tags = new MetaTag();
                    $meta_tags->table_name = 'categories';
                    $meta_tags->table_id = $category_id;
                    $meta_tags->title = $data['ar_category_name'];
                    $meta_tags->keywords = $data['keywords'];
                    $meta_tags->description = $data['meta_description'];
                    $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['ar_category_name']));
                    $meta_tags->save();

                }else{

                    if ($data['en_parent_id'] == $data['ar_parent_id']) {

                        $en_category_trans = new CategoryTranslate();
                        $en_category_trans->category_id = $category_id;
                        $en_category_trans->lang = "en";
                        $en_category_trans->name = $data['en_category_name'];
                        $en_category_trans->parent_id = $data['en_parent_id'];
                        $en_category_trans->description = $data['en_description'];

                        if($request->hasFile('en_image')){
                            $image_tmp = $request->en_image;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'category'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/category/en/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $en_category_trans->image = $filename;
                            }
                        }

                        $en_category_trans->isActive = $data['en_isActive'];
                        $en_category_trans->save();

                        $ar_category_trans = new CategoryTranslate();
                        $ar_category_trans->category_id = $category_id;
                        $ar_category_trans->lang = "ar";
                        $ar_category_trans->name = $data['ar_category_name'];
                        $ar_category_trans->parent_id = $data['ar_parent_id'];
                        $ar_category_trans->description = $data['ar_description'];

                        if($request->hasFile('ar_image')){
                            $image_tmp = $request->ar_image;
                            if($image_tmp->isValid()){
                                // create image manager with desired driver
                                $manager = new ImageManager(new Driver());
                                $extension = $image_tmp->getClientOriginalExtension();
                                $filename = 'category'.rand(111,99999).'.'.$extension;
                                $large_image_path = 'images/backend_images/category/ar/'.$filename;
                                $image = $manager->read($image_tmp);
                                $image->save($large_image_path);
                                $en_category_trans->image = $filename;
                            }
                        }

                        $ar_category_trans->isActive = $data['ar_isActive'];
                        $ar_category_trans->save();

                        $meta_tags = new MetaTag();
                        $meta_tags->table_name = 'categories';
                        $meta_tags->table_id = $category_id;
                        $meta_tags->title = $data['en_category_name'];
                        $meta_tags->keywords = $data['keywords'];
                        $meta_tags->description = $data['meta_description'];
                        $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['en_category_name']));
                        $meta_tags->save();
                        
                    } else {

                        return redirect()->back()->with('flash_message_error','Both Languages Main Category Miss Match..!');
                        
                    }
                }
            }

    		return redirect('/admin/view-categories')->with('flash_message_success','Category added successfully');
    	}

    	$en_levels = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'en'])->get();
        $ar_levels = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'ar'])->get();

    	return view('admin.categories.add-category')->with(compact('en_levels','ar_levels'));

    }

    public function viewCategories(){

        $categories = CategoryTranslate::get();

    	$parentCategories = CategoryTranslate::where(['parent_id'=>0])->get();

    	return view('admin.categories.view-categories')->with(compact('categories','parentCategories'));
    }

    public function viewENCategories(){

        $categories = CategoryTranslate::where(['lang'=>'en'])->get();

        $parentCategories = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'en'])->get();

        return view('admin.categories.view-categories')->with(compact('categories','parentCategories'));
    }

    public function viewARCategories(){

        $categories = CategoryTranslate::where(['lang'=>'ar'])->get();

        $parentCategories = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'ar'])->get();

        return view('admin.categories.view-categories')->with(compact('categories','parentCategories'));
    }

    public function editCategory(Request $request, $id=null){

    	if($request->isMethod('post')){

    		$data = $request->all();

            if($request->hasFile('image')){
                if($data['lang'] == 'en'){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){

                        $brandtrans_image = CategoryTranslate::where(['id'=>$id])->first();
                        $p_image = $brandtrans_image->image;

                        $large_image_path = 'images/backend_images/category/en/'.$p_image;

                        if(File::exists($large_image_path)){
                            File::delete($large_image_path);
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = 'category'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/category/en/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                    }
                }
                else
                if($data['lang'] == 'ar'){
                    $image_tmp = $request->image;
                    if($image_tmp->isValid()){

                        $brandtrans_image = CategoryTranslate::where(['id'=>$id])->first();
                        $p_image = $brandtrans_image->image;

                        $large_image_path = 'images/backend_images/category/ar/'.$p_image;

                        if(File::exists($large_image_path)){
                            File::delete($large_image_path);
                        }

                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = 'category'.rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/category/ar/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                    }
                }
            }else{
                $filename = $data['current_image'];
                if(empty($filename)){
                    $filename = "";
                }
            }
    		
    		CategoryTranslate::where(['id'=>$id])->update([
                'name'=>$data['category_name'],
                'parent_id'=>$data['parent_id'],
                'description'=>$data['description'],
                'image' => $filename,
                'isActive' => $data['isActive']
            ]);

            if (!empty($data['keywords'])) {
                $meta_tags = new MetaTag();
                $meta_tags->table_name = 'categories';
                $meta_tags->table_id = $id;
                $meta_tags->title = $data['category_name'];
                $meta_tags->keywords = $data['keywords'];
                $meta_tags->description = $data['meta_description'];
                $meta_tags->url_slug = str_replace(' ', '-', strtolower($data['category_name']));
                $meta_tags->save();
            } 

    		return redirect('/admin/view-categories')->with('flash_message_success','Category updated successfully!');

    	}

    	$categoryDetails = CategoryTranslate::where(['id'=>$id])->first();
    	$en_levels = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'en'])->get();
        $ar_levels = CategoryTranslate::where(['parent_id'=>0])->where(['lang'=>'ar'])->get();

        $meta_tag_counter = DB::table('meta_tags')->where(['table_name'=>'categories', 'table_id'=>$categoryDetails->category_id])->count();

    	return view('admin.categories.edit-category')->with(compact('categoryDetails','en_levels','ar_levels', 'meta_tag_counter'));

    }

    public function deleteCategory(Request $request, $id=null){

        $category = CategoryTranslate::where(['id'=>$id])->first();
        $category_id = $category->category_id;
        $p_image = $category->image;
        $brand_lang = $category->lang;

        if($brand_lang == 'en'){

            $large_image_path = 'images/backend_images/category/en/'.$p_image;

            if(File::exists($large_image_path)){
                File::delete($large_image_path);
            }

        } else if($brand_lang == 'ar'){

            $large_image_path = 'images/backend_images/category/ar/'.$p_image;

            if(File::exists($large_image_path)){
                File::delete($large_image_path);
            }

        }

        CategoryTranslate::where(['id'=>$id])->delete();

        $category_trans = CategoryTranslate::where(['category_id'=>$category_id])->get();
        if($category_trans->isEmpty()){
            Category::where(['id'=>$category_id])->delete();
        }

    	return redirect()->back()->with('flash_message_success','Category Deleted successfully!');
    }
}
