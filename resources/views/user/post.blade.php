@extends('user/layout.layout')
@section('page_title','Post | '.$result[0]->title)
@section('header')
<header class="masthead" style="background-image: url('{{asset('/storage/post/'.$result[0]->image)}}')">
	<div class="container position-relative px-4 px-lg-5">
		<div class="row gx-4 gx-lg-5 justify-content-center">
			<div class="col-md-10 col-lg-8 col-xl-7">
				<div class="site-heading">
					<h4>{{$result[0]->title}}</h4>
				</div>
			</div>
		</div>
	</div>
</header>
@endsection
@section('container')
<h2 class="section-heading">{{$result[0]->title}}</h2>
<blockquote class="blockquote my-5">"{{$result[0]->short_desc}}"</blockquote>
<p>{{$result[0]->long_desc}}</p>
<i class="post-meta text-danger">Posted on {{$result[0]->post_date}}</i>
@endsection