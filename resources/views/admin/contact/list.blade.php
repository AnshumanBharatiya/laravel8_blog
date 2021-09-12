@extends('admin/layout.layout')
@section('page_title','Contact List')
@section('container')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Contact Us</h3>
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
											<th width="20%">Name</th>
											<th width="23%">Email</th>
											<th width="15%">Mobile</th>
											<th width="25%">Message</th>
											<th width="15%">Contact Date</th>
										</tr>
									</thead>
									<tbody>
										@foreach($result as $list)
										<tr>
											<td>{{$list->id}}</td>
											<td>{{$list->name}}</td>
											<td>{{$list->email}}</td>
											<td>{{$list->mobile}}</td>
											<td>{{$list->message}}</td>
											<td>{{$list->added_on}}</td>
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