<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_details', function (Blueprint $table) {
            $table->increments('detail_id');
            $table->integer('detail_order_id')->length(10)->unsigned();
            $table->integer('detail_product_id')->length(10)->unsigned();
            $table->string('detail_name');
            $table->string('detail_price');
            $table->string('detail_quantity');
            $table->timestamps();
            $table->foreign('detail_order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('detail_product_id')->references('id')->on('products')->onDelete('cascade');

        });}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
