@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <!-- Content Header  -->
    <section class="content-header">
      <h1>
        Sửa thông tin người dùng <a href="{{route('admin.user.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách người dùng</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sửa thông tin người dùng</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nhập thông tin người dùng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  action="{{route('admin.user.update',['id'=> $edit->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="box-body">
            <div class="col-md-6">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input value="{{$edit->email}}" type="email" class="form-control" name ="email" id="email" placeholder="Enter email">
                  @if($errors->has('email'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('email')}}
                    </label>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input value="{{$edit->password}}" type="password" class="form-control" name ="password" id="password" placeholder="Enter Password">
                  @if($errors->has('password'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('password')}}
                    </label>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input value="{{$edit->name}}" type="text" class="form-control" name="name" id="name" placeholder="Enter full_name">
                  @if($errors->has('name'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('name')}}
                    </label>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input value="{{$edit->phone}}" type="number" class="form-control" name ="phone" id="phone" placeholder="Enter phone">
                  @if($errors->has('phone'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('phone')}}
                    </label>
                  @endif
                </div>

                
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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