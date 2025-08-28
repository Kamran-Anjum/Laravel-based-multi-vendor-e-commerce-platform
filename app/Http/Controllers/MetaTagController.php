<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\MetaTag;

class MetaTagController extends Controller
{
    public function viewMetaTag()
    {
        $meta_tags = DB::table('meta_tags')->orderBy('id', 'desc')->get();

        return view('admin.meta-tags.view_meta_tags')->with(compact('meta_tags'));
    }

    public function addMetaTag(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            if ($data['title'] == 'Lilac') {
                $url_slug = '/';
            }else {
                $url_slug = strtolower($data['title']);
            }

            $meta_tag_counter = DB::table('meta_tags')->where(['title'=>$data['title']])->count();

            if ($meta_tag_counter == 0) {

                $meta_tags = new MetaTag();
                $meta_tags->title = $data['title'];
                $meta_tags->keywords = $data['keywords'];
                $meta_tags->description = $data['description'];
                $meta_tags->url_slug = $url_slug;
                $meta_tags->save();

                return redirect('/admin/view-meta-tags')->with('flash_message_success','Meta Tag Added Successfully!');
                
            } else {
                
                return redirect()->back()->with('flash_message_error','MetaTag For '.$data['title'].' Already Added!');

            }

        }

        return view('admin.meta-tags.add_meta_tags');

    }

    public function editMetaTag(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            if ($data['title'] == 'Lilac') {
                $url_slug = '/';
            }else {
                $url_slug = strtolower($data['title']);
            }

            MetaTag::where(['id'=>$id])->update
            ([
                'title'=>$data['title'],
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'url_slug'=>$url_slug,
            ]);

            return redirect('/admin/view-meta-tags')->with('flash_message_success','Meta Tags Updated Successfully!');
        }

        $meta_tag =MetaTag::where(['id'=>$id])->first();

        return view('admin.meta-tags.edit_meta_tags')->with(compact('meta_tag'));

    }

    public function deleteMetaTag($id = null)
    {

        MetaTag::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','MetaTag Deleted Successfully!');

    }
}
