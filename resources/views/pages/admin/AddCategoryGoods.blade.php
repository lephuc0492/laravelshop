@extends('pages/admin/AdminLayout')
@section('AddCategoryGoods')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm hàng hóa
                        </header>
                        <?php 
                        $session_AddCategoryGoods = Session::get('message_add_goods');
                        if (isset($session_AddCategoryGoods)) 
                        {
                        echo $session_AddCategoryGoods;
                        Session::put('message_add_goods', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/import-category-goods')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hàng hóa</label>
                                    <input type="text" class="form-control" placeholder="Enter name's goods" name="name_category_goods">
                                </div>

                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Miêu tả</label>

                                <textarea class="form-control " id="ccomment" name="desc_category_goods" required="" style="clear: both; resize: none;" rows="5"></textarea>

                                </div>

                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Nội dung hàng hóa</label>

                                <textarea class="form-control " id="ccomment" name="content_category_goods" required="" style="clear: both; resize: none;" rows="5"></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" class="form-control" placeholder="Enter price goods" name="price_category_goods">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label><br>
                                    <img class="img-goods" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png">
                                    <input type="file" class="form-control add-load-image-goods" name="image_category_goods"  onchange="previewImage()">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục sản phẩm</label>
								<select class="form-control input-sm m-bot15" name="product_id_category_goods">
                                @foreach($get_data_product_id as $key => $value)
                                <option value="{{$value->id}}">{{$value->name_category_product}}</option>
                                @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc thương hiệu</label>
                                <select class="form-control input-sm m-bot15" name="brand_id_category_goods">
                                @foreach($get_data_brand_id as $key => $value)
                                <option value="{{$value->id}}">{{$value->name_category_brand}}</option>
                                @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name="show_category_goods">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                </select>
                                </div>

                                <div style="text-align: center;" class="form-group"><button type="submit" class="btn btn-info">Thêm</button></div>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@stop