<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUsershopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usershop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_email', 100); //max 100 char
            $table->string('user_password');
            $table->string('user_name');
            $table->string('user_phone');
            $table->integer('level')->default(0); //default 0
            $table->string('id_bought')->nullable(); //can null
            $table->string('id_basket')->nullable();   //can null      
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
        Schema::dropIfExists('usershop');
    }
}
