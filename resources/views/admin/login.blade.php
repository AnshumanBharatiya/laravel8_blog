<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{@config('constant.site_name')}}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin_asset/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet">
    <style>
      .msg{
        color: red;
        font-weight:bold;
        font-size: 18px;
      }
    </style>
  </head>
  <body class="login">
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="{{url('/admin/login_submit')}}" method='post'>
            @csrf
            <h1>Login Form</h1>
            <div>
              <input type="email" class="form-control" placeholder="Email" name="email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
              <span class="msg">{{session('msg')}}</span>
            <div>
              <input type="submit" class="btn btn-success btn-block submit mt-3" name="submit">
            </div>
            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </body>
</html>