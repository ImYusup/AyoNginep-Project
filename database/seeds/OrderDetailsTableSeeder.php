<?php

use Illuminate\Database\Seeder;

use App\TableData\Order_details;


class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Order_details::class, 10)->create();
    }
}
