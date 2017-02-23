<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('inventory_categories');
            $table->integer('purchase_unit_id')->unsigned();
            $table->foreign('purchase_unit_id')->references('id')->on('inventory_purchase_units');
            $table->integer('pu_count');
            $table->float('pu_price');
            $table->integer('count_unit_id')->unsigned();
            $table->foreign('count_unit_id')->references('id')->on('inventory_count_units');
            $table->integer('number_of_cu_per_pu');
            $table->float('cu_length');
            $table->float('cu_width');
            $table->float('cu_height');
            $table->integer('cu_size_unit_id')->unsigned();
            $table->foreign('cu_size_unit_id')->references('id')->on('units');
            $table->float('remaining_shelf_life');
            $table->integer('remaining_shelf_life_unit_id')->unsigned();
            $table->foreign('remaining_shelf_life_unit_id')->references('id')->on('time_units');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        Schema::dropIfExists('inventory_items');
    }
}
