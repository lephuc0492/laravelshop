<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCategoryGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category-goods', function (Blueprint $table) {
            $table->increments('goods_id');           //tu dong tang dan
            $table->integer('product_id_category_goods');  
            $table->integer('brand_id_category_goods');  
            $table->text('name_category_goods');
            $table->text('desc_category_goods');
            $table->text('content_category_goods');
            $table->string('price_category_goods');      //kieu so nhung co ca chu~ va special
            $table->string('image_category_goods');
            $table->integer('show_category_goods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category-goods');
    }
}
