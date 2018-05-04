<?php

use Illuminate\Database\Seeder;

use App\TableData\Rooms;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Rooms::class, 100)->create();
    }
}
