@extends('pages.admin.AdminLayout')
@section('UpdateCategoryProduct')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục khách hàng
                        </header>
                        <?php 
                        $session_EditCategoryProduct = Session::get('message_edit_product');
                        if (isset($session_AddCategoryProduct)) 
                        {
                        echo $session_AddCategoryProduct;
                        Session::put('message_edit_product', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/update-category-product/'.$data_get_id_product->id)}}">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Enter name's product" name="name_category_product" value="{{$data_get_id_product->name_category_product}}">
                                </div>
                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Miêu tả</label>

                                <textarea class="form-control " id="ccomment" name="desc_category_product" required="" style="clear: both; resize: none;" rows="5">{{$data_get_id_product->desc_category_product}}</textarea>

                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
								<select class="form-control input-sm m-bot15" name="show_category_product">
								@if($data_get_id_product->show_category_product == 0)
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                @else
                                <option value="1">Hiện</option> 
                                <option value="0">Ẩn</option>
                                @endif
                            </select>
                                </div>

                                <div style="text-align: center;" class="form-group"><button type="submit" class="btn btn-info">Cập nhật</button></div>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@stop