@extends('admin/layout.layout')
@section('page_title','Manage Page')
@section('container')
<div class="">
   <div class="page-title">
      <div class="title_left">
         <h3>Edit Page</h3>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 ">
         <div class="x_panel">
            <div class="x_content">
               <br/>
               <form class="form-horizontal form-label-left" action="{{url('/admin/page/update/'.$result['0']->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                     <label class="control-label col-md-3 col-sm-3 ">Name</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control mb-2" placeholder="Name" name="name" value="{{$result['0']->name}}">
                        @error('name')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="slug" >{{$result['0']->slug}}</textarea>
                        @error('slug')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="description" rows="8">{{$result['0']->description}}</textarea>
                        @error('description')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Image</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input class="form-control  list-inline" id="formFileSm" type="file" name="image">
                        <span class="text-danger ml-3 mb-3">{{$result['0']->image}}</span>
                        @error('image')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                     <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection