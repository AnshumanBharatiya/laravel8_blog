@extends('user/layout.layout')
@section('page_title','Home')

<?php 
	
	// echo "<pre>";
	// print_r($pgresult);
	// die();
?>

@section('header')
<header class="masthead" style="background-image: url('{{asset('/storage/page/'.$pgresult[0]->image)}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">{{$pgresult[0]->description}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('container')
	@foreach($result as $list)
		<div class="post-preview">
			<a href="{{url('/post/'.$list->id)}}">
				<h2 class="post-title">{{$list->title}}</h2>
				<h4 class="post-subtitle">{{$list->short_desc}}</h4>
			</a>
			<p class="post-meta">
				Posted on {{$list->post_date}}
			</p>
		</div>
		<!-- Divider-->
		<hr class="my-4" />
	@endforeach
	<!-- Pager-->
	<!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#">Older Posts →</a></div> -->
@endsection