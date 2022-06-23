@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Slide <a href="{{route('admin.slide.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách slide</a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Slide </a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nhập thông tin slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action = "{{route('admin.slide.store')}}" method = "post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
            <div class="col-md-6">
             
              <div class="form-group">
                  <label for="exampleInputEmail1">Slider_name</label>
                  <input type="text" class="form-control" name="slider_name" id="slider_name" placeholder="Enter slider_name">
                  @if($errors->has('slider_name'))
                  <label class="Text-redslider_name" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('slider_name')}}
                    </label>
                  @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Slider_image</label>
                    <input type="file" id="slider_image" name="slider_image" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider_status </label>
                  <input type="text" class="form-control" name ="slider_status" id="slider_status" placeholder="Enter slider_status">
                  @if($errors->has('slider_status'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('slider_status')}}
                    </label>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider_desc</label>
                  <input type="text" class="form-control" name ="Slider_desc" id="Slider_desc" placeholder="Enter Slider_desc">
                  @if($errors->has('slider_desc'))
                  <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                              <i class="fa fa-info"></i>{{$errors->first('slider_desc')}}
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
