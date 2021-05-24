<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
    	return view('pages.admin.AddCategoryProduct');
    }
    public function list_category_product()
    {
        $get_data_product = DB::table('category-product')->get();
        //print_r($get_data_product);
    	return view('pages.admin.ListCategoryProduct')->with('data_list_product',$get_data_product);
    }
    public function import_category_product(Request $request)
    {
    	$data_category_product = array();
    	$data_category_product['name_category_product'] = $request->name_category_product; //$data_category_product['name of column table mysql'] = $request->name of display form
    	$data_category_product['desc_category_product'] = $request->desc_category_product;
    	$data_category_product['show_category_product'] = $request->show_category_product;
 
    	DB::table('category-product')->insert($data_category_product);
    	Session::put('message_add_product','Thêm sản phẩm thành công');
    	return view('pages.admin.AddCategoryProduct');
    }
    public function edit_category_product($id_edit)
    {
        $result = DB::table('category-product')->where('id', $id_edit)->first();
        $result = json_decode(json_encode($result,true));
        Session::put('message_edit_product','Sửa sản phẩm thành công');
        return view('pages.admin.UpdateCategoryProduct')->with('data_get_id_product', $result);
    }
    public function update_category_product(Request $request, $id_edit)
    {
        $data_update_category_product = array();
        $data_update_category_product['name_category_product'] = $request->name_category_product;
        $data_update_category_product['desc_category_product'] = $request->desc_category_product;
        $data_update_category_product['show_category_product'] = $request->show_category_product;
        DB::table('category-product')->where('id', $id_edit)->update($data_update_category_product);
        $get_data_product = DB::table('category-product')->get();
        
        return view('pages.admin.ListCategoryProduct')->with('data_list_product',$get_data_product);
    }
    public function delete_category_product($id_edit)
    {
        DB::table('category-product')->where('id', $id_edit)->delete();
        Session::put('message_delete_product','Xoa thanh cong!');
        $get_data_product = DB::table('category-product')->get();

        return view('pages.admin.ListCategoryProduct')->with('data_list_product',$get_data_product);    
    }

    // Add sample product data

    public function sample_data(Request $request)
    {
        $product1 = array(
            'name_category_product' => 'Laptop', 
            'desc_category_product' => 'Ghi chú!', 
            'show_category_product' => 1 
        );

        $product2 = array(
            'name_category_product' => 'Điện thoại', 
            'desc_category_product' => 'Ghi chú!', 
            'show_category_product' => 1 
        );

        $product3 = array(
            'name_category_product' => 'Tivi', 
            'desc_category_product' => 'Ghi chú!', 
            'show_category_product' => 1 
        );

        $product4 = array(
            'name_category_product' => 'Xe máy', 
            'desc_category_product' => 'Ghi chú!', 
            'show_category_product' => 1 
        );
        $product = array();
        for ($i=0; $i < 4; $i++) 
        { 
            $i2 = $i + 1;
            $product[$i] = ${'product'.$i2};            //sau dau [] dc phep goi bien

            //check duplicate value
            $check_duplicate = DB::table('category-product')->where('name_category_product', $product[$i]['name_category_product'])->first();
            if (empty($check_duplicate) == 1) 
            {
                DB::table('category-product')->insert($product[$i]);
            }
            else
            {
                Session::put('message_delete_product', 'Co sp Trung cmnr!Check lai di');
            }

        }       
            //check duplicate value

        $get_data_product = DB::table('category-product')->get();
        return view('pages.admin.ListCategoryProduct')->with('data_list_product',$get_data_product); 
    }

    // Add sample product data
}
