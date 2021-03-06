<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('product',function($table){
            $table->increments('id');
            $table->string('product');
            $table->string('description');
            $table->integer('quantity');
            $table->string('frequency');
            $table->string('sample');
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
        //
        Schema::drop('product');
    }
}
