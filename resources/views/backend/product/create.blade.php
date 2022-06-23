@extends('backend.layout.main')
@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <h1>
                THÊM SẢN PHẨM <a href="{{route('admin.product.index')}}" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách sản phẩm</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> SẢN PHẨM</a></li>
                <li><a href="#"> SẢN PHẨM </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{route('admin.product.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product_name</label>
                                        <input data-validation="required"
                                               data-validation-error-msg="Bạn cần nhập product_name"
                                               type="text" class="form-control" name="product_name" id="product_name"
                                               placeholder="Enter product_name">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product_quantity</label>
                                        <input type="text" class="form-control" name="product_quantity"
                                               id="product_quantity"
                                               placeholder="Enter product_quantity">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product_slug</label>
                                        <input class="form-control" type="text" id="product_slug" name="product_slug">

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CategoryProduct</label>
                                        <select class="form-control" name="category_id">
                                            <option value="select"> -- Chọn danh mục --</option>
                                            @foreach($category as $cate )
                                                <option
                                                    value="{{$cate->category_id}}"> {{$cate->category_name}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">BrandProduct</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="select"> -- Chọn Nhà Cung Cấp --</option>
                                            @foreach($brand as $brand)
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product_desc</label>
                                        <input class="form-control" type="text" id="product_desc" name="product_desc"
                                               placeholder="Nhập mô tả">

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product_content </label>
                                        <textarea rows="3" class="form-control" name="product_content"
                                                  id="product_content"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product_price</label>
                                        <input type="number" class="form-control" name="product_price"
                                               id="product_price" placeholder="Enter product_price">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product_image</label>
                                        <input type="file" id="product_image" name="product_image">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product_status</label>
                                        <select class="form-control" name="product_status">
                                            <option value="select"> -- Chọn Nhà Cung Cấp --</option>
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Không hiển thị</option>

                                        </select>

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
                                <button type="submit" class="btn btn-primary">Add</button>
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
        $('#product_name').keyup(function (event) {
            var title, slug;
            //Lấy text từ thẻ input title
            title = document.getElementById("product_name").value;
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
            slug = slug.replace(/ /gi, "-");
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
            $('#product_slug').val(slug);
        });
    </script>
    <script type="text/javascript" src="backend/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.pasteFormWordPromptCleanup = true;
            CKEDITOR.config.pasteFormWordRemoveFontStyles = false;
            CKEDITOR.config.pasteFormWordRemoveStyles = false;
            CKEDITOR.config.language = 'vi';
            CKEDITOR.config.htmlEncodeOutput = false;
            CKEDITOR.config.ProcessHTMLEntities = false;
            CKEDITOR.config.entities = false;
            CKEDITOR.config.entities_latin = false;
            CKEDITOR.config.ForceSimpleAmpersand = true;
            CKEDITOR.replace('product_content');
        });
    </script>
@endsection


