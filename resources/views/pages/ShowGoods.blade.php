@extends('welcome')
@section('show-goods') 
                <div class="col-sm-9 padding-right">
                        <h2 class="title text-center">DANH SÁCH HÀNG HÓA</h2>
                    <div class="features_items"><!--features_items-->
                        @foreach($list_show_goods as $key => $value_goods)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <!-- Add in formation goods -->
                                        <div class="productinfo text-center">
                                            <img src="{{$value_goods->image_category_goods}}" alt="" />
                                            <h2>{{number_format($value_goods->price_category_goods).' VND'}}</h2>
                                            <p>{{$value_goods->name_category_goods}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </div>

                                        <!-- Overlay 
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                        Overlay -->
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Danh sách ưa thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach                       
                    </div>
                    <!--features_items-->
@stop

@section('banner') 

                        <div class="carousel-inner">

                            <!-- Banner !-->

                            @foreach ($list_show_goods as $key => $value_goods)
                            @if ($key == 0)
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>MẠIZ</span> ZÔ</h1>
                                    <h2>{{$value_goods->name_category_goods}}</h2>
                                    <p>{{$value_goods->content_category_goods}}</p>
                                    <button type="button" class="btn btn-default get">Mua hàng</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{$value_goods->image_category_goods}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/pricing 2.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            @elseif ($key < 3)
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>MẠIZ</span> ZÔ</h1>
                                    <h2>{{$value_goods->name_category_goods}}</h2>
                                    <p>{{$value_goods->content_category_goods}}</p>
                                    <button type="button" class="btn btn-default get">Mua hàng</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{$value_goods->image_category_goods}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/pricing 2.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>                            
                            @endif
                            @endforeach

                            <!-- Banner !-->

                        </div>

@stop

    <!--                     <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public/frontend/images/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public/frontend/images/girl2.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public/frontend/images/girl3.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/pricing.png')}}" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div> -->