<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(AmenitiesTableSeeder::class);
        $this->call(AmenityItemsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(RoomAmenitiesTableSeeder::class);
        $this->call(RoomCapacitiesTableSeeder::class);
    }
}
