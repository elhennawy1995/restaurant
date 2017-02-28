<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_ingredient',function(Blueprint $table){
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned()->nullable();
            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->integer('inventory_item_id')->unsigned()->nullable();
            $table->foreign('inventory_item_id')->references('id')->on('inventory_items');
            $table->float('amount');
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->integer('count_unit_id')->unsigned()->nullable();
            $table->foreign('count_unit_id')->references('id')->on('inventory_count_units');
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
    }
}
