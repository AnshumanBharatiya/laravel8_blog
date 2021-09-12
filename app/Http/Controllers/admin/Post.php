<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    function listing(){
        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        // echo "<pre>";
        // print_r($data['result']);
        // die();
        return view('admin.post.list', $data);
    }
    function submit_post(Request $req){
        $req->validate([
            'title'=>'required|max:75',
            'short_desc'=>'required|max:255',
            'long_desc'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:7000',
            'post_date'=>'required|before_or_equal:today',
        ]);

        // $image = $req->file('image')->store('public/post');
        $image = $req->file('image');
        $ext = $image->extension();
        $file = time().'.'.$ext;
        $image->storeAs('/public/post',$file);

        $data = array(
            'title'=>$req->input('title'),
            'short_desc'=>$req->input('short_desc'),
            'long_desc'=>$req->input('long_desc'),
            // 'image'=>$image,
            'image'=>$file,
            'post_date'=>$req->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        DB::table('posts')->insert($data);
        $req->session()->flash('msg', 'Post Saved');
        return redirect('/admin/post/list/');
    }

    function delete_post(Request $req, $id){
        DB::table('posts')->where('id',$id)->delete();
        $req->session()->flash('msg', 'Post Deleted');
        return redirect('/admin/post/list/');
    }

    function post_edit(Request $req, $id){
        $data['result']=DB::table('posts')->where('id',$id)->get();
        return view('admin.post.edit', $data);
    }

    function update_post(Request $req, $id){
        $req->validate([
            'title'=>'required|max:75',
            'short_desc'=>'required|max:255',
            'long_desc'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:7000',
            'post_date'=>'required|before_or_equal:today',
        ]);        

        $data = array(
            'title'=>$req->input('title'),
            'short_desc'=>$req->input('short_desc'),
            'long_desc'=>$req->input('long_desc'),
            // 'image'=>$image,
            'post_date'=>$req->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        if($req->hasfile('image')){
            // $image = $req->file('image')->store('public/post');
            $image = $req->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('/public/post',$file);

            $data['image']=$file;
        }

        DB::table('posts')->where('id',$id)->update($data);
        $req->session()->flash('msg', 'Post Updated');
        return redirect('/admin/post/list/');
    }
}

// required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
