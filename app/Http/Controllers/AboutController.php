<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class AboutController extends Controller
{
    public function viewAbout()
    {
        $abouts = DB::table('abouts')->orderBy('id', 'desc')->get();
        $about_count = DB::table('abouts')->count();

        return view('admin.about.view_about')->with(compact('abouts', 'about_count'));
    }

    public function viewAboutDetail($id)
    {
        $about = DB::table('abouts')->where(['id'=>$id])->first();

        return view('admin.about.view_about_detail')->with(compact('about'));
    }

    public function addAbout(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            if($request->hasFile('image_2')){

                $image_tmp = $request->image_2;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_2 = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename_2;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            if($request->hasFile('image_3')){

                $image_tmp = $request->image_3;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_3 = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename_3;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            $about = new About();
            $about->en_title = $data['en_title'];
            $about->ar_title = $data['ar_title'];
            $about->en_description = $data['en_description'];
            $about->ar_description = $data['ar_description'];
            $about->image = $filename;
            $about->image_2 = $filename_2;
            $about->image_3 = $filename_3;
            $about->save();            

            return redirect('/admin/view-about')->with('flash_message_success','About Added Successfully!');

        }

        return view('admin.about.add_about');

    }

    public function editAbout(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $About_image =About::where(['id'=>$id])->first();
            // image file delete start
            $image = $About_image->image;
            $image_2 = $About_image->image_2;
            $image_3 = $About_image->image_3;

            $image_path = 'images/backend-images/about/'.$image;
            $image_path_2 = 'images/backend-images/about/'.$image_2;
            $image_path_3 = 'images/backend-images/about/'.$image_3;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            if($request->hasFile('image_2')){

                $image_tmp = $request->image_2;

                if(File::exists($image_path_2)){
                    File::delete($image_path_2);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_2 = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename_2;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_2 = $data['cur_image_2'];
            }

            if($request->hasFile('image_3')){

                $image_tmp = $request->image_3;

                if(File::exists($image_path_3)){
                    File::delete($image_path_3);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_3 = 'about_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/about/'.$filename_3;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_3 = $data['cur_image_3'];
            }

            About::where(['id'=>$id])->update
            ([
                'en_title'=>$data['en_title'],
                'ar_title'=>$data['ar_title'],
                'ar_description'=>$data['ar_description'],
                'en_description'=>$data['en_description'],
                'image'=>$filename,
                'image_2'=>$filename_2,
                'image_3'=>$filename_3,
            ]);

            return redirect('/admin/view-about')->with('flash_message_success','About Updated Successfully!');
        }

        $about =About::where(['id'=>$id])->first();

        return view('admin.about.edit_about')->with(compact('about'));

    }

    public function deleteAbout($id = null)
    {
        $About_image =About::where(['id'=>$id])->first();
        // image file delete start
        $image = $About_image->image;
        $image_2 = $About_image->image_2;
        $image_3 = $About_image->image_3;

        $image_path = 'images/backend-images/about/'.$image;
        $image_path_2 = 'images/backend-images/about/'.$image_2;
        $image_path_3 = 'images/backend-images/about/'.$image_3;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        if(File::exists($image_path_2)){
            File::delete($image_path_2);
        }

        if(File::exists($image_path_3)){
            File::delete($image_path_3);
        }

        About::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','About Deleted Successfully!');

    }
}
