<?php

use Illuminate\Database\Seeder;

class CuisineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Cuisine::insert(
        [
            ['name'=>'Italian'],
            ['name'=>'Spanish'],
            ['name'=>'Mexican'],
        ]
        );
    }
}
