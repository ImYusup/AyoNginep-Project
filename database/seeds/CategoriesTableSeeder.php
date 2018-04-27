<?php

use Illuminate\Database\Seeder;

use App\categories;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\categories::class, 20)->create();
    }
}
