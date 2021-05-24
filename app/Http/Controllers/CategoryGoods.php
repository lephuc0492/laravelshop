<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryGoods extends Controller
{
 public function add_category_goods()
    {
        $get_data_product_id = DB::table('category-product')->get();
        $get_data_brand_id = DB::table('category-brand')->get();    
        //print_r($get_data_product_id);        
    	return view('pages.admin.AddCategoryGoods')->with('get_data_product_id', $get_data_product_id)->with('get_data_brand_id', $get_data_brand_id);
    }
    public function list_category_goods()
    {
        $get_data_goods = DB::table('category-goods')->get();
        //print_r($get_data_goods);
    	return view('pages.admin.ListCategoryGoods')->with('data_list_goods',$get_data_goods);
    }
    public function import_category_goods(Request $request)
    {
    	$data_category_goods = array();
    	$data_category_goods['name_category_goods'] = $request->name_category_goods; //$data_category_goods['name of column table mysql'] = $request->name of display form
        $data_category_goods['desc_category_goods'] = $request->desc_category_goods;
        $data_category_goods['content_category_goods'] = $request->content_category_goods;  
        $data_category_goods['price_category_goods'] = $request->price_category_goods;  
 
        $data_category_goods['product_id_category_goods'] = $request->product_id_category_goods; 
        $data_category_goods['brand_id_category_goods'] = $request->brand_id_category_goods; 
    	$data_category_goods['show_category_goods'] = $request->show_category_goods;
        
        $get_image_goods = $request->file('image_category_goods');
        if ($get_image_goods) 
        {
        $get_image_goods_filename = $get_image_goods->getclientoriginalName();
        $get_image_goods->move('public\upload\goods', $get_image_goods_filename);
        $get_image_goods_dir = 'http://localhost/shop/public/upload/goods/'.$get_image_goods_filename;
        }
        else
        {
        $get_image_goods_dir = '';    
        }
        $data_category_goods['image_category_goods'] = $get_image_goods_dir;  
    	DB::table('category-goods')->insert($data_category_goods);
    	Session::put('message_add_goods','Thêm hàng hóa thành công');
        //creatae var
        $get_data_product_id = DB::table('category-product')->get();
        $get_data_brand_id = DB::table('category-brand')->get(); 
    	return view('pages.admin.AddCategoryGoods')->with('get_data_product_id', $get_data_product_id)->with('get_data_brand_id', $get_data_brand_id);
    }
    public function edit_category_goods($id_edit)
    {
        $result = DB::table('category-goods')->where('goods_id', $id_edit)->first();
        $result = json_decode(json_encode($result,true));
        ///////////
        $get_data_product_name = DB::table('category-product')->get();
        //$get_data_product_name = json_decode(json_encode($get_data_product_name,true));
        ///////////////
        $get_data_brand_name = DB::table('category-brand')->get();
        //$get_data_brand_name = json_decode(json_encode($get_data_brand_name,true));  
        ///////////////    
        ////////
        Session::put('message_edit_goods','Sửa hàng hóa thành công');
        //print_r($result);
        return view('pages.admin.UpdateCategoryGoods')->with('data_get_id_goods', $result)->with('data_get_id_product', $get_data_product_name)->with('data_get_id_brand', $get_data_brand_name);
    }
    public function update_category_goods(Request $request, $id_edit)
    {
        $data_update_category_goods = array();
        $data_update_category_goods['name_category_goods'] = $request->name_category_goods;
        $data_update_category_goods['desc_category_goods'] = $request->desc_category_goods;
        $data_update_category_goods['content_category_goods'] = $request->content_category_goods;
        $data_update_category_goods['price_category_goods'] = $request->price_category_goods;
        $data_update_category_goods['product_id_category_goods'] = $request->product_id_category_goods;
        $data_update_category_goods['brand_id_category_goods'] = $request->brand_id_category_goods;
        $data_update_category_goods['show_category_goods'] = $request->show_category_goods;

        ////////File upload
        $update_get_image_goods = $request->file('image_category_goods');
        $update_get_image_goods_filename = $update_get_image_goods->getclientoriginalName();
        $update_get_image_goods_dir = 'http://localhost/shop/public/upload/goods/'.$update_get_image_goods_filename;        
        $update_get_image_goods->move('public\upload\goods', $update_get_image_goods_filename);
        ///////
        $data_update_category_goods['image_category_goods'] = $update_get_image_goods_dir;
        DB::table('category-goods')->where('goods_id', $id_edit)->update($data_update_category_goods);
        ///////////////////
        $get_data_goods = DB::table('category-goods')->get();        
        return view('pages.admin.ListCategoryGoods')->with('data_list_goods',$get_data_goods);
    }
    public function delete_category_goods($id_edit)
    {
    DB::table('category-goods')->where('goods_id', $id_edit)->delete();
    Session::put('message_delete_goods','Xoa thanh cong!');
    $get_data_goods = DB::table('category-goods')->get();

    return view('pages.admin.ListCategoryGoods')->with('data_list_goods',$get_data_goods);    
    }

    // Add sample brand data

    public function sample_data(Request $request)
    {
        //Clean data with paragraph

        $goods = file_get_contents('public\datafile\goods_sample_data.json');
        $goods = str_replace("\n\r", '<br>', $goods); //xuong dong + dau dong
        $goods = str_replace("\n", '', $goods);   //xuong dong
        $goods = str_replace("\r", '', $goods); // dau dong check data json web: https://jsonlint.com/
        $goods = json_decode($goods, true);       //true => array, false => object

        //Clean data with paragraph

        $count_goods = count($goods);

        //Insert data to mysql

        if ($request->sample_data == "DataSample") 
        {
            for ($i=0; $i < $count_goods; $i++) 
            { 
            $check_duplicate = DB::table('category-goods')->where('name_category_goods', $goods[$i])->first(); 
                if(empty($check_duplicate) == 1)
                {
                    DB::table('category-goods')->insert($goods[$i]);
                } 
                else
                {
                Session::put('message_delete_goods', 'Có sản phẩm đã thêm rồi đề nghị kiểm tra lại!');
                }
            }
        }

        //Insert data to mysql        
        //print_r(count($goods));    
        $get_data_goods = DB::table('category-goods')->get();
        return Redirect::to('/admin/list-category-goods')->with('data_list_goods',$get_data_goods);  
    }

    // Add sample brand data
}
