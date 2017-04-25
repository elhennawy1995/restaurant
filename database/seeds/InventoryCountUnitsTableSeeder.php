<?php

use Illuminate\Database\Seeder;

class InventoryCountUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\InventoryCountUnit::insert(
        [
            ['name'=>'ounces (oz)'],
            ['name'=>'fluid ounces (fl oz)'],
            ['name'=>'ml'],
            ['name'=>'Pound'],
            ['name'=>'tea spoon'],
            ['name'=>'table spoon'],
            ['name'=>'cup'],
        ]
        );
    }
}
