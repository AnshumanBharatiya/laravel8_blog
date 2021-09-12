<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    function home(){
        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        $data['pgresult'] = DB::table('pages')->where('slug','home')->get();
        return view('user.home', $data);
    }

    function post($id){
        $data['result'] = DB::table('posts')->where('id',$id)->get();
        return view('user.post', $data);
    }

    function allpost(){
        $data['result'] = DB::table('posts')->orderBy('post_date','desc')->get();
        return view('user.allpost', $data);
    }
    function contact(Request $req){
        $data['pgresult'] = DB::table('pages')->where('slug','contact-us')->get();
        return view('user.contact', $data);
    }
    function contactsubmit(Request $req){
       $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
            'mobile'=>'required',
        ]);

        $data = array(
            'name'=>$req->input('name'),
            'email'=>$req->input('email'),
            'mobile'=>$req->input('mobile'),
            'message'=>$req->input('message'),
            'added_on'=>date('Y-m-d h:i:s'),
        );

        DB::table('contacts')->insert($data);
        $req->session()->flash('msg', 'Message Send');
        return redirect('/contact/');
    }

    function about(){
        $data['pgresult'] = DB::table('pages')->where('slug','about-us')->get();
        return view('user.about', $data);
    }
}
