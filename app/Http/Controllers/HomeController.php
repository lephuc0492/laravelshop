<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    public function index()
    {    
    	return Redirect::to('/show-goods-all-all/1');
    }

    //show goods at home pages website

    public function show_goods($of_product, $of_brand, $pages)
    {
        $list_show_product = DB::table('category-product')->get();
        $list_show_brand = DB::table('category-brand')->get();
        $list_show_goods = DB::table('category-goods')->orderBy('goods_id', 'asc')->get();

        //Get id Product
        $getid_product = DB::table('category-product')->where('name_category_product', $of_product)->select('category-product.id')->get();
        $getid_product = json_decode(json_encode($getid_product,true));

        //Get id Brand
        $getid_brand = DB::table('category-brand')->where('name_category_brand', $of_brand)->select('category-brand.id')->get();
        $getid_brand = json_decode(json_encode($getid_brand,true));  
        // $count_brand = DB::Table('category-goods')->join('category-brand', 'category-goods.brand_id_category_goods', '=', 'category-brand.id')->select('category-goods.*', 'category-brand.name_category_brand')->Get();

        // Count Brand on goods
        $count_brand_array = array();
        foreach ($list_show_brand as $key => $detail_brand) 
        {
            $count_brand = DB::table('category-goods')->where('brand_id_category_goods', $detail_brand->id)->get();
            $count_brand = count(json_decode(json_encode($count_brand,true)));
            $count_brand_array[$detail_brand->name_category_brand] = $count_brand;
        }

        // Count Brand on goods

        $list_show_goods_pages = array();    

    	if ($of_brand == 'all' and $of_product == 'all') 
    	{
            //Count pages on website of all goods

            $total_pages = intval(count($list_show_goods)/6 + 1);
            
            //End Count pages on website of all products  

            // Validate pages  

            if (((int)$pages) !== 0 && $pages < $total_pages) 
            {
                for ($i=$pages*6-6,$j = 0; $i < $pages*6, $j < 6; $i++, $j++) 
                { 
                    $list_show_goods_pages[$j] = $list_show_goods[$i];
                }
            }
            elseif ($pages == $total_pages) 
            {
                for ($i=$pages*6-6,$j = 0; $i < count($list_show_goods), $j < (count($list_show_goods) - ($pages*6-6)); $i++, $j++) 
                { 
                    $list_show_goods_pages[$j] = $list_show_goods[$i];
                }
            }
            else 
            {
               
            }

            //End Validate pages  

        return view('pages/ShowGoods')->with('list_show_goods', $list_show_goods_pages)->with('list_show_product', $list_show_product)-> with('list_show_brand', $list_show_brand)->with('count_brand_array', $count_brand_array)-> with('total_pages', $total_pages);


    	}
        elseif(count($getid_brand) !== 0 or count($getid_product) !== 0)
        {
            if (count($getid_product) !== 0 and count($getid_brand) == 0) 
            {
                $getid_product = $getid_product[0]->id;
                //get id product success
                
                $list_show_goods = DB::table('category-goods')->where('product_id_category_goods', $getid_product)->get();
                // print_r($getid_product);
                // print_r($of_product.'+'.$of_brand);

                //Count pages on website of all goods

                $total_pages = intval(count($list_show_goods)/6 + 1);

                //End Count pages on website of all products  

                // Validate pages  

                if (((int)$pages) !== 0 && $pages < $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < $pages*6, $j < 6; $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                elseif ($pages == $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < count($list_show_goods), $j < (count($list_show_goods) - ($pages*6-6)); $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                else 
                {               
                }

                //End Validate pages  

                return view('pages/ShowGoods')->with('list_show_goods', $list_show_goods_pages)->with('list_show_product', $list_show_product)-> with('list_show_brand', $list_show_brand)->with('count_brand_array', $count_brand_array)->with('total_pages', $total_pages); 
            }
            elseif (count($getid_product) == 0 and count($getid_brand) !== 0) 
            {
                $getid_brand = $getid_brand[0]->id;
                //get id brand success
                
                $list_show_goods = DB::table('category-goods')->where('brand_id_category_goods', $getid_brand)->get();
                // print_r($getid_brand);
                // print_r($of_product.'+'.$of_brand);
                //Count pages on website of all goods

                $total_pages = intval(count($list_show_goods)/6 + 1);

                //End Count pages on website of all products  

                // Validate pages  

                if (((int)$pages) !== 0 && $pages < $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < $pages*6, $j < 6; $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                elseif ($pages == $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < count($list_show_goods), $j < (count($list_show_goods) - ($pages*6-6)); $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                else 
                {
              
                }

                //End Validate pages

                return view('pages/ShowGoods')->with('list_show_goods', $list_show_goods_pages)->with('list_show_product', $list_show_product)-> with('list_show_brand', $list_show_brand)->with('count_brand_array', $count_brand_array)->with('total_pages', $total_pages); 
            }
            else
            {
                $getid_product = $getid_product[0]->id;
                $getid_brand = $getid_brand[0]->id;
                $list_show_goods = DB::table('category-goods')->where('brand_id_category_goods', $getid_brand)->where('product_id_category_goods', $getid_product)->get();
                // print_r($getid_brand);
                // print_r($of_product.'+'.$of_brand);
                //Count pages on website of all goods

                $total_pages = intval(count($list_show_goods)/6 + 1);

                //End Count pages on website of all products  

                // Validate pages  

                if (((int)$pages) !== 0 && $pages < $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < $pages*6, $j < 6; $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                elseif ($pages == $total_pages) 
                {
                    for ($i=$pages*6-6,$j = 0; $i < count($list_show_goods), $j < (count($list_show_goods) - ($pages*6-6)); $i++, $j++) 
                    { 
                        $list_show_goods_pages[$j] = $list_show_goods[$i];
                    }
                }
                else 
                {
               
                }

                //End Validate pages

                return view('pages/ShowGoods')->with('list_show_goods', $list_show_goods_pages)->with('list_show_product', $list_show_product)-> with('list_show_brand', $list_show_brand)->with('count_brand_array', $count_brand_array)->with('total_pages', $total_pages);                 
            }

        }
        else
        {
            //Count pages on website of all goods

            $total_pages = intval(count($list_show_goods)/6 + 1);

            //End Count pages on website of all products  

            // Validate pages  

            if (((int)$pages) !== 0 && $pages < $total_pages) 
            {
                for ($i=$pages*6-6,$j = 0; $i < $pages*6, $j < 6; $i++, $j++) 
                { 
                    $list_show_goods_pages[$j] = $list_show_goods[$i];
                }
            }
            elseif ($pages == $total_pages) 
            {
                for ($i=$pages*6-6,$j = 0; $i < count($list_show_goods), $j < (count($list_show_goods) - ($pages*6-6)); $i++, $j++) 
                { 
                    $list_show_goods_pages[$j] = $list_show_goods[$i];
                }
            }
            else 
            {
                
            }

            //End Validate pages

            return view('pages/ShowGoods')->with('list_show_goods', $list_show_goods_pages)->with('list_show_product', $list_show_product)-> with('list_show_brand', $list_show_brand)->with('count_brand_array', $count_brand_array)->with('total_pages', $total_pages); 

        }

    }

    //show goods at home pages website
}
