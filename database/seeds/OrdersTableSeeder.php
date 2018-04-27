<?php

use Illuminate\Database\Seeder;

use App\orders;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\orders::class, 20)->create();
    }
}
