<?php

use Illuminate\Database\Seeder;

use App\amenity_items;


class AmenityItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\amenity_items::class, 20)->create();
    }
}
