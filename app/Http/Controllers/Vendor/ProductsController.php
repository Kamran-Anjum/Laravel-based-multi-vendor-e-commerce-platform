<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

use App\VendorPrivilege;
use App\VendorActiveCity;
use App\Brand;
use App\Product;
use App\ProductDetail;
use App\Country;
use App\City;
use App\Category;
use App\ProductUnit;
use App\Priceunit;
use Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class ProductsController extends Controller
{
    public function addProduct(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo print_r($data); die;

    		if(empty($data['category_id'])){
    			return redirect()->back()->with('flash_message_error','Category is Missing!');
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

    		$product = new Product();
            $product->country_id = $data['country_id'];
            $product->city_id = $data['city_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->product_unit_id = $data['productunit_id'];
    		$product->name = $data['name'];
    		$product->code = $data['code'];
            $product->priceunit_id = $data['priceunit_id'];
            $product->price = $data['price'];
            $product->saleprice = $data['saleprice'];
            $product->discount = $data['discount'];
            $product->quantity = $data['quantity'];
            $product->color = $data['color'];
    		$product->height = $data['height'];
            $product->width = $data['width'];
            $product->weight = $data['weight'];
            $product->isHotDeal = $ishotdeal;
            $product->isTopOffer = $istopoffer;
            $product->isFeatured = $isfeatured;
            $product->created_by = Auth::user()->id;
    		$description = $data['description'];
            $product->long_description = $data['long_description'];
            $product->isActive = $data['isActive'];
    		
    		if($request->hasFile('image')){
    			$image_tmp = Input::file('image');
    			// echo $image_tmp; die;
    			if($image_tmp->isValid()){
    				// create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'images/backend_images/products/large/'.$filename;
    				$medium_image_path = 'images/backend_images/products/medium/'.$filename;
    				$small_image_path = 'images/backend_images/products/small/'.$filename;
    				$tiny_image_path = 'images/backend_images/products/tiny/'.$filename;
    				$image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
    				$product->image = $filename;
    			}

    		}
    		$product->save();
            $productid = $product->id;

            if($product){
                if($request->hasFile('galeryimage1')){
                    $productdetail = new ProductDetail();
                    $image_tmp = Input::file('galeryimage1');
                    // echo $image_tmp; die;
                    if($image_tmp->isValid()){
                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/product_galary/large/'.$filename;
                        $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename;
                        $small_image_path = 'images/backend_images/product_galary/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);

                        $productdetail->image = $filename;
                        $productdetail->product_id = $productid;
                        $productdetail->save();
                    }

                }
                if($request->hasFile('galeryimage2')){
                    $productdetail = new ProductDetail();
                    $image_tmp = Input::file('galeryimage2');
                    // echo $image_tmp; die;
                    if($image_tmp->isValid()){
                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/product_galary/large/'.$filename;
                        $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename;
                        $small_image_path = 'images/backend_images/product_galary/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);

                        $productdetail->image = $filename;
                        $productdetail->product_id = $productid;
                        $productdetail->save();
                    }

                }
                if($request->hasFile('galeryimage3')){
                    $productdetail = new ProductDetail();
                    $image_tmp = Input::file('galeryimage3');
                    // echo $image_tmp; die;
                    if($image_tmp->isValid()){
                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/product_galary/large/'.$filename;
                        $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename;
                        $small_image_path = 'images/backend_images/product_galary/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);

                        $productdetail->image = $filename;
                        $productdetail->product_id = $productid;
                        $productdetail->save();
                    }

                }
                if($request->hasFile('galeryimage4')){
                    $productdetail = new ProductDetail();
                    $image_tmp = Input::file('galeryimage4');
                    // echo $image_tmp; die;
                    if($image_tmp->isValid()){
                        // create image manager with desired driver
                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/product_galary/large/'.$filename;
                        $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename;
                        $small_image_path = 'images/backend_images/product_galary/small/'.$filename;
                        $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);
                        $image->resize(600,600)->save($medium_image_path);
                        $image->resize(300,300)->save($small_image_path);
                        $image->resize(100,100)->save($tiny_image_path);

                        $productdetail->image = $filename;
                        $productdetail->product_id = $productid;
                        $productdetail->save();
                    }

                }
            }
    		
    		return redirect('/vendor/view-products')->with('flash_message_success','Product Added Successfully!');
    	}

        // VendorPrivilege country
        $countries = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('countries as c','vp.country_id','=','c.id')
        ->select('vp.*','c.name as countryName','c.id as countryId')
        ->groupBy('vp.country_id')
        ->get();

        $countries_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($countries as $cont)
        {
            $countries_dropdown .= "<option value='".$cont->countryId."'>".$cont->countryName . "</option>";
        }

        // Categories dropdown start
	    $categories = Category::where(['parent_id'=>0])->get();
	    $categories_dropdown = "<option selected value='' disabled>Select</option>";
	    foreach($categories as $cat){
	    	$categories_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
	    	$sub_category = Category::where(['parent_id'=>$cat->id])->get();
	    	foreach ($sub_category as $sub_cat) {
	    		$categories_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
	    	}
	    }
        $productunits = ProductUnit::where(['deleted_at'=>null])->get();
        $productunit_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($productunits as $unit){
            $productunit_dropdown.="<option value='".$unit->id."'>".$unit->name." (".$unit->code.")</option>";
        }
        // Brand dropdown
        $brands = Brand::where(['isActive' =>'1'])->get();
        $brands_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($brands as $br){
            $brands_dropdown.="<option value='".$br->id."'>".$br->name."</option>";
        }
        $priceunits = Priceunit::where(['isActive' =>'1'])->get();
        $priceunits_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($priceunits as $priceunit){
            $priceunits_dropdown.="<option value='".$priceunit->id."'>".$priceunit->name." (".$priceunit->code.")</option>";
        }
    	return view('vendor.products.add_product')->with(compact('countries_dropdown','categories_dropdown','brands_dropdown','productunit_dropdown','priceunits_dropdown'));
    }

    public function editProduct(Request $request, $id =null){

        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                // echo $image_tmp; die;
                if($image_tmp->isValid()){


                    // image file delete start
                    $prod_image = Product::where(['id'=>$id])->first();
                    $p_image = $prod_image->image;

                    $large_image_path = 'images/backend_images/products/large/'.$p_image;
                    $medium_image_path = 'images/backend_images/products/medium/'.$p_image;
                    $small_image_path = 'images/backend_images/products/small/'.$p_image;
                    $tiny_image_path = 'images/backend_images/products/tiny/'.$p_image;

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
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    $tiny_image_path = 'images/backend_images/products/tiny/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
                }

            }else{
                $filename = $data['current_image'];
                if(empty($filename)){
                    $filename ='';
                }
            }


            // echo print_r($data); die;
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

            Product::where(['id'=>$id])->update([
                'country_id'=>$data['country_id'],
                'city_id'=>$data['city_id'],
                'category_id'=>$data['category_id'],
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
                'brand_id'=>$data['brand_id'],
                'quantity'=>$data['quantity'],
                'priceunit_id'=>$data['priceunit_id'],
                'isActive'=>$data['isActive']
            ]);


            if($request->hasFile('galeryimage1')){
                $productdetail = new ProductDetail();
                $image_tmp = Input::file('galeryimage1');
                // echo $image_tmp; die;
                if($image_tmp->isValid()){
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename1 = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product_galary/large/'.$filename1;
                    $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename1;
                    $small_image_path = 'images/backend_images/product_galary/small/'.$filename1;
                    $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename1;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);

                    // $productdetail->product_id = $productid;
                    // $productdetail->save();
                    // echo $product->image; echo die;
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
            $productdetail = new ProductDetail();
            $productdetail->image = $filename1;
            if(!empty($data['current_id1'])){

            ProductDetail::where(['id'=>$data['current_id1']])->update(['image'=>$filename1]);
            }elseif($filename1!=''){
                $productdetail->product_id = $id;
                $productdetail->save();
            }

            if($request->hasFile('galeryimage2')){
                $productdetail = new ProductDetail();
                $image_tmp = Input::file('galeryimage2');
                // echo $image_tmp; die;
                if($image_tmp->isValid()){
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename2 = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product_galary/large/'.$filename2;
                    $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename2;
                    $small_image_path = 'images/backend_images/product_galary/small/'.$filename2;
                    $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename2;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
            }
            else{
                if(!empty($data['current_image2'])){
                    $filename2 = $data['current_image2'];
                }
                if( empty($filename2)){
                    $filename2 ='';
                }
            }
            $productdetail = new ProductDetail();
            $productdetail->image = $filename2;
            if(!empty($data['current_id2'])){
                ProductDetail::where(['id'=>$data['current_id2']])->update(['image'=>$filename2]);
            }elseif($filename2!=''){
                $productdetail->product_id = $id;
                $productdetail->save();
            }

            if($request->hasFile('galeryimage3')){
                $productdetail = new ProductDetail();
                $image_tmp = Input::file('galeryimage3');
                // echo $image_tmp; die;
                if($image_tmp->isValid()){
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename3 = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product_galary/large/'.$filename3;
                    $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename3;
                    $small_image_path = 'images/backend_images/product_galary/small/'.$filename3;
                    $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename3;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
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
            $productdetail = new ProductDetail();
            $productdetail->image = $filename3;
            if(!empty($data['current_id3'])){
                ProductDetail::where(['id'=>$data['current_id3']])->update(['image'=>$filename3]);
            }elseif($filename3!=''){
                $productdetail->product_id = $id;
                $productdetail->save();
            }



            if($request->hasFile('galeryimage4')){
                $productdetail = new ProductDetail();
                $image_tmp = Input::file('galeryimage4');
                // echo $image_tmp; die;
                if($image_tmp->isValid()){
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename4 = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product_galary/large/'.$filename4;
                    $medium_image_path = 'images/backend_images/product_galary/medium/'.$filename4;
                    $small_image_path = 'images/backend_images/product_galary/small/'.$filename4;
                    $tiny_image_path = 'images/backend_images/product_galary/tiny/'.$filename4;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);
                    $image->resize(600,600)->save($medium_image_path);
                    $image->resize(300,300)->save($small_image_path);
                    $image->resize(100,100)->save($tiny_image_path);
            }
            else{
                if(!empty($data['current_image4'])){
                    $filename4 = $data['current_image4'];
                }
                if( empty($filename4)){
                    $filename4 ='';
                }
            }
            $productdetail = new ProductDetail();
            $productdetail->image = $filename4;
            if(!empty($data['current_id4'])){
                ProductDetail::where(['id'=>$data['current_id4']])->update(['image'=>$filename]);
            }elseif($filename4!=''){
                $productdetail->product_id = $id;
                $productdetail->save();
            }

            return redirect()->back()->with('flash_message_success','Product has been Updated Successfully!');
        }

        $productDetails = Product::where(['id'=>$id])->first();
        $productImages = ProductDetail::where(['product_id'=>$id])->get();

       $countries = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['c.isActive'=> 1])
        ->where(['c.isDeleted'=> 0])
        ->join('countries as c','vp.country_id','=','c.id')
        ->select('vp.*','c.name as countryName','c.id as countryId')
        ->groupBy('vp.country_id')
        ->get();

        $cities = DB::table('vendor_privileges as vp')
        ->where(['vp.user_id'=> Auth::user()->id])
        ->where(['vp.country_id'=> $productDetails->country_id])
        ->where(['ci.isActive'=> 1])
        ->where(['ci.isDeleted'=> 0])
        ->join('cities as ci','vp.city_id','=','ci.id')
        ->select('vp.*','ci.name as cityName','ci.id as cityId')
        ->groupBy('vp.city_id')
        ->get();

        // Categories dropdown start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown.="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_category = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_category as $sub_cat) {
            if($sub_cat->id==$productDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
                $categories_dropdown.="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        // Brand dropdown start
            $brands = Brand::get();
            $brands_dropdown = "<option selected value='' disabled>Select</option>";
            foreach($brands as $br){
                if($br->id==$productDetails->brand_id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $brands_dropdown.="<option value='".$br->id."'".$selected.">".$br->name."</option>";
            }
        $productunits = ProductUnit::where(['deleted_at'=>null])->get();
        $productunit_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($productunits as $unit){
                if($unit->id==$productDetails->product_unit_id){
                    $unitselected = "selected";
                }else{
                    $unitselected = "";
                }
            $productunit_dropdown.="<option value='".$unit->id."'".$unitselected.">".$unit->name." (".$unit->code.")</option>";
        }
        $priceunits = Priceunit::where(['isActive' =>'1'])->get();
        $priceunits_dropdown = "<option selected value='' disabled>Select</option>";
        foreach($priceunits as $priceunit){
            if($priceunit->id==$productDetails->priceunit_id){
                    $priceunitselected = "selected";
                }else{
                    $priceunitselected = "";
                }
            $priceunits_dropdown.="<option value='".$priceunit->id."'".$priceunitselected.">".$priceunit->name." (".$priceunit->code.")</option>";
        }
        return view('vendor.products.edit_product')->with(compact('productDetails','categories_dropdown','productImages','brands_dropdown','productunit_dropdown','priceunits_dropdown','countries','cities'));
    }
    public function viewProducts(){
        $vendor_active_city = VendorActiveCity::where(['user_id'=>Auth::user()->id])->first();
        $active_city = $vendor_active_city->city_id;

    	$products = Product::where(['city_id'=>$active_city])
        ->where(['created_by'=>Auth::user()->id])
        ->get();

        foreach ($products as $key => $value) {
            $country_name = Country::where(['id'=>$value->country_id])->first();
            $products[$key]->country_name = $country_name->name;
        }
        foreach ($products as $key => $value) {
            $city_name = City::where(['id'=>$value->city_id])->first();
            $products[$key]->city_name =$city_name->name;
        }
    	foreach ($products as $key => $value) {
    		$category_name = Category::where(['id'=>$value->category_id])->first();
    		$products[$key]->category_name = $category_name->name;
    	}
        foreach ($products as $key => $value) {
            $brand_name = Brand::where(['id'=>$value->brand_id])->first();
            $products[$key]->brand_name =$brand_name->name;
        }
    	return view('vendor.products.view_products')->with(compact('products'));
    }
    public function deleteProductImage($id = null){
        Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Product image has been Deleted Successfully!');
    }
    public function deleteProductGalleryImage($id =null){
        ProductDetail::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product gallery image has been Deleted Successfully!');
    }
    public function deleteProduct($id = null){
        // image file delete start
        $prod_image = Product::where(['id'=>$id])->first();
        $p_image = $prod_image->image;

        $large_image_path = 'images/backend_images/products/large/'.$p_image;
        $medium_image_path = 'images/backend_images/products/medium/'.$p_image;
        $small_image_path = 'images/backend_images/products/small/'.$p_image;
        $tiny_image_path = 'images/backend_images/products/tiny/'.$p_image;

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

        $product = Product::where(['id'=>$id])->delete();
        if($product){
            ProductDetail::where(['product_id'=>$id])->delete();
        }
        return redirect()->back()->with('flash_message_success','Product has been deleted Successfully!');
    }

    /* Hamza Search 06-05-2019 */
    public function search_index()
    {
        $countries = DB::table('countries')->get();
        $cites = DB::table('cities')->get();
        return view('subadmin.products.search')->with(compact('countries'));

    }

    public function cityname(Request $request)
    {
        $data = DB::table('cities')->where('country_id', '=', $request->id)
            ->select('name', 'id')
            ->get();
        return response()->json($data);
    }

    public function productname(Request $request)
    {
        // $data = $request->search.'-'.$request->id;
// print_r($data);


        $data=DB::table('products as p')
            ->where('p.name','like',"%{$request->search}%")
            ->where('v.city_id','=',$request->id)
//            ->orWhere('p.name','like',"%{$request->search}%")
//            ->orWhere('pc.name','like',"%$request->search%")
            ->join('vendors as v','p.vendor_id','=','v.id')
            ->join('categories as pc','p.category_id','=','pc.id')
            ->select('p.description','p.name','p.price','p.code','p.color','pc.name as pc_name','p.category_id')
            ->get();
        echo ($data);
        die;
        print_r($data);
        die;
        return response()->json($data);
    }

    public function getCityName($id)
    {
        // $cities = DB::table('vendor_privileges as vp')
        // ->where(['vp.user_id'=> Auth::user()->id])
        // ->where(['vp.country_id'=> $id])
        // ->where(['ci.isActive'=> 1])
        // ->where(['ci.isDeleted'=> 0])
        // ->join('cities as ci','vp.city_id','=','ci.id')
        // ->select('vp.*','ci.name as cityName','ci.id as cityId')
        // ->groupBy('vp.city_id')
        // ->get();

        $cities = DB::table('cities as ci')->where(['ci.country_id' => $id])->select('ci.id as cityId', 'ci.name as cityName')->get();

        return $cities;
    }

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
