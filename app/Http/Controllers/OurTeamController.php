<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\OurTeam;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class OurTeamController extends Controller
{
    public function viewOurTeam()
    {
        $our_teams = DB::table('our_teams')->orderBy('id', 'desc')->get();
        $our_team_count = DB::table('our_teams')->count();

        return view('admin.our-team.view_our_team')->with(compact('our_teams', 'our_team_count'));
    }

    public function addOurTeam(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'our_team_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/our-team/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }

            $OurTeam = new OurTeam();
            $OurTeam->name = $data['name'];
            $OurTeam->job_post = $data['job_post'];
            $OurTeam->image = $filename;
            $OurTeam->save();            

            return redirect('/admin/view-our-team')->with('flash_message_success','Our Team Added Successfully!');

        }

        return view('admin.our-team.add_our_team');

    }

    public function editOurTeam(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $OurTeam_image =OurTeam::where(['id'=>$id])->first();
            // image file delete start
            $image = $OurTeam_image->image;

            $image_path = 'images/backend-images/our-team/'.$image;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'our_team_image_'.rand(1111,9999999).'.'.$extension;

                    $large_image_path = 'images/backend_images/our-team/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            OurTeam::where(['id'=>$id])->update
            ([
                'name'=>$data['name'],
                'job_post'=>$data['job_post'],
                'image'=>$filename,
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-our-team')->with('flash_message_success','Our Team Updated Successfully!');
        }

        $our_team =OurTeam::where(['id'=>$id])->first();

        return view('admin.our-team.edit_our_team')->with(compact('our_team'));

    }

    public function deleteOurTeam($id = null)
    {
        $OurTeam_image =OurTeam::where(['id'=>$id])->first();
        // image file delete start
        $image = $OurTeam_image->image;

        $image_path = 'images/backend-images/our-team/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        OurTeam::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Our Team Deleted Successfully!');

    }
}
