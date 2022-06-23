@extends('frontend.layout')
@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($slide as $key=>$slide)
                                @php
                                    $i++;
                                @endphp
                                <div class="item {{$i == 1 ?'active':''}}">

                                    <div class="col-sm-12">
                                        <img src="upload/slider/{{$slide->slider_image}}"  class="img img-responsive" alt="{{$slide->slider_desc}}" />

                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">

                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">

                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>


                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a  href="{{route('category.index',['category_id'=>$cate->category_id])}}">

                                                {{$cate->category_name}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="sportswear" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li value="">Kids</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->


                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương Hiệu Sản Phẩm</h2>

                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key=>$brand)
                                        <li><a href="{{route('brand.brand_slug',['brand_id'=>$brand->brand_id])}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="/frontend/images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--loại sản phẩm-->
                        <h2 class="title text-center">Loại Sản Phẩm</h2>
                        @foreach($detail_category as $key=>$product_detail)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/upload/product/{{$product_detail->product_image}}" alt="" height="250px" />
                                            <h2>{{number_format($product_detail->product_price)}} VNĐ</h2>
                                            <p style="font-size: 10px">{{$product_detail->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{number_format($product_detail->product_price)}} VNĐ</h2>
                                                <p>{{$product_detail->product_name}}</p>
                                                <a href="{{route('cart.add',['product_detail'=>$product_detail->product_id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div class = "box-footer clearfix">
                        {{$detail_category->links()}}
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
