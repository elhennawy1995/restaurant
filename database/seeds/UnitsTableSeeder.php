<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Unit::insert(
        [
            ['name'=>'Oz'],
            ['name'=>'Bottle'],
            ['name'=>'Day'],
            ['name'=>'Month'],
            ['name'=>'Year'],
            ['name'=>'Inch'],
            ['name'=>'Cm'],
        ]
        );
    }
}
