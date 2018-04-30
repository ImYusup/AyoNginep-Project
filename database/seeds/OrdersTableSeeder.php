<?php

use Illuminate\Database\Seeder;

use App\TableData\Orders;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Orders::class, 10)->create();
    }
}
