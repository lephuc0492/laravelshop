@extends('pages.admin.AdminLayout')
@section('UpdateCategoryBrand')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục thương hiệu
                        </header>
                        <?php 
                        $session_EditCategoryBrand = Session::get('message_edit_brand');
                        if (isset($session_AddCategoryBrand)) 
                        {
                        echo $session_AddCategoryBrand;
                        Session::put('message_edit_brand', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/update-category-brand/'.$data_get_id_brand->id)}}">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" class="form-control" placeholder="Enter name's brand" name="name_category_brand" value="{{$data_get_id_brand->name_category_brand}}">
                                </div>
                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
                                padding-left: 0px !important;">Miêu tả</label>

                                <textarea class="form-control " id="ccomment" name="desc_category_brand" required="" style="clear: both; resize: none;" rows="5">{{$data_get_id_brand->desc_category_brand}}</textarea>

                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
								<select class="form-control input-sm m-bot15" name="show_category_brand">
								@if($data_get_id_brand->show_category_brand == 0)
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