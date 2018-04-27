<?php

use Illuminate\Database\Seeder;

use App\photos;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\photos::class, 50)->create();
    }
}
