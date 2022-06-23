@extends('frontend.layout')
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="/frontend/images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Điện Thoại Apple</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($mobile as $key=>$mobile)
                                    @if($key % 3 == 0)
                                        <div class="item {{$key == 0 ? 'active' : '' }} ">
                                            @endif
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/upload/product/{{$mobile->product_image}}" alt="" height="250px" />
                                                            <h2>{{number_format($mobile->product_price)}} VNĐ</h2>
                                                            <p>{{$mobile->product_name}}</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="{{route('product.detail',['product_id'=>$mobile->product_id])}}"><i class="fa fa-plus-square"></i>Chi Tiết</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @if($key % 3 ==2)
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center" >Laptop Nổi Bật</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($laptop as $key=>$laptop)

                                        <div class="item active ">

                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/upload/product/{{$laptop->product_image}}" alt="" height="250px" />
                                                            <h2>{{number_format($laptop->product_price)}} VNĐ</h2>
                                                            <p>{{$laptop->product_name}}</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="{{route('product.detail',['product_id'=>$laptop->product_id])}}"><i class="fa fa-plus-square"></i>Chi Tiết</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                @endforeach
                            </div>

                        </div>

                        <h2 class="title text-center" >Ngành Thời Trang Nam</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($thoitrangnam as $key=>$thoitrangnam)

                                    <div class="item active ">

                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/upload/product/{{$thoitrangnam->product_image}}" alt="" height="300px" />
                                                        <h2>{{number_format($thoitrangnam->product_price)}} VNĐ</h2>
                                                        <p>{{$thoitrangnam->product_name}}</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="{{route('product.detail',['product_id'=>$thoitrangnam->product_id])}}"><i class="fa fa-plus-square"></i>Chi Tiết</a></li>
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            </div>

                        </div>

                        <h2 class="title text-center" >Thức ăn vật nuôi</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($thucanthucung as $key=>$thucanthucung)

                                    <div class="item active ">

                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/upload/product/{{$thucanthucung->product_image}}" alt="" height="250px" />
                                                        <h2>{{number_format($thucanthucung->product_price)}} VNĐ</h2>

                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                                    </div>

                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>{{number_format($thucanthucung->product_price)}} VNĐ</h2>
                                                            <p>{{$thucanthucung->product_name}}</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="{{route('product.detail',['product_id'=>$thucanthucung->product_id])}}"><i class="fa fa-plus-square"></i>Chi Tiết</a></li>
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
