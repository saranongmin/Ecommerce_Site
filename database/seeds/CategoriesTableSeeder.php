<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         echo "Inserting data into database";
       factory(App\Category::class,100)->create();
    }
}
