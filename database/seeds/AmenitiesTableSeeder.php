<?php

use Illuminate\Database\Seeder;

use App\amenities;


class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\amenities::class, 20)->create();
    }
}
