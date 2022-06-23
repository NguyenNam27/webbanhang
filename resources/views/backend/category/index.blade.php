@extends('backend.layout.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                QUẢN LÝ DANH MỤC <a href="{{route('admin.category.create')}}" class="btn bg-purple btn-flat"><i
                        class="fa fa-plus"></i> Thêm danh mục</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-user"></i> QUẢN LÝ DANH MỤC </a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách DANH MỤC</h3>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        <div class="box-body">
                            <table class="table table-border">
                                <tr>
                                    <th style="width:10px">STT</th>
                                    <th>meta_keywords</th>
                                    <th>category_name</th>
                                    <th>slug_category_product</th>
                                    <th>category_desc</th>
                                    <th>category_status</th>
                                    <th>Hành Động</th>
                                </tr>
                                @foreach($data as $key => $item)
                                    <tr class="item-{{ $item->category_id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->meta_keywords }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->slug_category_product }}</td>
                                        <td>{{ strip_tags($item->category_desc) }}</td>
                                        <td>{{ ($item->category_status==0) ? 'Hiển thị' : 'Không Hiển thị' }}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit',['category_id'=>$item->category_id])}}"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="{{$item->category_id}}" class="btn btn-danger btn-delete">
                                                <i class="fa fa-trash"></i></button>
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
                $(document).ready(function () {
                    // Thiết lập csrf => chổng giả mạo
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })

                    $('.btn-delete').on('click', function () {

                        let id = $(this).data('id');

                        let result = confirm("Bạn có chắc chắn muốn xóa ?");

                        if (result) { // neu nhấn == ok , sẽ send request ajax

                            $.ajax({
                                url: '/admin/category/' + id, // http://webthucpham.local:8888/user/8
                                type: 'DELETE', // phương truyền tải dữ liệu
                                data: {
                                    // dữ liệu truyền sang nếu có
                                    name: 'dung'
                                },
                                dataType: "json", // kiểu dữ liệu muốn nhận về
                                success: function (res) {

                                    if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                        $('.item-' + id).remove();
                                    }
                                    window.location.href = '/admin/category';
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
