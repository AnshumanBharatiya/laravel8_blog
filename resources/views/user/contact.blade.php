@extends('user/layout.layout')
@section('page_title','Contact')
@section('header')
<header class="masthead" style="background-image: url('{{asset('/storage/page/'.$pgresult[0]->image)}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Us</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('container')
<p>{{$pgresult[0]->description}}</p>
<div class="my-5">
    <form id="contactForm" action="{{url('/contact/submit/')}}" method="post">
        @csrf
        <div class="form-floating">
            <input class="form-control my-3" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" name="name"/>
            <label for="name">Name</label>
            @error('name')
            <span class='text-danger font-weight-bold'>{{$message}}</span>
            @enderror           
        </div>
        <div class="form-floating">
            <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" name="email"/>
            <label for="email">Email address</label>
            @error('email')
            <span class='text-danger font-weight-bold'>{{$message}}</span>
            @enderror          
        </div>
        <div class="form-floating">
            <input class="form-control" id="phone" type="text" placeholder="Enter your phone number..." data-sb-validations="required" name="mobile"/>
            <label for="phone">Phone Number</label>
            @error('mobile')
            <span class='text-danger font-weight-bold'>{{$message}}</span>
            @enderror           
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required" name="message"></textarea>
            <label for="message">Message</label>
            @error('message')
            <span class='text-danger font-weight-bold'>{{$message}}</span>
            @enderror          
        </div>
        <!-- Submit Button-->
        <input type="submit" class="btn btn-primary text-uppercase" id="submitButton" value="Send">
        <div class="text-success mt-3">
            <span>{{session('msg')}}</span>
        </div>
    </form>
</div>
@endsection