<?php

use Illuminate\Database\Seeder;

use App\TableData\Favorites;


class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Favorites::class, 10)->create();
    }
}
