@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm thông tin USER <a href="{{route('admin.user.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách USER</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">thêm thông tin USER</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nhập thông tin USER</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action = "{{route('admin.user.store')}}" method = "post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
            <div class="col-md-6">
             
              <div class="form-group">
                  <label for="exampleInputEmail1">admin_email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter admin_email">
                  @if($errors->has('admin_email'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('admin_email')}}
                    </label>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">admin_password </label>
                  <input type="password" class="form-control" name ="password " id="password " placeholder="Enter admin_password">
                  @if($errors->has('admin_password'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('admin_password')}}
                    </label>
                  @endif
                </div>
                

                <div class="form-group">
                  <label for="exampleInputPassword1">admin_name</label>
                  <input type="text" class="form-control" name ="name" id="name" placeholder="Enter admin_name">
                  @if($errors->has('name'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('name')}}
                    </label>
                  @endif
                </div>

                <div class="form-group"> 
                  <label for="exampleInputPassword1">admin_phone</label>
                  <input type="text" class="form-control" name ="phone" id="phone" placeholder="Enter admin_phone">
                  @if($errors->has('phone'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('phone')}}
                    </label>
                  @endif
                </div>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="remember"> Check me out
                  </label>
                </div>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
@endsection
