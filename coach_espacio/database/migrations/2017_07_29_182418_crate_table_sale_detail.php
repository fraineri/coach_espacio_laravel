<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableSaleDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('sale_id')->unsigned()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->integer("product_id")->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');

            $table->float("price_unit");
            $table->integer("qty");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleDetails');
    }
}
