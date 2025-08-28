<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\WeServeProvide;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class WeServeProvideController extends Controller
{
    public function viewWeServeProvide()
    {
        $we_serve_provides = DB::table('we_serve_provides')->orderBy('id', 'desc')->get();
        $we_serve_provide_count = DB::table('we_serve_provides')->count();

        return view('admin.we-serve-provide.view_we_serve_provide')->with(compact('we_serve_provides', 'we_serve_provide_count'));
    }

    public function addWeServeProvide(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'we_serve_provide_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/we_serve_provide/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            $we_serve_provide = new WeServeProvide();
            $we_serve_provide->en_title = $data['en_title'];
            $we_serve_provide->en_title_2 = $data['en_text'];
            $we_serve_provide->ar_title = $data['ar_title'];
            $we_serve_provide->ar_title_2 = $data['ar_text'];
            $we_serve_provide->image = $filename;
            $we_serve_provide->save();            

            return redirect('/admin/view-we-serve-cards')->with('flash_message_success','WeServeProvide Card Added Successfully!');

        }

        return view('admin.we-serve-provide.add_we_serve_provide');

    }

    public function editWeServeProvide(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $WeServeProvide_image =WeServeProvide::where(['id'=>$id])->first();
            // image file delete start
            $image = $WeServeProvide_image->image;

            $image_path = 'images/backend-images/we_serve_provide/'.$image;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'we_serve_provide_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/we_serve_provide/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            WeServeProvide::where(['id'=>$id])->update
            ([
                'en_title'=>$data['en_title'],
                'en_title_2'=>$data['en_text'],
                'ar_title'=>$data['ar_title'],
                'ar_title_2'=>$data['ar_text'],
                'image'=>$filename,
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-we-serve-cards')->with('flash_message_success','WeServeProvide Card Updated Successfully!');
        }

        $we_serve_provide =WeServeProvide::where(['id'=>$id])->first();

        return view('admin.we-serve-provide.edit_we_serve_provide')->with(compact('we_serve_provide'));

    }

    public function deleteWeServeProvide($id = null)
    {
        $WeServeProvide_image =WeServeProvide::where(['id'=>$id])->first();
        // image file delete start
        $image = $WeServeProvide_image->image;

        $image_path = 'images/backend-images/we_serve_provide/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        WeServeProvide::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','WeServeProvide Card Deleted Successfully!');

    }

}
