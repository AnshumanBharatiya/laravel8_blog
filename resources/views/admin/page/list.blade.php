@extends('admin/layout.layout')
@section('page_title','Page Listing')
@section('container')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Page</h3>
			<h2><a href="{{url('/admin/page/add/')}}" class="btn btn-primary btn-sm">Add Page</a></h2>
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
											<th width="10%">Page Name</th>
											<th width="15%">Slug</th>
											<th width="30%">Description</th>
											<th width="18%">Image</th>
											<th width="10%">Date</th>
											<th width="15%" colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($result as $list)
										<tr>
											<td>{{$list->id}}</td>
											<td>{{$list->name}}</td>
											<td>{{$list->slug}}</td>
											<td>{{$list->description}}</td>
											<td><img src="{{asset('/storage/page/'.$list->image)}}" alt="" width="150" height="100" class="img-fluid"></td>
											<td>{{$list->added_on}}</td>
											<td><a href="{{url('/admin/page/edit/'.$list->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
											<td><a href="{{url('/admin/page/delete/'.$list->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
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