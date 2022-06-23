@extends('backend.home.layout')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Chào mừng bạn đến với Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3><p class="login-box-msg"><b>LOGIN</b></p></h3>
      @if(session()->has('error'))
          <div class="alert alert-error">{{session()->get('error')}}</div>
      @endif
    <form action="{{route('admin.postLogin')}}" method="post"  >
    @csrf

      <div class="form-group has-feedback">
        <input type="email" class="form-control" name = "email" placeholder="Nhập email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name = "password" placeholder="Nhập password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection
