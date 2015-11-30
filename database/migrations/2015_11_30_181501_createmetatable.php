<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createmetatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('meta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
             $table->string('address1');
             $table->string('address2');
             $table->string('city');
             $table->string('state');
             $table->string('zipcode',6);
            $table->rememberToken();
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
        Schema::drop('meta');    }
}
