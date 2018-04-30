<?php

use Illuminate\Database\Seeder;

use App\TableData\Amenities;


class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Amenities::class, 10)->create();
    }
}
