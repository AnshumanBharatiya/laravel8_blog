<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Page extends Controller
{
    function listing(){
        $data['result'] = DB::table('pages')->orderBy('id','desc')->get();
        return view('admin.page.list', $data);
    }

    function submit_page(Request $req){
        $req->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages',
            'description'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:7000',
        ]);

        $image = $req->file('image');
        $ext = $image->extension();
        $file = time().'.'.$ext;
        $image->storeAs('/public/page', $file);

        $data = array(
            'name'=>$req->input('name'),
            'slug'=>$req->input('slug'),
            'description'=>$req->input('description'),
            'image'=>$file,
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        DB::table('pages')->insert($data);
        $req->session()->flash('msg', 'Pages added');
        return redirect('/admin/page/list/');
    }

    function delete_page(Request $req, $id){
        DB::table('pages')->where('id',$id)->delete();
        $req->session()->flash('msg', 'Page Removed');
        return redirect('/admin/page/list/');
    }

    function page_edit(Request $req, $id){
        $data['result']=DB::table('pages')->where('id',$id)->get();
        return view('admin.page.edit', $data);
    }

    function update_page(Request $req, $id){
        $req->validate([
            'name'=>'required',
            'slug'=>'required|max:255',
            'description'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:7000',
        ]);

        $data = array(
            'name'=>$req->input('name'),
            'slug'=>$req->input('slug'),
            'description'=>$req->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        if($req->hasfile('image')){
            $image = $req->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('/public/page',$file);

            $data['image']=$file;
        }

        DB::table('pages')->where('id',$id)->update($data);
        $req->session()->flash('msg', 'Page Updated');
        return redirect('/admin/page/list/');
    }
}
