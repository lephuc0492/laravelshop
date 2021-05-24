@extends('pages.admin.AdminLayout')
@section('UpdateCategoryGoods')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục hàng hóa
                        </header>
                        <?php 
                        $session_EditCategoryGoods = Session::get('message_edit_goods');
                        if (isset($session_AddCategoryGoods)) 
                        {
                        echo $session_AddCategoryGoods;
                        Session::put('message_edit_goods', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/update-category-goods/'.$data_get_id_goods->goods_id)}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hàng hóa</label>
                                    <input type="text" class="form-control" placeholder="Enter name's goods" name="name_category_goods" value="{{$data_get_id_goods->name_category_goods}}">
                                </div>

                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Miêu tả</label>

                                <textarea class="form-control " id="ccomment" name="desc_category_goods" required="" style="clear: both; resize: none;" rows="5">{{$data_get_id_goods->desc_category_goods}}</textarea>

                                </div>

                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Nội dung hàng hóa</label>

                                <textarea class="form-control " id="ccomment" name="content_category_goods" required="" style="clear: both; resize: none;" rows="5">{{$data_get_id_goods->content_category_goods}}</textarea>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" class="form-control" placeholder="Enter price goods" name="price_category_goods" value="{{$data_get_id_goods->price_category_goods}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label><br>
                                    <img class="img-goods" src="{{$data_get_id_goods->image_category_goods}}">
                                    <input type="file" class="form-control edit-load-image-goods" name="image_category_goods" onchange="previewImage()">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_id_category_goods">
                                    @foreach($data_get_id_product as $key => $value_product)
                                    @if($value_product->id == $data_get_id_goods->product_id_category_goods)
                                    <option selected="" value="{{$value_product->id}}">{{$value_product->name_category_product}}</option>
                                    @else
                                    <option value="{{$value_product->id}}">{{$value_product->name_category_product}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuộc thương hiệu</label>
                                    <select class="form-control input-sm m-bot15" name="brand_id_category_goods">
                                    @foreach($data_get_id_brand as $key => $value_brand)
                                    @if($value_brand->id == $data_get_id_goods->brand_id_category_goods)
                                    <option selected="" value="{{$value_brand->id}}">{{$value_brand->name_category_brand}}</option>
                                    @else
                                    <option value="{{$value_brand->id}}">{{$value_brand->name_category_brand}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name="show_category_goods">
                                @if($data_get_id_goods->show_category_goods == 0)
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                @else
                                <option value="1">Hiện</option> 
                                <option value="0">Ẩn</option>
                                @endif
                                </select>
                                </div>

                                <div style="text-align: center;" class="form-group"><button type="submit" class="btn btn-info">Thêm</button></div>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>

@stop