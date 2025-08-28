<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Footer;

class FooterController extends Controller
{
    public function viewFooter()
    {
        $footer = DB::table('footers')->first();

        $footer_count = DB::table('footers')->count();

        return view('admin.footer.view_footer')->with(compact('footer', 'footer_count'));
    }

    public function addFooter(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $footer = new Footer();
            $footer->address = $data['address'];
            $footer->phone_1 = $data['phone_1'];
            $footer->phone_2 = $data['phone_2'];
            $footer->email = $data['email'];
            $footer->google = $data['google'];
            $footer->linkedin = $data['linkedin'];
            $footer->twitter = $data['twitter'];
            $footer->facebook = $data['facebook'];
            $footer->instagram = $data['instagram'];
            $footer->youtube = $data['youtube'];
            $footer->save();

            return redirect('/admin/view-footer-item')->with('flash_message_success','Footer Items Added Successfully!');

        }

        return view('admin.footer.add_footer');

    }

    public function editFooter(Request $request, $column_name, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $item = '';            

            if ($column_name == 'address') {

                Footer::where(['id'=>$id])->update
                ([
                    'address'=>$data['address']
                ]);

                $item = 'Address';
                
            } elseif ($column_name == 'phone_1') {

                Footer::where(['id'=>$id])->update
                ([
                    'phone_1'=>$data['phone_1']
                ]);

                $item = 'Phone 1';
                
            } elseif ($column_name == 'phone_2') {

                Footer::where(['id'=>$id])->update
                ([
                    'phone_2'=>$data['phone_2']
                ]);

                $item = 'Phone 2';
                
            } elseif ($column_name == 'email') {

                Footer::where(['id'=>$id])->update
                ([
                    'email'=>$data['email']
                ]);

                $item = 'E-mail';
                
            } elseif ($column_name == 'google-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'google'=>$data['google']
                ]);

                $item = 'Google Link';
                
            } elseif ($column_name == 'linkedin-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'linkedin'=>$data['linkedin']
                ]);

                $item = 'Linkedin Link';
                
            } elseif ($column_name == 'twitter-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'twitter'=>$data['twitter']
                ]);

                $item = 'Twitter Link';
                
            } elseif ($column_name == 'facebook-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'facebook'=>$data['facebook']
                ]);

                $item = 'Facebook Link';
                
            } elseif ($column_name == 'instagram-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'instagram'=>$data['instagram']
                ]);

                $item = 'Instagram Link';
                
            } elseif ($column_name == 'youtube-link') {

                Footer::where(['id'=>$id])->update
                ([
                    'youtube'=>$data['youtube']
                ]);

                $item = 'Youtube Link';
                
            }

            return redirect('/admin/view-footer-item')->with('flash_message_success', $item.' Updated Successfully!');
        }

        $footer =Footer::where(['id'=>$id])->first();

        return view('admin.footer.edit_footer')->with(compact('footer', 'column_name'));

    }

    public function deleteFooter($column_name, $id = null)
    {

        $item = '';            

        if ($column_name == 'address') {

            Footer::where(['id'=>$id])->update
            ([
                'address'=>''
            ]);

            $item = 'Address';
            
        } elseif ($column_name == 'phone_1') {

            Footer::where(['id'=>$id])->update
            ([
                'phone_1'=>''
            ]);

            $item = 'Phone 1';
            
        } elseif ($column_name == 'phone_2') {

            Footer::where(['id'=>$id])->update
            ([
                'phone_2'=>''
            ]);

            $item = 'Phone 2';
            
        } elseif ($column_name == 'email') {

            Footer::where(['id'=>$id])->update
            ([
                'email'=>''
            ]);

            $item = 'E-mail';
            
        } elseif ($column_name == 'google-link') {

            Footer::where(['id'=>$id])->update
            ([
                'google'=>''
            ]);

            $item = 'Google Link';
            
        } elseif ($column_name == 'linkedin-link') {

            Footer::where(['id'=>$id])->update
            ([
                'linkedin'=>''
            ]);

            $item = 'Linkedin Link';
            
        } elseif ($column_name == 'twitter-link') {

            Footer::where(['id'=>$id])->update
            ([
                'twitter'=>''
            ]);

            $item = 'Twitter Link';
            
        } elseif ($column_name == 'facebook-link') {

            Footer::where(['id'=>$id])->update
            ([
                'facebook'=>''
            ]);

            $item = 'Facebook Link';
            
        } elseif ($column_name == 'instagram-link') {

            Footer::where(['id'=>$id])->update
            ([
                'instagram'=>''
            ]);

            $item = 'Instagram Link';
            
        } elseif ($column_name == 'youtube-link') {

            Footer::where(['id'=>$id])->update
            ([
                'youtube'=>''
            ]);

            $item = 'Youtube Link';
            
        }

        return redirect('/admin/view-footer-item')->with('flash_message_success', $item.' Deleted Successfully!');

    }
}
