<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductShopcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('product_shopcart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("shopcart_id")->unsigned()->nullable();
            $table->foreign('shopcart_id')->references('id')->on('shopcarts');

            $table->integer("product_id")->unsigned()->nullable();
            $table->foreign('product_id') ->references('id')->on('products');
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
        Schema::dropIfExists('product_shopcart');
    }
}
