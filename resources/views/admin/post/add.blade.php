@extends('admin/layout.layout')
@section('page_title','Manage Post')
@section('container')
<div class="">
   <div class="page-title">
      <div class="title_left">
         <h3>Manage Post</h3>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 ">
         <div class="x_panel">
            <div class="x_content">
               <br/>
               <form class="form-horizontal form-label-left" action="{{url('/admin/post/submit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                     <label class="control-label col-md-3 col-sm-3 ">Title</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control mb-2" placeholder="Title" name="title">
                        @error('title')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Short Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="short_desc"></textarea>
                        @error('short_desc')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="long_desc" rows="8"></textarea>
                        @error('long_desc')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Image</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input class="form-control mb-2" id="formFileSm" type="file" name="image">
                        @error('image')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Post Date</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="date" name="post_date" class="form-control mb-2">
                        @error('post_date')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                     <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection