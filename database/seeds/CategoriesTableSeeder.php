<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Category::insert(
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
