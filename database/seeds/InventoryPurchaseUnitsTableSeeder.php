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
            ['name'=>'cup'],
            ['name'=>'teaspoon'],
            ['name'=>'gram'],
            ['name'=>'can'],
            ['name'=>'box'],
            ['name'=>'inch'],
        ]
        );
    }
}
