<?php

use Illuminate\Database\Seeder;

class MealTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\MealType::insert(
        [
            ['name'=>'Breakfast'],
            ['name'=>'Brunsh'],
            ['name'=>'Lunch'],
            ['name'=>'Dinner'],
        ]
        );
    }
}
