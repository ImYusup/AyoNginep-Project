<?php

use Illuminate\Database\Seeder;

use App\TableData\Room_capacities;

class RoomCapacitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Room_capacities::class, 50)->create();
    }
}
