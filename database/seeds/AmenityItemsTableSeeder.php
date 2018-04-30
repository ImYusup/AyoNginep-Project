<?php

use Illuminate\Database\Seeder;

use App\TableData\Amenity_items;


class AmenityItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Amenity_items::class, 10)->create();
    }
}
