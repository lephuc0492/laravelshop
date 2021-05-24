<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCategoryBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category-brand', function (Blueprint $table) {
            $table->increments('id');           //tu dong tang dan
            $table->string('name_category_brand');
            $table->text('desc_category_brand');
            $table->integer('show_category_brand');       //integer kieu du lieu 1 hoac 0
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
        Schema::dropIfExists('category-brand');
    }
}
