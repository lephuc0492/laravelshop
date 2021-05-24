@extends('pages.admin.AdminLayout')
@section('ListCategoryGoods')
<div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê Sản phẩm</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <form action="{{URL::to('/admin/goods-sample-data')}}" method="post" class="form-add">
        {{ csrf_field() }}
          <select class="input-sm form-control w-sm inline v-middle" name="sample_data">
            <option value="DataSample">Dữ liệu mẫu</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
          <button class="btn btn-sm btn-default">Thực hiện</button>   
        </form>             
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $Session_DeleteCategoryGoods = Session::get('message_delete_goods');
      ?>
      @if($Session_DeleteCategoryGoods)
      {{$Session_DeleteCategoryGoods}}
      <?php 
      Session::put('message_delete_goods',null); 
      ?>
      @else

      @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên danh mục</th>
            <th>Miêu tả</th>
            <th>Hình ảnh</th>
            <th>Hiển thị</th>
            <th style="width:30px;">Sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_list_goods as $key => $data_category_goods)

          <tr>

            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$data_category_goods->name_category_goods}}</td>
            <td>{{$data_category_goods->desc_category_goods}}</td>
            <td>
              <img class="img-listdata" src="{{$data_category_goods->image_category_goods}}">  
            </td>
            <td><span class="text-ellipsis">
              @if($data_category_goods->show_category_goods == 1)
              Hiện
              @else
              Ẩn
              @endif
            </span></td>
            <td>
              <a href="{{URL::to('admin/edit-category-goods').'/'.$data_category_goods->goods_id}}" class="active" ui-toggle-class=""><i class="fa fa-wrench text-success text-active"></i></a>
               <a onclick="DeleteCategoryGoods()" href="{{URL::to('admin/delete-category-goods/'.$data_category_goods->goods_id)}}" class="active" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
@stop