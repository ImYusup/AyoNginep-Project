<?php

use Illuminate\Database\Seeder;

use App\TableData\Categories;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Categories::class, 9)->create();
    }
}
