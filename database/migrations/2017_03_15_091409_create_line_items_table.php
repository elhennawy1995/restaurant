<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items',function(Blueprint $table){
            $table->increments('id');
            $table->string('item_id');
            $table->string('order_id');
            $table->string('item_name');
            $table->string('currency');
            $table->integer('per_unit_quantity')->nullable();
            $table->string('item_unit')->nullable();
            $table->float('item_revenue');
            $table->string('modifiers')->nullable();
            $table->string('modifiers_revenue')->nullable();
            $table->float('total_revenue')->nullable();
            $table->string('discounts')->nullable();
            $table->float('total_discount')->nullable();
            $table->float('total');
            $table->datetime('line_item_date');
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
