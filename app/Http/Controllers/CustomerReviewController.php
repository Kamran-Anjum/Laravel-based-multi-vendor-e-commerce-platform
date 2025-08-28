<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerReview;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class CustomerReviewController extends Controller
{
    public function viewCustomerReview()
    {
        $customer_reviews = DB::table('customer_reviews')->orderBy('id', 'desc')->get();
        $customer_review_count = DB::table('customer_reviews')->count();

        return view('admin.customer-review.view_customer_review')->with(compact('customer_reviews', 'customer_review_count'));
    }

    public function addCustomerReview(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'customer_review_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/customer-review/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            $CustomerReview = new CustomerReview();
            $CustomerReview->name = $data['name'];
            $CustomerReview->job_post = $data['job_post'];
            $CustomerReview->review = $data['review'];
            $CustomerReview->image = $filename;
            $CustomerReview->save();            

            return redirect('/admin/view-customer-reviews')->with('flash_message_success','Customer Review Added Successfully!');

        }

        return view('admin.customer-review.add_customer_review');

    }

    public function editCustomerReview(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $CustomerReview_image =CustomerReview::where(['id'=>$id])->first();
            // image file delete start
            $image = $CustomerReview_image->image;

            $image_path = 'images/backend-images/customer-review/'.$image;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'customer_review_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/customer-review/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            CustomerReview::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'job_post'=>$data['job_post'],
                'review'=>$data['review'],
                'image'=>$filename,
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-customer-reviews')->with('flash_message_success','Customer Review Updated Successfully!');
        }

        $customer_review =CustomerReview::where(['id'=>$id])->first();

        return view('admin.customer-review.edit_customer_review')->with(compact('customer_review'));

    }

    public function deleteCustomerReview($id = null)
    {
        $CustomerReview_image =CustomerReview::where(['id'=>$id])->first();
        // image file delete start
        $image = $CustomerReview_image->image;

        $image_path = 'images/backend-images/customer-review/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        CustomerReview::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Customer Review Deleted Successfully!');

    }
}
