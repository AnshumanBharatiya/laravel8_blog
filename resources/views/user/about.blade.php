@extends('user/layout.layout')
@section('page_title','About')
@section('header')
<header class="masthead" style="background-image: url('{{asset('/storage/page/'.$pgresult[0]->image)}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>About Us</h1>
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('container')
<p>{{$pgresult[0]->description}}</p>

@endsection