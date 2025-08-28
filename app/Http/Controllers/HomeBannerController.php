<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\HomeBanner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class HomeBannerController extends Controller
{
    public function viewHomeBanner()
    {
        $home_banners = DB::table('home_banners')->orderBy('id', 'desc')->get();

        return view('admin.home_banner.view_home_banner')->with(compact('home_banners'));
    }

    public function addHomeBanner(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $home_banners_count = DB::table('home_banners')->where(['condition'=>$data['condition']])->count();

            if ($home_banners_count > 0) {

                if ($data['condition'] == 1) {
                    $condition = 'Full Banner';
                } elseif ($data['condition'] == 2) {
                    $condition = 'Side By Side Banner';
                } elseif ($data['condition'] == 3) {
                    $condition = 'Left Side Banner';
                }

                return redirect()->back()->with('flash_message_error','Home '.$condition.' Already Added!');
                
            } else {
                
                if($request->hasFile('image')){

                    $image_tmp = $request->image;

                    if($image_tmp->isValid()){

                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = 'home_banner_image_'.rand(1111,9999999).'.'.$extension;

                        $large_image_path = 'images/backend_images/home_banner/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);

                    }

                }else{

                    $filename = '';

                }

                if($request->hasFile('image_2')){

                    $image_tmp = $request->image_2;

                    if($image_tmp->isValid()){

                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename_2 = 'home_banner_image_'.rand(1111,9999999).'.'.$extension;

                        $large_image_path = 'images/backend_images/home_banner/'.$filename_2;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);

                    }

                }else{

                    $filename_2 = '';

                }

                $home_banner = new HomeBanner();
                $home_banner->condition = $data['condition'];
                $home_banner->image = $filename;
                $home_banner->en_title = $data['en_title'];
                $home_banner->ar_title = $data['ar_title'];
                $home_banner->image_2 = $filename_2;
                $home_banner->en_title_2 = $data['en_title_2'];
                $home_banner->ar_title_2 = $data['ar_title_2'];
                $home_banner->save();            

                return redirect('/admin/view-home-banners')->with('flash_message_success','Home Banner Added Successfully!');

            }

        }

        return view('admin.home_banner.add_home_banner');

    }

    public function editHomeBanner(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $home_banner_image =HomeBanner::where(['id'=>$id])->first();
            // image file delete start
            $image = $home_banner_image->image;

            $image_path = 'images/backend-images/home_banner/'.$image;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'home_banner_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/home_banner/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            if($request->hasFile('image_2')){

                $image_tmp = $request->image_2;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename_2 = 'home_banner_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/home_banner/'.$filename_2;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_2 = $data['cur_image_2'];
            }

            HomeBanner::where(['id'=>$id])->update
            ([
                'image'=>$filename,
                'en_title'=>$data['en_title'],
                'ar_title'=>$data['ar_title'],
                'image_2'=>$filename_2,
                'en_title_2'=>$data['en_title_2'],
                'ar_title_2'=>$data['ar_title_2'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-home-banners')->with('flash_message_success','Home Banner Updated Successfully!');
        }

        $home_banner = HomeBanner::where(['id'=>$id])->first();

        return view('admin.home_banner.edit_home_banner')->with(compact('home_banner'));

    }

    public function deleteHomeBanner($id = null)
    {
        $home_banner_image = HomeBanner::where(['id'=>$id])->first();
        // image file delete start
        $image = $home_banner_image->image;

        $image_path = 'images/backend-images/home_banner/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        HomeBanner::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Home Banner Deleted Successfully!');

    }

}
