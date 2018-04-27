<?php

use Faker\Generator as Faker;

$factory->define(App\room_amenities::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->randomDigitNotNull
    ];
});
