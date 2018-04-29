<?php

use Illuminate\Database\Seeder;

use App\TableData\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableData\Users::class, 10)->create();
    }
}
