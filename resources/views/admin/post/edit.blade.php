@extends('admin/layout.layout')
@section('page_title','Manage Post')
@section('container')
<div class="">
   <div class="page-title">
      <div class="title_left">
         <h3>Edit Post</h3>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 ">
         <div class="x_panel">
            <div class="x_content">
               <br/>
               <form class="form-horizontal form-label-left" action="{{url('/admin/post/update/'.$result['0']->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                     <label class="control-label col-md-3 col-sm-3 ">Title</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control mb-2" placeholder="Title" name="title" value="{{$result['0']->title}}">
                        @error('title')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Short Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="short_desc" >{{$result['0']->short_desc}}</textarea>
                        @error('short_desc')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="long_desc" rows="8">{{$result['0']->long_desc}}</textarea>
                        @error('long_desc')
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
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Post Date</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="date" name="post_date" class="form-control mb-2" value="{{$result['0']->post_date}}">
                        @error('post_date')
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