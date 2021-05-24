@extends('pages/admin/AdminLayout')
@section('AddCategorybrand')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục thương hiệu
                        </header>
                        <?php 
                        $session_AddCategorybrand = Session::get('message_add_brand');
                        if (isset($session_AddCategorybrand)) 
                        {
                        echo $session_AddCategorybrand;
                        Session::put('message_add_brand', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/import-category-brand')}}">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" class="form-control" placeholder="Enter name's brand" name="name_category_brand">
                                </div>
                                <div class="form-group ">
                                        <label for="ccomment" class="col-lg-3" style="
    padding-left: 0px !important;">Miêu tả</label>

                                <textarea class="form-control " id="ccomment" name="desc_category_brand" required="" style="clear: both; resize: none;" rows="5"></textarea>

                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
								<select class="form-control input-sm m-bot15" name="show_category_brand">
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