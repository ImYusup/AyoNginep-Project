<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Amenities::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->numberBetween(1, 50),
        'amenity_item_id'=>$faker->numberBetween(1, 6),
    ];
});