@extends('frontend.layout')
@section('content')


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
                        <h2 class="title text-center">Chi Tiết Sản Phẩm</h2>
                        <div class="col-sm-9 padding-right">
                            <div class="product-details"><!--product-details-->
                                @foreach($product_detail as $key => $detail)
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="/upload/product/{{$detail->product_image}}" alt="">
                                        <h3>ZOOM</h3>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="/frontend/images/product-details/new.jpg" class="newarrival" alt="">
                                        <h2>{{$detail->product_name}}</h2>
                                        <p>Web ID: 1089772</p>
                                        <img src="/frontend/images/product-details/rating.png" alt="">
                                        <span>
                                            <span>Giá:{{number_format($detail->product_price)}}VND</span>
                                            <span><h3>Quantity:{{$detail->product_quantity}}</h3></span>
                                             <span>
                                                <input type="text" value="3">
                                                <button type="button" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                             </span>
								        </span>
                                        <p><h4><strong>Brand: {{@$detail->brand_name}}</strong></h4> </p>
                                        <p><h4><strong>Category:{{@$detail->category_name}}</strong></h4></p>

                                    </div><!--/product-information-->

                                </div>
                                    <h3>Bài Viết Đánh Giá</h3>
                                    <p>{{strip_tags($detail->product_desc)}}</p><br>
                                    <p>{{strip_tags($detail->product_content)}}</p>
                                @endforeach
                            </div><!--/product-details-->

{{--                            <div class="category-tab shop-details-tab"><!--category-tab-->--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <ul class="nav nav-tabs">--}}

{{--                                        <li class="active"><a href="#reviews" data-toggle="tab">Reviews </a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="tab-content">--}}






{{--                                    <div class="tab-pane fade active in" id="reviews">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>--}}
{{--                                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>--}}
{{--                                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p>{{strip_tags($detail->product_content)}}</p>--}}


{{--                                            <form action="#">--}}
{{--										<span>--}}
{{--											<input type="text" placeholder="Your Name">--}}
{{--											<input type="email" placeholder="Email Address">--}}
{{--										</span>--}}
{{--                                                <textarea name=""></textarea>--}}
{{--                                                <b>Rating: </b> <img src="/frontend/images/product-details/rating.png" alt="">--}}
{{--                                                <button type="button" class="btn btn-default pull-right">--}}
{{--                                                    Submit--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div><!--/category-tab-->--}}

                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#details" data-toggle="tab">Details</a></li>
                                        <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                        <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                        <li class="active"><a href="#reviews" data-toggle="tab">Reviews </a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="details" >
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery1.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery2.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery3.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery4.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="companyprofile" >
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery1.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery3.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery2.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery4.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tag" >
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery1.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery2.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery3.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/home/gallery4.jpg" alt="" />
                                                        <h2>$56</h2>
                                                        <p>Easy Polo Black Edition</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade active in" id="reviews" >
                                        <div class="col-sm-12">
                                            <ul>
                                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <p><b>Write Your Review</b></p>

                                            <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                                <textarea name="" ></textarea>
                                                <b>Rating: </b> <img src="/frontend/images/product-details/rating.png" alt="" />
                                                <button type="button" class="btn btn-default pull-right">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div><!--/category-tab-->


                            <div class="recommended_items"><!--recommended_items-->

                                <h2 class="title text-center">Sản Phẩm Liên Quan</h2>

                                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($product_feature as $key => $fea)

                                                @if($key % 3 == 0)
                                                    <div class="item {{$key == 0 ? 'active' : ''}}">
                                                    @endif
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/upload/product/{{$fea->product_image}}" alt=""  />
                                                            <h2>{{number_format($fea->product_price)}} VNĐ</h2>
                                                            <p>{{$fea->product_name}}</p>
                                                            <a href="{{route('cart.add',['product_id'=>$fea->product_id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="{{route('product.detail',['product_id'=>$fea->product_id])}}"><i class="fa fa-plus-square"></i>Detail-product</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                                        @if($key % 3 == 2)
                                                            </div>
                                                            @endif

                                            @endforeach

                                    </div>

                                </div>
                                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div><!--/recommended_items-->
                        </div>
                    </div>


                </div>
            </div>


    </section>
@endsection
