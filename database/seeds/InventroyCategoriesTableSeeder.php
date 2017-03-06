<?php

use Illuminate\Database\Seeder;

class InventoryCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\InventoryCategory::insert(
        [
            ['name'=>'Main course'],
            ['name'=>'Drink'],
            ['name'=>'Sweet'],
            ['name'=>'Side'],
            ['name'=>'Disposable'],
        ]
        );
    }
}
