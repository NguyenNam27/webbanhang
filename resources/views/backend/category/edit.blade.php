@extends('backend.layout.main')
@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <h1>
                SỬA DANH MỤC <a href="{{route('admin.category.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách danh mục</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> DANH MỤC</a></li>
                <li><a href="#"> DANH MỤC </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sửa thông tin danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action = "{{route('admin.category.update',['category_id'=>$edit_category->category_id])}}" method = "post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> New meta_keywords</label>
                                        <input value="{{$edit_category->meta_keywords}}" data-validation="required"  data-validation-error-msg ="Bạn cần nhập meta"
                                               type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                               place holder="Enter meta_keywords">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New category_name</label>
                                        <input value="{{$edit_category->category_name}}" data-validation="required"  data-validation-error-msg ="Bạn cần nhập tên danh mục"
                                               type="text" class="form-control" name="category_name" id="category_name"
                                               placeholder="Enter category_name">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">slug_category_product</label>
                                        <input class="form-control" type="text" id="slug_category_product" name="slug_category_product" >


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> New category_desc </label>
                                        <textarea   rows="3" class="form-control" name ="category_desc"
                                                    id="category_desc" ></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New category_status</label>
                                        <input type="number" class="form-control" name ="category_status" id="category_status" placeholder="Enter category_status">

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
@section('scripts')
    <script type="text/javascript">


        $('#category_name').keyup(function(event) {


            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("category_name").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, " - ");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            $('#slug_category_product').val(slug);

        });
    </script>
@endsection


