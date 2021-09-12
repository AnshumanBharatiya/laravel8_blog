<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('BLOG_USER_EMAIL')){
            return redirect('/admin/');
        }
        return $next($request);
    }
}
