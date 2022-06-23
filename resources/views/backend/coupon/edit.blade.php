@extends('backend.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chỉnh Sửa Mã Giảm Giá <a href="{{route('admin.coupon.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách Mã Giảm Giá</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="#"> Mã Giảm Giá </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông Tin Mã Giảm Giá Mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action = "{{route('admin.coupon.update',['coupon_id'=>$edit->coupon_id])}}" method = "post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên mã giảm giá mới</label>
                                        <input value="{{$edit->coupon_name}}" data-validation="required"  data-validation-error-msg ="Điền tên mã giảm giá có ít nhất 1 ký tự"
                                               type="text" class="form-control" name="coupon_name" id="coupon_name"
                                               placeholder="Enter coupon_name">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng </label>
                                        <input value="{{$edit->coupon_time}}" class="form-control" type="text" id="brand_slug" name="coupon_time" >


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tính năng mã</label>
                                        <select  name = "coupon_condition" class="form-control input-sm m-bot15">
                                            <option value="0">----Chọn----</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                                        <input value="{{$edit->coupon_number}}" class="form-control" type="text" id="brand_slug" name="coupon_number" >

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã giảm giá mới</label>
                                        <input value="{{$edit->coupon_code}}" class="form-control" type="text" id="brand_slug" name="coupon_code" >


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
                                <button type="submit" class="btn btn-primary">Câp nhập mã</button>
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
@section('scripts')
    {{--    <script type="text/javascript">--}}


    {{--        $('#brand_name').keyup(function(event) {--}}


    {{--            var title, slug;--}}

    {{--            //Lấy text từ thẻ input title --}}
    {{--            title = document.getElementById("brand_name").value;--}}

    {{--            //Đổi chữ hoa thành chữ thường--}}
    {{--            slug = title.toLowerCase();--}}

    {{--            //Đổi ký tự có dấu thành không dấu--}}
    {{--            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');--}}
    {{--            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');--}}
    {{--            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');--}}
    {{--            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');--}}
    {{--            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');--}}
    {{--            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');--}}
    {{--            slug = slug.replace(/đ/gi, 'd');--}}
    {{--            //Xóa các ký tự đặt biệt--}}
    {{--            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');--}}
    {{--            //Đổi khoảng trắng thành ký tự gạch ngang--}}
    {{--            slug = slug.replace(/ /gi, " - ");--}}
    {{--            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang--}}
    {{--            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng--}}
    {{--            slug = slug.replace(/\-\-\-\-\-/gi, '-');--}}
    {{--            slug = slug.replace(/\-\-\-\-/gi, '-');--}}
    {{--            slug = slug.replace(/\-\-\-/gi, '-');--}}
    {{--            slug = slug.replace(/\-\-/gi, '-');--}}
    {{--            //Xóa các ký tự gạch ngang ở đầu và cuối--}}
    {{--            slug = '@' + slug + '@';--}}
    {{--            slug = slug.replace(/\@\-|\-\@|\@/gi, '');--}}
    {{--            //In slug ra textbox có id “slug”--}}
    {{--            $('#brand_slug').val(slug);--}}

    {{--        });--}}
    {{--    </script>--}}
@endsection


