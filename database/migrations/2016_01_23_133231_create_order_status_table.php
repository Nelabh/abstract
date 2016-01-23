<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->length(10)->unsigned();
            $table->string('order_status');
            $table->string('order_tracking_number');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('order_tracking_number')->references('order_tracking_number')->on('orders')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::drop('order_status');
    }
}
