<?php

use Illuminate\Database\Seeder;

use App\order_details;


class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\order_details::class, 20)->create();
    }
}
