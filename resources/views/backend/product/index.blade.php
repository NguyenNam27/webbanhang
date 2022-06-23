@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        DANH SÁCH QUẢN LÝ SẢN PHẨM <a href="{{route('admin.product.create')}}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> QUẢN LÝ SẢN PHẨM </a></li>
      </ol>
    </section>

<section class="content">

     <div class="row">
       <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Danh Sách Sản Phẩm</h3>
            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif


            <div class="box-body">
                <table class="table table-border">
                  <tbody>
                            <tr>
                                <th style="width:10px">STT</th>

                                <th>name</th>
                                <th style="width:10px">quantity</th>
                                <th>slug</th>
                                <th>category</th>
                                <th>brand</th>
                                <th>desc</th>
{{--                                <th>content</th>--}}
                                <th>price</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Hành Động</th>
                            </tr>
                          @foreach($data as $key => $item)
                            <tr class="item-{{ $item->product_id }}">
                                <td>{{ $key+1 }}</td>

                                <td>{{ $item->product_name }}</td>
                                <td >{{ $item->product_quantity }}</td>
                                <td>{{ $item->product_slug }}</td>
                                <td>{{ @$item->category->category_name }}</td>
                                <td>{{ @$item->Brand->brand_name }}</td>
                                <td>{{ strip_tags($item->product_desc) }}</td>
{{--                                <td>{{ strip_tags($item->product_content) }}</td>--}}
                                <td>{{number_format($item->product_price)}}</td>

                                <td><img src="/upload/product/{{($item->product_image)}}" width="80" height="100px" ></td>

                                <td>{{($item->product_status==0) ? 'Hiển thị' : 'Không hiển thị'}}</td>
                                <td>

                                  <a  href="{{route('admin.product.edit',['product_id'=>$item->product_id])}}" class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                   <button data-id="{{$item->product_id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                  </tbody>
                </table>


            <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
         </div>
       </div>

     </div>

     </div>
    </section>
@endsection
@section('my_js')
<script type="text/javascript">
        $(document).ready(function() {
            // Thiết lập csrf => chổng giả mạo
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('.btn-delete').on('click',function () {

                let id = $(this).data('id');

                let result = confirm("Bạn có chắc chắn muốn xóa ?");

                if (result) { // neu nhấn == ok , sẽ send request ajax

                    $.ajax({
                        url: '/admin/product/'+id, // http://webthucpham.local:8888/user/8
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {
                            // dữ liệu truyền sang nếu có
                            name : 'dung'
                        },
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {

                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                $('.item-'+id).remove();
                            }
                            window.location.href = '/admin/product';
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e);
                        }
                    });
                }

            });

            /*$( ".btn-delete" ).click(function() {
                alert( "Handler for .click() called." );
            });*/

        });
    </script>
@endsection
