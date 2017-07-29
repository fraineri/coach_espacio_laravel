<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->float('total')->nullable();
            $table->enum('status', ['finished', 'canceled','pending'])->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('cp');
            $table->string('phone');
            $table->string('card_name')->nullable();
            $table->string('card_number',16)->nullable();
            $table->string('card_code')->nullable();
            $table->string('card_expire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
