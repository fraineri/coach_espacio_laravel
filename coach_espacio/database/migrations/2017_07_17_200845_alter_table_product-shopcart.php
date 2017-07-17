<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductShopcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_shopcart', function (Blueprint $table) {
            $table->dropColumn("created_at");
            $table->dropColumn("updated_at");
            $table->integer("qty")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_shopcart', function (Blueprint $table) {
            $table->dropColumn("qty");
        });
    }
}
