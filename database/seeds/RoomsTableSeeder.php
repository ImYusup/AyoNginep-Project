<?php

use Illuminate\Database\Seeder;

use App\rooms;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\rooms::class, 50)->create();
    }
}
