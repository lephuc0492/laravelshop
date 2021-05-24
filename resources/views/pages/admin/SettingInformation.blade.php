@extends('pages.admin.AdminLayout')
@section('SettingInfomation')
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông tin người sử dụng
                        </header>
                        <?php 
                        $session_AddSettingInformation = Session::get('setting_message');
                        if (isset($session_AddSettingInformation)) 
                        {
                        echo $session_AddSettingInformation;
                        Session::put('setting_message', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('admin/add-setting-information')}}">
                                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Đăng nhập</label>
                                    <input type="Email" class="form-control" placeholder="Enter name's product" name="admin_email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="Password" class="form-control" placeholder="Enter name's product" name="admin_password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hiển thị</label>
                                    <input type="text" class="form-control" placeholder="Enter name's product" name="admin_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Enter name's product" name="admin_phone">
                                </div>

                                <div style="text-align: center;" class="form-group"><button type="submit" class="btn btn-info">Thêm</button></div>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@stop