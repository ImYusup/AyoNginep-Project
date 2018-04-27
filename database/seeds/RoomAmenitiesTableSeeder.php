<?php

use Illuminate\Database\Seeder;

use App\room_amenities;

class RoomAmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\room_amenities::class, 50)->create();
    }
}
