@extends('frontend.layout')
@section('content')
@if(count($listProduct)>0)
    <section id="cart_items">
        <div class="container-fluid" >
            <div class="breadcrumbs" style="margin-left: 15%">
                <ol class="breadcrumb" >
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info" style="margin-left: 15%;margin-right: 15%">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu" >
                        <td class="image">Image</td>
                        <td class="description" >Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listProduct as $list)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="/upload/product/{{$list->options->image}}" alt="" height="70rem"></a>
                        </td>
                        <td class="cart_description">
                            <h5 style="text-align: center"><a href="">{{$list->name}}</a></h5>
{{--                            <p>Web ID: 1089772</p>--}}
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($list->price,0,",",".")}} vnđ</p>
                        </td>
                        <td class="cart-product-quantity" width="130px">
                            <input type="hidden" class="product_id {{$list->rowId }}"
                                   value="{{ $list->rowId }}">
                            <div class="input-group quantity">
                                <div class="input-group-prepend"
                                     style="cursor: pointer">
                                    <span class="diff" data-id="{{$list->id}}">-</span>
                                </div>

                                <input id="qty-input-" type="text" class="form-control" maxlength="2"
                                       max="10" value="{{$list->qty}}" style="text-align: center" disabled>

                                <div class="input-group-append"
                                     style="cursor: pointer">
                                    <span class="add" data-id="{{$list->id}}">+</span>
                                </div>
                            </div>
                        </td>
                        <td class="cart_total" style="position: relative;left: 1.5rem">
                            <p class="cart_total_price">{{number_format($list->qty*$list->price,0,",",".")}} vnđ</p>
                        </td>
                        <td class="cart_delete">
                            <button data-id = "{{$list->rowId}}" class="cart_quantity_delete"> <i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    @endforeach
{{--        @if(session::get('cart'))--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <form method="POST" action="{{route('check.coupon')}}" style="position: relative;left: 100rem" >--}}
{{--                            @csrf--}}
{{--                                <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>--}}
{{--                                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--        @endif--}}
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area" style="position: relative;left: 8%">
                        <ul>
                            <li style="font-size: 2rem">Tổng <span><strong>{{$total}}</strong> </span></li>
                            <li style="font-size: 2rem">Thuế <span>thuế....</span></li>
                            <li style="font-size: 2rem">Phí vận chuyển <span>Free</span></li>
                            <li style="font-size: 3rem">Thành tiền <span>tổng</span></li>
                        </ul>
                        <a class="btn btn-danger btn-delete" style="position: relative; " href="">Hủy đặt hàng</a>
                        <a class="btn btn-default check_out" href="">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@else
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">

                <h1 style="text-align: center">Không có sản phẩm trong giỏ</h1>

                {{--                <tr>--}}

                {{--                    <td colspan="3" class="hidden-xs"> </td>--}}
                {{--                    <td class="hidden-xs text-center "><strong >Tổng tiền :<h2 style="position: relative" >{{$total}}<span>VNĐ</span></h2> </strong>--}}
                {{--                    </td>--}}
                {{--                    <td><a href="{{route('order.product')}}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>--}}
                {{--                    </td>--}}
                {{--                    <td>--}}
                {{--                        <a href="" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>--}}
                {{--                        <a href="" class="btn btn-warning"><i class="fa fa-angle-left"></i> Huỷ Đơn Hàng</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}

            </div>
        </div>



    </section> <!--/#cart_items-->


@endif

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            // Thiết lập csrf => chổng giả mạo
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })
            $('.cart_quantity_delete').on('click',function (){
                let result = confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng?');
                if (result ==true) {
                        var rowId = $(this).attr('data-id');
                        $.ajax({
                            url: 'gio-hang/xoa-san-pham/'+rowId,
                            type: 'get',
                            data:{
                                id:rowId,
                            },
                            dataType:"json",
                            success:function (response){
                                $('#cart_items').html(response)
                                // console.log(reponse);

                            }
                        })
                    }
                window.location.href = "gio-hang/"


            })

            //cập nhập giỏ hàng
            $('.update-qty').on('click',function (e) {

            var rowId = $(this).attr('data-id');
            var input = $(this).parent('.cart_quantity').find('.cart_quantity_input');
            var qty = input.val();
            if (isNaN(qty) || qty < 1){
                alert('Số lượng phải là số nguyên >=1');
                return false;
            }
                $.ajax({
                        url:'gio-hang/cap-nhap-gio-hang/'+rowId,
                        type:'get',
                        data:{
                            rowId:rowId,
                            qty:qty
                        },//dữ liệu truyền sang nếu có
                        dataType:"HTML",
                        success:function (response){
                            if (response != false){
                                $('#cart_items').html(response);
                                // Swal.fire('Any fool can use a computer')
                            }
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
                    // window.location.href = '/gio-hang/'
            })
            });

        // $('.diff').click(function (e) {
        //     e.preventDefault();
        //     var that = $(this);
        //     var num = that.siblings().val();
        //     var id = that.attr('data-id');
        //     var price = that.parent().parent().siblings('.price').attr('data-value');
        //     num--;
        //     if (num < 0) num = 0;
        //     that.siblings().val(num);
        //     $.post('updateCart.php', {'id': id, 'num': num}, function () {
        //         console.log(num);
        //         that.parent().siblings().children().attr('data-value' , num * price);
        //         that.parent().siblings().children().html((num * price).toLocaleString('vi-VN') + ' Đ');
        //         var res=0;
        //         $.each($('.total-pro'), function (index, value) {
        //             var temp = parseFloat($(value).attr('data-value'));
        //             res+=temp;
        //         });
        //         $('#vnd').html(res.toLocaleString('vi-VN') + ' Đ');
        //     });
        });
    </script>
@endsection
