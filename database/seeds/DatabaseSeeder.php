<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CuisineTableSeeder::class);
        $this->call(MealTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(InventoryCategoriesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
    }
}
