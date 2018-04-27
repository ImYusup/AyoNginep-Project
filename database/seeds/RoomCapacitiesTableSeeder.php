<?php

use Illuminate\Database\Seeder;

use App\room_capacities;

class RoomCapacitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\room_capacities::class, 20)->create();
    }
}
