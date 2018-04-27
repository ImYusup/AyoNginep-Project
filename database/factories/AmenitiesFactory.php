<?php

use Faker\Generator as Faker;

$factory->define(App\amenities::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->randomDigitNotNull,
        'amenity_item_id'=>$faker->randomDigitNotNull,
    ];
});
