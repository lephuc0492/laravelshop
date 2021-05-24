<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryBrand extends Controller
{
    public function add_category_brand()
    {
    	return view('pages.admin.AddCategoryBrand');
    }
    public function list_category_brand()
    {
        $get_data_brand = DB::table('category-brand')->get();
        //print_r($get_data_brand);
    	return view('pages.admin.ListCategoryBrand')->with('data_list_brand',$get_data_brand);
    }
    public function import_category_brand(Request $request)
    {
    	$data_category_brand = array();
    	$data_category_brand['name_category_brand'] = $request->name_category_brand; //$data_category_brand['name of column table mysql'] = $request->name of display form
    	$data_category_brand['desc_category_brand'] = $request->desc_category_brand;
    	$data_category_brand['show_category_brand'] = $request->show_category_brand;
 
    	DB::table('category-brand')->insert($data_category_brand);
    	Session::put('message_add_brand','Thêm thương hiệu thành công');
    	return view('pages.admin.AddCategoryBrand');
    }
    public function edit_category_brand($id_edit)
    {
        $result = DB::table('category-brand')->where('id', $id_edit)->first();
        $result = json_decode(json_encode($result,true));
        Session::put('message_edit_brand','Sửa thương hiệu thành công');
        return view('pages.admin.UpdateCategorybrand')->with('data_get_id_brand', $result);
    }
    public function update_category_brand(Request $request, $id_edit)
    {
        $data_update_category_brand = array();
        $data_update_category_brand['name_category_brand'] = $request->name_category_brand;
        $data_update_category_brand['desc_category_brand'] = $request->desc_category_brand;
        $data_update_category_brand['show_category_brand'] = $request->show_category_brand;
        DB::table('category-brand')->where('id', $id_edit)->update($data_update_category_brand);
        $get_data_brand = DB::table('category-brand')->get();
        
        return view('pages.admin.ListCategoryBrand')->with('data_list_brand',$get_data_brand);
    }
    public function delete_category_brand($id_edit)
    {
    DB::table('category-brand')->where('id', $id_edit)->delete();
    Session::put('message_delete_brand','Xoa thanh cong!');
    $get_data_brand = DB::table('category-brand')->get();

    return view('pages.admin.ListCategoryBrand')->with('data_list_brand',$get_data_brand);    
    }

    // Add sample brand data
    public function sample_data(Request $request)
    {
        //Clean data with paragraph

        $brand = file_get_contents('public\datafile\brand_sample_data.json');
        $brand = str_replace("\n\r", '<br>', $brand); //xuong dong + dau dong
        $brand = str_replace("\n", '', $brand);   //xuong dong
        $brand = str_replace("\r", '', $brand); // dau dong check data json web: https://jsonlint.com/
        $brand = json_decode($brand, true);       //true => array, false => object

        //Clean data with paragraph       

        $count_brand = count($brand);

        //Insert data to mysql

        if ($request->sample_data == "DataSample") 
        {
            for ($i=0; $i < $count_brand; $i++) 
            { 
            $check_duplicate = DB::table('category-brand')->where('name_category_brand', $brand[$i])->first(); 
                if(empty($check_duplicate) == 1)
                {
                    DB::table('category-brand')->insert($brand[$i]);
                } 
                else
                {
                Session::put('message_delete_brand', 'Có sản phẩm đã thêm rồi đề nghị kiểm tra lại!');
                }
            }
        }

        //Insert data to mysql 

        $get_data_brand = DB::table('category-brand')->get();
        return Redirect::to('admin/list-category-brand')->with('data_list_brand',$get_data_brand);  
    }
    // Add sample brand data
}
