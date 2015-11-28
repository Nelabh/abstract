<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('products', function (Blueprint $table) {
            $table->string('sku_small');
            $table->string('sku_medium');
            $table->string('sku_large');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function ($table) {
    $table->dropColumn('sku_small');
    $table->dropColumn('sku_medium');
    $table->dropColumn('sku_large');
});
    }
}
