<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home
Route::get('/', 'HomeController@index');


//Login Web
Route::get('/admin/login','AdminController@index');
Route::get('/admin/','AdminController@dashboard');
Route::post('/admin-dashboard','AdminController@login_dashboard');
//sampledata

Route::post('/admin-sample-data','AdminController@sample_data'); //login sample data
Route::post('/admin/product-sample-data','CategoryProduct@sample_data'); //product sammple data
Route::post('/admin/brand-sample-data','CategoryBrand@sample_data'); //brand sammple data
Route::post('/admin/goods-sample-data','CategoryGoods@sample_data'); //goods sammple data

// Log out
Route::get('/admin/logout','AdminController@logout');

//setting admin
Route::get('/admin/setting-information','AdminController@setting_information');
Route::post('/admin/add-setting-information','AdminController@add_setting_information');

// CategoryProduct
Route::get('/admin/add-category-product','CategoryProduct@add_category_product');
Route::get('/admin/list-category-product','CategoryProduct@list_category_product');
Route::post('/admin/import-category-product','CategoryProduct@import_category_product');

Route::Get('/admin/edit-category-product/{id_edit}','CategoryProduct@edit_category_product');
Route::post('/admin/update-category-product/{id_edit}','CategoryProduct@update_category_product');
Route::get('/admin/delete-category-product/{id_edit}','CategoryProduct@delete_category_product');

//CategoryBrand

Route::get('/admin/add-category-brand','CategoryBrand@add_category_brand');
Route::get('/admin/list-category-brand','CategoryBrand@list_category_brand');
Route::post('/admin/import-category-brand','CategoryBrand@import_category_brand');

Route::Get('/admin/edit-category-brand/{id_edit}','CategoryBrand@edit_category_brand');
Route::post('/admin/update-category-brand/{id_edit}','CategoryBrand@update_category_brand');
Route::get('/admin/delete-category-brand/{id_edit}','CategoryBrand@delete_category_brand');


//CategoryGoods

Route::get('/admin/add-category-goods','Categorygoods@add_category_goods');
Route::get('/admin/list-category-goods','Categorygoods@list_category_goods');
Route::post('/admin/import-category-goods','Categorygoods@import_category_goods');

Route::Get('/admin/edit-category-goods/{id_edit}','Categorygoods@edit_category_goods');
Route::post('/admin/update-category-goods/{id_edit}','Categorygoods@update_category_goods');
Route::get('/admin/delete-category-goods/{id_edit}','Categorygoods@delete_category_goods');


//test upload image base64
Route::get('/testuploadimg','SampleData@test');
Route::post('/load-img','SampleData@upload');

// test exxcel spreadsheet
Route::post('/testexcel', 'TestExcel@test_excel');
Route::get('/testexcel1', 'TestExcel@test_excel');

// show goods in frontend

Route::get('/show-goods-{of_product}-{of_brand}/{pages}', 'HomeController@show_goods');

//test model laravel
Route::Get('/testmodel', function()
{
	
	//Goi class User trong app\user de nap User moi
	//new App\User() == DB::table('user') , ::all == get()
	// $a = App\User::all();
	//$ a = array();
	//$a['name'] = Phuc test 	$a['email'] = lephuc042@gmail.com
	$a = new App\User();
	$a->name = 'Phuc test';
	$a->email = 'lephuc042@gmail.com';
	$a->password = '123456';
	$a->save();
	//insert $a
	//$a;
	print_r($a);
});

// Register module
Route::get('/register', 'UsershopController@register');
