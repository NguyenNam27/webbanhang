@extends('frontend.layout')
@section('content')


    <section class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-3">
                    <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
{{--                                        @if(isset($cart_data))--}}
{{--                                            @if(Cookie::get('shopping_cart'))--}}
{{--                                                @php $total= 0 @endphp--}}

                    <div class="shopping-cart">
                        <div class="shopping-cart-table">
                            <div class="table-responsive">
                                <div class="col-md-12 text-right mb-3">
                                    <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                </div>
                                <table class="table table-bordered my-auto  text-center">
                                    <thead>
                                    <tr>
                                        <th class="cart-description">Image</th>
                                        <th class="cart-product-name">Product Name</th>
                                        <th class="cart-price">Price</th>
                                        <th class="cart-qty">Quantity</th>
                                        <th class="cart-total">Grandtotal</th>
                                        <th class="cart-romove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody class="my-auto">
                                    @foreach($listProduct as $list)
                                                                                <tr class="cartpage">
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="javascript:void(0)">
                                                    <img src="/upload/product/{{($list->options->image)}}"
                                                         height="50rem" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'>
                                                    {{--                                                            <a href="javascript:void(0)">{{ $data['item_name'] }}</a>--}}
                                                    <a href="javascript:void(0)"
                                                       style="color: black"> {{$list->name}}</a>

                                                </h4>
                                            </td>
                                            <td class="cart-product-sub-total" style="position: relative;top: 2rem">
                                                <strong class="cart-sub-total-price">{{number_format($list->price)}}đ </strong>
                                            </td>
                                            <td class="cart-product-quantity" width="130px">
                                                <input type="hidden" class="product_id {{$list->rowId }}"
                                                       value="{{ $list->rowId }}">
                                                <div class="input-group quantity">
                                                    <div class="input-group-prepend" onclick="decrement(this,{{$loop->index}},{{$list->price}})"
                                                         style="cursor: pointer">
                                                        <span class="input-group-text">-</span>
                                                    </div>

                                                    <input id="qty-input-{{$loop->index}}" type="text" class="form-control" maxlength="2"
                                                           max="10" value="{{$list->qty}}" style="text-align: center" disabled>

                                                    <div class="input-group-append" onclick="increment(this,{{$loop->index}},{{$list->price}})"
                                                         style="cursor: pointer">
                                                        <span class="input-group-text">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart-product-grand-total" style="position: relative;top: 2rem">
                                                <strong
                                                    class="cart-grand-total-price" id="total-price-{{$loop->index}}"> {{number_format($list->qty*$list->price,0,",",".")}}đ</strong>
                                            </td>
                                            <td style="font-size: 20px;">
                                                <button data-id="{{$list->rowId}}" class="delete_cart_data">
                                                    <li class="fa fa-trash-o"></li>
                                                    Delete
                                                </button>
                                            </td>
{{--                                            @php $total = $total + ($list['qty'] * $list["price"]) @endphp--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table><!-- /table -->
                            </div>
                        </div><!-- /.shopping-cart-table -->
                        <div class="row">

                            <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                <div>
                                    <a href="" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                </div>
                            </div><!-- /.estimate-ship-tax -->

                            <div class="col-md-4 col-sm-12 ">
                                <div class="cart-shopping-total">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="cart-subtotal-name">Subtotal</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="cart-subtotal-price">
                                                Rs.
                                                <span class="cart-grand-price-viewajax"> {{$total}}đ</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="cart-grand-name">Grand Total</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="cart-grand-price">
                                                Rs.
                                                <span class="cart-grand-price-viewajax">{{$total}}đ</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="cart-checkout-btn text-center">
                                                {{--                                                        @if (Auth::user())--}}
                                                {{--                                                            <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>--}}
                                                {{--                                                        @else--}}
                                                {{--                                                            <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>--}}
                                                {{--                                                            --}}{{-- you add a pop modal for making a login --}}
                                                {{--                                                        @endif--}}
                                                <h6 class="mt-3">Checkout with Fabcart</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.shopping-cart -->
{{--                                            @endif--}}
{{--                                        @else--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-12 mycard py-5 text-center">--}}
{{--                                                    <div class="mycards">--}}
{{--                                                        <h4>Your cart is currently empty.</h4>--}}
{{--                                                        <a href="" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

                </div>
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
@section('script')
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $('.delete_cart_data').on('click', function () {
                let result = confirm('bạn có muốn xóa sản phẩm khỏi giỏ hàng');
                if (result ) {
                    var rowId = $(this).attr('data-id');
                    $.ajax({
                        url: 'gio-hang/xoa-san-pham/'+rowId,
                        type: 'delete',
                        data: {
                            id: rowId,
                        },
                        dataType: "json",
                        success: function (response) {
                            $('.row').html(response)
                            // console.log(response);

                        }
                    })
                }
                window.location.href = "/gio-hang/"

            })


        });

        function increment(that,index,price){
            var incre_value = $(that).parents().find('#qty-input-'+index);
            let value = parseInt(incre_value.val(), 10); //chuyển chuỗi thành số nguyên sang hệ cơ số 10
            value = isNaN(value) ? 0 : value;//
            if (value < 10 ) {
                value++;
                incre_value.val(value);
                let a = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price*value);
                $('#total-price-'+index).html(a);
            }
        }

        function decrement(that,index,price){
            // console.log('aaaa')
            var decre_value = $(that).parents().find('#qty-input-'+index);
            let value_dec = parseInt(decre_value.val(), 10); //chuyển chuỗi thành số nguyên sang hệ cơ số 10
            value = isNaN(value_dec) ? 0 : value_dec;//
            if (value >1) {
                value--;
                decre_value.val(value);
                let b = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price*value);
                $('#total-price-'+index).html(b);
            }
        }
    </script>
@endsection

