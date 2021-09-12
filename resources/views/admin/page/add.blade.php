@extends('admin/layout.layout')
@section('page_title','Manage Page')
@section('container')
<div class="">
   <div class="page-title">
      <div class="title_left">
         <h3>Manage Page</h3>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 ">
         <div class="x_panel">
            <div class="x_content">
               <br/>
               <form class="form-horizontal form-label-left" action="{{url('/admin/page/submit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                     <label class="control-label col-md-3 col-sm-3 ">Name</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control mb-2" placeholder="Name" name="name">
                        @error('name')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="slug"></textarea>
                        @error('slug')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Description</label>
                     <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control mb-2"  name="description" rows="8"></textarea>
                        @error('description')
                        <span class='text-danger font-weight-bold'>{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 ">Page Image</label>
                     <div class="col-md-9 col-sm-9 ">
                        <input class="form-control mb-2" id="formFileSm" type="file" name="image">
                        @error('image')
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