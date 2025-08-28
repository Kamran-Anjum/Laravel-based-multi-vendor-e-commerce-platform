<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class SliderController extends Controller
{
    public function viewSlider()
    {
        $sliders = DB::table('sliders')->orderBy('id', 'desc')->get();
        $sliders_count = DB::table('sliders')->count();

        return view('admin.slider.view_slider')->with(compact('sliders', 'sliders_count'));
    }

    public function addSlider(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'slider_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/slider/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            $slider = new Slider();
            $slider->en_title = $data['en_title'];
            $slider->ar_title = $data['ar_title'];
            $slider->image = $filename;
            $slider->save();            

            return redirect('/admin/view-sliders')->with('flash_message_success','Slider Image Added Successfully!');

        }

        return view('admin.slider.add_slider');

    }

    public function editSlider(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $slider_image =Slider::where(['id'=>$id])->first();
            // image file delete start
            $image = $slider_image->image;

            $image_path = 'images/backend-images/slider/'.$image;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'slider_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/slider/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            Slider::where(['id'=>$id])->update
            ([
                'en_title'=>$data['en_title'],
                'ar_title'=>$data['ar_title'],
                'image'=>$filename,
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-sliders')->with('flash_message_success','Slider Image Updated Successfully!');
        }

        $slider =Slider::where(['id'=>$id])->first();

        return view('admin.slider.edit_slider')->with(compact('slider'));

    }

    public function deleteSlider($id = null)
    {
        $slider_image =Slider::where(['id'=>$id])->first();
        // image file delete start
        $image = $slider_image->image;

        $image_path = 'images/backend-images/slider/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        Slider::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Slider Image Deleted Successfully!');

    }
}
