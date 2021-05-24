<?php
namespace App\Http\Controllers;
Use App\BuyingInformation;
Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BuyingInformationController extends Controller
{
	public function get_infor_goods($id_user)
	{
		//Get information goods bought of user
		$get_id_goods = DB::table('usershop')->where('id', $id_user)->first();
		$get_id_goods->id_bought = explode(',', $get_id_goods->id_bought);
		$number_bought = count($get_id_goods->id_bought);
		$goods_bought = array();
		foreach ($get_id_goods->id_bought as $key => $value) 
		{
			$goods_bought[$key] = DB::table('category-goods')->where('goods_id', $value)->first();
		};

		//End Get information goods bought of user

		//Get information goods basket of user
		$get_id_goods->id_basket = explode(',', $get_id_goods->id_basket);

		$goods_basket = array();
		foreach ($get_id_goods->id_basket as $key => $value) 
		{
			$goods_basket[$key] = DB::table('category-goods')->where('goods_id', $value)->first();
		};
		//End Get information goods basket of user

		$get_infor_goods = array($goods_bought, $goods_basket);
		return $get_infor_goods;
	}
}
