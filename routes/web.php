<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_auth;
use App\Http\Controllers\admin\Post;
use App\Http\Controllers\admin\Page;
use App\Http\Controllers\admin\Contact;
use App\Http\Controllers\user\Page as Upage;
use App\Http\Controllers\user\Post as Upost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User site
Route::get('/', [Upost::class, 'home']);
Route::get('/post/{id}/', [Upost::class, 'post']);
Route::get('/allpost/', [Upost::class, 'allpost']);
Route::get('/about/', [Upost::class, 'about']);
Route::get('/contact/', [Upost::class, 'contact']);
Route::post('/contact/submit/', [Upost::class, 'contactsubmit']);



// Admin site
// Route::get('/admin/login/', 'App\Http\Controllers\admin_auth@login');
// Route::get('/admin/login/', [admin_auth::class,'login']);

Route::view('/admin/', 'admin.login');
Route::post('/admin/login_submit/', [admin_auth::class, 'login_submit']);

Route::get('/admin/logout', function () {
    session()->forget('BLOG_USER_EMAIL');
    return redirect('/admin/');
});

Route::group(['middleware'=>['admin_auth']],function(){
    // post
    Route::get('/admin/post/list/', [Post::class, 'listing']);
    Route::view('/admin/post/add/', 'admin.post.add');
    Route::post('/admin/post/submit/', [Post::class, 'submit_post']);
    Route::get('/admin/post/delete/{id}', [Post::class, 'delete_post']);
    Route::get('/admin/post/edit/{id}', [Post::class, 'post_edit']);
    Route::post('/admin/post/update/{id}', [Post::class, 'update_post']);

    // page
    Route::get('/admin/page/list/', [Page::class, 'listing']);
    Route::view('/admin/page/add/', 'admin.page.add');
    Route::post('/admin/page/submit/', [Page::class, 'submit_page']);
    Route::get('/admin/page/delete/{id}', [Page::class, 'delete_page']);
    Route::get('/admin/page/edit/{id}', [Page::class, 'page_edit']);
    Route::post('/admin/page/update/{id}', [Page::class, 'update_page']);

    // contact
    Route::get('/admin/contact/list/', [Contact::class, 'listing']);

});

