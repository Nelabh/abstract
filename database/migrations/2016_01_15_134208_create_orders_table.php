<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('order_user_id')->length(10)->unsigned();
            $table->float('order_amount')->unsigned();
            $table->string('order_ship_name');
            $table->string('order_ship_address1');
            $table->string('order_ship_address2');
            $table->string('order_city',50);
            $table->string('order_state',50);
            $table->string('order_zip',6);
            $table->string('order_phone');
            $table->string('order_date');
            $table->tinyinteger('order_shipped');
            $table->string('order_email');
            $table->string('order_tracking_number');
            $table->timestamps();
            $table->foreign('order_user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');

            }
}
