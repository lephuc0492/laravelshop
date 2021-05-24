<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class apitest extends Controller
{
    public function apitest(Request $request)
    {
    	$index_api = DB::table('category-goods')->get();
    	//$index_api[0]->goods_id
    	//print_r(json_encode($index_api));
    	return $index_api;
    }
}
