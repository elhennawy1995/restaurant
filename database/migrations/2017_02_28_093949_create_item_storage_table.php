<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_storage',function(Blueprint $table){
            $table->increments('id');
            $table->integer('inventory_item_id')->unsigned();
            $table->foreign('inventory_item_id')->references('id')->on('inventory_items');
            $table->integer('storage_id')->unsigned();
            $table->foreign('storage_id')->references('id')->on('storages');
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
