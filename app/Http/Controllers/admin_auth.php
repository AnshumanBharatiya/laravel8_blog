<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin_auth extends Controller
{
    function login_submit(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');

        $result = DB::table('users')->where('email', $email)->where('password', $password)->get();

        // echo "<pre>";
        // print_r($result);

        if(isset($result[0]->id)){
            if($result[0]->status==1){
                $req->session()->put('BLOG_USER_EMAIL', $result[0]->email);
                return redirect('/admin/post/list/');
            }else{
                $req->session()->flash('msg','Account has been Deactive');
                return redirect('admin');
            }
        }else{
            $req->session()->flash('msg','Enter Valid Login Details');
            return redirect('admin');
        }
    }
}
