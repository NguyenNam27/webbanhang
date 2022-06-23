@extends('backend.layout.main')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        DANH SÁCH QUẢN LÝ SLIDE <a href="{{route('admin.slide.create')}}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> QUẢN LÝ SLIDE </a></li>
      </ol>
    </section>

<section class="content">

     <div class="row">
       <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Danh Sách SLIDE</h3>
            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif


            <div class="box-body">
                <table class="table table-border">
                  <tbody>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>slider_name</th>
                                 <th>slider_image</th>
                                  <th>slider_status</th>
                                <th>slider_desc</th>
                                <th>Hành Động</th>
                            </tr>
                          @foreach($data as $key => $item)
                            <tr class="item-{{ $item->slider_id }}">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->slider_name }}</td>
                                <td><img src="/upload/slider/{{($item->slider_image)}}" width="70" ></td>
                                <td>{{ $item->slider_status }}</td>
                                <td>{{ $item->slider_desc }}</td>

                                <td>

                                  <a  href="{{route('admin.slide.edit',['id'=>$item->slider_id])}}" class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                   <button data-id="{{$item->slider_id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
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

                let id = $(this).data("id");
                if (confirm("Bạn có chắc chắn muốn xóa ?")) { // neu nhấn == ok , sẽ send request ajax
                    $.ajax({
                        url: '/admin/slide/'+id,
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {
                            // dữ liệu truyền sang nếu có

                        },
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {
                          // console.log(res);
                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                $('.item-'+id).remove();
                            }
                            // window.location.href = '/admin/slide';
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
