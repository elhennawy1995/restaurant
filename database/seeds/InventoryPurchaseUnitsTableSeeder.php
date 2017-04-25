<?php

use Illuminate\Database\Seeder;

class InventoryPurchaseUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\PurchaseUnit::insert(
        [
            ['name'=>'Bag'],
            ['name'=>'Bottle'],
            ['name'=>'Pack'],
            ['name'=>'Can'],
            ['name'=>'Box'],
            ['name'=>'Piece'],
        ]
        );
    }
}
