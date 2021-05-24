<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBuyingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buying-information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Buying_name'); 
            $table->string('Buying_address'); 
            $table->string('Buying_phone');
            $table->string('Buying_id_product');
            $table->string('Buying_id_usershop');
            $table->string('Buying_payment_method')->default(1); 
            $table->string('Buying_id_bank_card')->nullable();
            $table->string('Buying_id_momo')->nullable();
            $table->string('Buying_payment_status')->default(1);
            $table->integer('Buying_price');
            $table->string('Buying_code_discount')->nullable(); 
            $table->integer('Buying_price_discount')->default(0);           
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
        Schema::dropIfExists('buying-information');
    }
}
