@extends('frontend.layout')
@section('content')
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
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
                                    $i++
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
            </div><br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="{{route('post.contact')}}" class="contact-form row"  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control"  placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="number" name="phone" class="form-control" required="required" placeholder="phone">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="content" id="content"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-primary pull-right" >
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p>E-Shopper Inc.</p>
                            <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                            <p>Newyork USA</p>
                            <p>Mobile: +2346 17 38 93</p>
                            <p>Fax: 1-714-252-0026</p>
                            <p>Email: info@e-shopper.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->
@endsection
