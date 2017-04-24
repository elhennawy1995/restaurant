<?php

use Illuminate\Database\Seeder;

class TimeUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\TimeUnit::insert(
        [
            ['name'=>'Day'],
            ['name'=>'Week'],
            ['name'=>'Month'],
            ['name'=>'Quarter'],
            ['name'=>'Year'],
        ]
        );
    }
}
