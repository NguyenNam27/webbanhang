@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        DANH SÁCH QUẢN LÝ USER <a href="{{route('admin.user.create')}}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> QUẢN LÝ USER </a></li>
      </ol>
    </section>

<section class="content">

     <div class="row">
       <div class="col-md-12">
         <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">Danh Sách USER</h3>

            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif


            <div class="box-body">
                <table class="table table-border">
                  <tbody>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>admin_email</th>
                                <th>admin_password</th>
                                <th>admin_name</th>
                                <th>admin_phone</th>

                                <th>Hành Động</th>
                            </tr>
                          @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}">
                                <td>{{ $key +1}}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>


                                <td>

                                  <a  href="{{route('admin.user.edit',['edit'=>$item->id])}}" class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                   <button data-id="{{$item->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                  </tbody>
                </table>
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
                        url: '/admin/user/'+id, // http://webthucpham.local:8888/user/8
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
                            window.location.href = '/admin/user';
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

