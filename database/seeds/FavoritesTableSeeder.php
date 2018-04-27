<?php

use Illuminate\Database\Seeder;

use App\favorites;


class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\favorites::class, 20)->create();
    }
}
