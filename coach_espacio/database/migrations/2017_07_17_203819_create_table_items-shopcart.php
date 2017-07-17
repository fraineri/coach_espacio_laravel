<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemsShopcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_shopcart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("shopcart_id")->unsigned()->nullable();
            $table->foreign('shopcart_id')->references('id')->on('shopcarts');

            $table->integer("item_id")->unsigned()->nullable();
            $table->foreign('item_id') ->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_shopcart');
        
    }
}
