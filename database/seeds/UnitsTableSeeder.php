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
            ['name'=>'inch'],
            ['name'=>'ounces (oz)'],
            ['name'=>'fluid ounces (fl oz)'],
            ['name'=>'gallon (gal)'],
            ['name'=>'Pound'],
            ['name'=>'quart (qt)'],
            ['name'=>'pint (pt)'],
        ]
        );
    }
}
