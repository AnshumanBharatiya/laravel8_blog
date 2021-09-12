@extends('admin/layout.layout')
@section('page_title','Post Listing')
@section('container')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Post</h3>
			<h2><a href="/admin/post/add" class="btn btn-primary btn-sm">Add Post</a></h2>
			<div class="text-success">
				<h4>{{session('msg')}}</h4>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable" class="table table-responsive-sm table-striped table-bordered table-hover text-center" style="width:100%">
									<thead>
										<tr>
											<th width="2%">ID</th>
											<th width="24%">Title</th>
											<th width="33%">Short Description</th>
											<th width="15%">Image</th>
											<th width="10%">Date</th>
											<th width="16%" colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($result as $list)
										<tr>
											<td>{{$list->id}}</td>
											<td>{{$list->title}}</td>
											<td>{{$list->short_desc}}</td>
											<td><img src="{{asset('/storage/post/'.$list->image)}}" alt="" width="150" height="100" class="img-fluid"></td>
											<td>{{$list->post_date}}</td>
											<td><a href="{{url('/admin/post/edit/'.$list->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
											<td><a href="{{url('/admin/post/delete/'.$list->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection